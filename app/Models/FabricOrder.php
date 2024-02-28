<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricOrder extends Model
{
    use HasFactory;

    public function fabrics()
    {
        return $this->belongsTo(Fabric::class,'fabric_id');
    }
}
