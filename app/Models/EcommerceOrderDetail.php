<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcommerceOrderDetail extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id')->with('product_category');
    }

}
