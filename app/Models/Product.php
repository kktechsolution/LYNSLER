<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class,'product_category_id');
    }

    public function product_images()
    {
        return $this->hasMany(ProductImages::class,'product_id');
    }
}
