<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    protected $fillable = [
        'name',
        'icon',

    ];

    protected function icon(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => env('APP_URL').'/product_categories_icon/'.$value,
        );
    }
}
