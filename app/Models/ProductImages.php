<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'image',

    ];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => env('APP_URL').'/product_images/'.$value,
        );
    }
}
