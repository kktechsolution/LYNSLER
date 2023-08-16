<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'product_category_id',
        'sort_description',
        'quantity',
        'sort_description',
        'image',
        'description',
        'price',
        'in_stock',
        'is_active',

    ];

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class,'product_category_id');
    }

    public function product_images()
    {
        return $this->hasMany(ProductImages::class,'product_id');
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => env('APP_URL').'/product_images/'.$value,
        );
    }
}
