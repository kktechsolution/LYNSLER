<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'name',
        'image',
      ];
    public function getImageAttribute($value)
    {
        return env('APP_URL') . '/extra_images/' . $value;
    }
}
