<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\OurTeam;
use Illuminate\Http\Request;

class AllTeaMemberController extends Controller
{
    public function index(Request $request)
    {
        $query = OurTeam::query();
        $results = Search($request,$query, function ($query) {
            return $query;
        });
        return Res('Team Members', $results, 200);
    }
}
