<?php

namespace App\Filters\Products;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends QueryFilter
{
    public function search(?string $search): Builder
    {
        if (!is_null($search)) {
            return $this->builder->where(function (Builder $query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        }
        return $this->builder;
    }

    public function manufacturer(?string $manufacturer): Builder
    {
        if (!is_null($manufacturer)) {
            return $this->builder->where('manufacturer', $manufacturer);
            }
        return $this->builder;
    }

    public function categoryId(?string $categoryId): Builder
    {
        if (!is_null($categoryId)) {
            return $this->builder->where('category_id', $categoryId);
        }
        return $this->builder;
    }

    public function priceFrom(?int $from): Builder
    {
        if (!is_null($from)){
            return $this->builder->where('price', '>=', $from);
        }
        return $this->builder;
    }

    public function priceTo(?int $to): Builder
    {
        if (!is_null($to)){
            return $this->builder->where('price', '<=', $to);
        }
        return $this->builder;
    }

}
