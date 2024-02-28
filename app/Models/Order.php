<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    public function user()
{
    return $this->belongsTo(User::class,'user_id');
}

public function designer()
{
    return $this->belongsTo(User::class,'designer_id');
}

public function manufacturer()
{
    return $this->belongsTo(User::class,'manufacturer_id');
}

public function main_fabric()
{
    return $this->belongsTo(Fabric::class,'fabric_id');
}

public function extras_order()
{
    return  $this->hasMany(ExtraOrder::class,'order_id')->with(['trims']);
}

public function fabric_order()
{
    return  $this->hasMany(FabricOrder::class,'order_id')->with('fabrics');
}

public function address()
{
    return $this->belongsTo(UserAddress::class,'user_address_id');
}

public function order_details()
    {
        return $this->hasOne(OrderDetail::class)->with('style');
    }

}


