<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $parent_category_id
 * @property string $name
 * @property string $about
 *
 * @property-read Builder|Category|null $parent
 * @property-read Builder|Category[]|Collection children
 * @property-read Product[]|Collection $products
 *
 * @mixin Eloquent
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_category_id',
        'about',
    ];

    public function parent(): Builder|Category
    {
        return Category::where('id', $this->parent_category_id);
    }

    public function children(): Builder|Category
    {
        return Category::where('parent_category_id', $this->id);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
