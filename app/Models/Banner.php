<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'banner',
        'title_1',
        'title_2',
        'title_3',
        'url',
        'is_active',
    ];

    protected function banner(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => env('APP_URL').'/site_banner/'.$value,
        );
    }
}
