<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcommerceOrder extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function user_address()
    {
        return $this->belongsTo(UserAddress::class,'user_address_id');
    }

    public function order_details()
    {
        return $this->hasMany(EcommerceOrderDetail::class,'order_id')->with('products');
    }

}
