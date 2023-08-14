<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManufacturerDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'percentage',
        'adhar_no',
        'user_id',
        'adhar_pic',
        'lat',
        'lng',

    ];

    public function getAdharPicAttribute($value)
      {
          return env('APP_URL') . '/adhar_pic/' . $value;
      }
}
