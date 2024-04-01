<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function authorize($roles) {
        if (gettype($roles) == 'string') {
            $roles = [$roles];
        }else if (gettype($roles) == 'array') {
            $roles = $roles;
        }
        else {
            throw new \Exception('Invalid type of roles');
        }
        return in_array(Auth::user()->type, $roles);

    }

        public function demo()
        {
            if(Auth::user()->type == "master_admin")
            {
                return redirect()->route('dashboard.admin');
            }
            elseif(Auth::user()->type == "manufacturer")
            {
                return redirect()->route('manufacturer_home.create');
            }

        }
}
