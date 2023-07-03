<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckAuthController extends Controller
{
    public function checkAuthUser()
    {
        return Res('Please Login To Continue', [], 401);
    }
}
