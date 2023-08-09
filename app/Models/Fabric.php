<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabric extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'name',
        'description',
        'icon_image',
      ];
      public function getIconImageAttribute($value)
      {
          return env('APP_URL') . '/fabric_images/' . $value;
      }
}


