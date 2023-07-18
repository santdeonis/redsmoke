<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('web.main.index', function (BreadcrumbTrail $trail) {
    $trail->push(__('view/main.title'), route('web.main.index'));
});

Breadcrumbs::for('web.sections.index', function (BreadcrumbTrail $trail) {
    $trail->parent('web.main.index');
    $trail->push(__('view/section.index.title'), route('web.sections.index'));
});

Breadcrumbs::for('web.sections.show', function (BreadcrumbTrail $trail, $model) {
    $trail->parent('web.main.index');
    $trail->push(__('view/section.index.title'), route('web.sections.index'));

    foreach ($model->breadcrumbs as $breadcrumb) {
        $trail->push($breadcrumb['title'], route('web.sections.show', $breadcrumb['path']));
    }
});
