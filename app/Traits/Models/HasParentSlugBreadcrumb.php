<?php

namespace App\Traits\Models;

trait HasParentSlugBreadcrumb
{
    protected static function boot()
    {
        parent::boot();

        static::saving(function (self $model) {

            if ($model->isDirty('slug', 'parent_id')) {
                $model->generatePath();
            }
        });

        static::saved(function (self $model) {
            static $updating = false;

            if (!$updating && $model->isDirty('path')) {
                $updating = true;
                $model->updateDescendantsPaths();
                $updating = false;
            }
        });
    }

    public function generatePath(): static
    {
        $slug = $this->slug;

        $this->path = $this->isRoot() ? $slug : $this->parent->path . '/' . $slug;

        $breadcrumb = ['title' => $this->title, 'path' => $this->path];

        if ($this->isRoot()) {
            $this->breadcrumbs = [$breadcrumb];

        } else {
            $tempBreadcrumbs = $this->parent->breadcrumbs;
            $tempBreadcrumbs[] = $breadcrumb;
            $this->breadcrumbs = $tempBreadcrumbs;
        }

        return $this;
    }

    public function updateDescendantsPaths()
    {
        $descendants = $this->descendants()->defaultOrder()->get();
        $descendants->push($this)->linkNodes()->pop();
        foreach ($descendants as $model) {
            $model->generatePath()->save();
        }
    }
}
