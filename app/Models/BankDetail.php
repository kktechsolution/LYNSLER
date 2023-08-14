<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'account_no',
        'bank_name',
        'branch_name',
        'ifsc_code',

    ];
}
