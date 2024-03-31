<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManufacturingCost extends Model
{
    use HasFactory;

    protected $fillable = [
        'style_no',
        'style_name',
        'manufacuturing_cost',
      ];
}
