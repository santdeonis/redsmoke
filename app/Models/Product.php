<?php

namespace App\Models;

use App\Traits\Models\Filterable;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $category_id
 * @property int $price
 * @property int $weight
 * @property string $name
 * @property string $manufacturer
 * @property string $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 *
 * @property-read Category|null $category
 *
 * @mixin Eloquent
 */
class Product extends Model
{
    use HasFactory,
        SoftDeletes,
        Filterable;

    protected $fillable = [
        'name',
        'category_id',
        'price',
        'manufacturer',
        'weight',
        'description',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function category(): HasOne
    {
        return $this->hasOne(Category::class);
    }
}
