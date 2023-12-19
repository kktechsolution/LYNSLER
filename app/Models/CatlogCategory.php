<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatlogCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',

    ];

    protected function icon(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => env('APP_URL').'/catlog_categories_icon/'.$value,
        );
    }

    public function catlog()
    {
        return $this->hasMany(Catlog::class);
    }
}
