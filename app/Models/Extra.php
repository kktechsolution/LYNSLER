<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    use HasFactory;

    public function getIconImageAttribute($value)
    {
        return env('APP_URL') . '/extra_images/' . $value;
    }
}
