<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class OrderDetail extends Model
{
    use HasFactory;
    protected $appends = ['design_image_1_url','design_image_2_url','design_image_3_url','design_image_4_url'];

    public function getDesignImage1UrlAttribute()
    {
        return env('APP_URL') . '/order_image/' . $this->attributes['design_image_1'];
    }

    public function getDesignImage2UrlAttribute()
    {
        return env('APP_URL') . '/order_image/' . $this->attributes['design_image_2'];
    }

    public function getDesignImage3UrlAttribute()
    {
        return env('APP_URL') . '/order_image/' . $this->attributes['design_image_3'];
    }

    public function getDesignImage4UrlAttribute()
    {
        return env('APP_URL') . '/order_image/' . $this->attributes['design_image_4'];
    }

    public function fabric()
    {
        return $this->belongsTo(Fabric::class,'fabric_id');
    }


}

