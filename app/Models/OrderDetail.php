<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    public function fabric()
    {
        return $this->belongsTo(Fabric::class,'fabric_id');
    }
}
