<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $fillable=[
            "name",
            "brand_id",
            "category_id",
            "warehouse_id",
            "manufactury_date",
            "expiry_date",
            "description",
            "image",
            "username",
            "quantity_in_stock",
            "unit_price",
            "selling_price",
            "updated_date"
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }
    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }
}
