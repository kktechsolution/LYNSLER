<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraOrder extends Model
{
    use HasFactory;

    public function trims()
    {
        return  $this->belongsTo(Extra::class,'extra_id');
    }
}
