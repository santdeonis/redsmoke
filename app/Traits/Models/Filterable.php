<?php

namespace App\Traits\Models;

use App\Filters\QueryFilter;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method static Builder|Eloquent filter(QueryFilter $filter)
 *
 * @mixin Eloquent
 */
trait Filterable
{
    public static function scopeFilter(Builder $builder, QueryFilter $filter): Builder
    {
        return $filter->apply($builder);
    }
}
