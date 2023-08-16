<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignerDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title_tag',
        'percentage',
        'adhar_no',
        'user_id',
        'adhar_pic',
        'lat',
        'lng',

    ];
}
