<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignerReview extends Model
{
    use HasFactory;
    protected $fillable = ['designer_id', 'user_id', 'review', 'ratings', 'approved'];

}
