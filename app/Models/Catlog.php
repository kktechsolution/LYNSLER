<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catlog extends Model
{
    use HasFactory;

    protected $fillable = [
        'catlog_category_id',
        'user_id',
        'name',
        'description',
        'img1',
        'img2',
        'img3',
        'is_approved',
        'is_active',
        'is_admin',
    ];

    public function Designer()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function catlog_category()
    {
        return $this->belongsTo(CatlogCategory::class);
    }

    protected function img1(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => env('APP_URL').'/catlog_images/'.$value,
        );
    }

    protected function img2(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => env('APP_URL').'/catlog_images/'.$value,
        );
    }

    protected function img3(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => env('APP_URL').'/catlog_images/'.$value,
        );
    }
}
