<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

use Google\Client;
use Google\Service\MyBusinessAccountManagement;
use Google\Service\MyBusinessAccountManagement\Account;
use Google\Service\MyBusinessAccountManagement\ListAccountsResponse as ListAccounts;

class AllBannerController extends Controller
{
    public function index(Request $request)
    {
        $query = Banner::query();
        $results = Search($request, $query, function ($query) {
            return $query;
        });
        // $client = new Client([
        //     'client_id' => '330937842304-39v0f78uduj8c3j9j0tqjd1ebbi2q3kd.apps.googleusercontent.com',
        //     'client_secret' => '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',
        // ]);

        // $x = new MyBusinessAccountManagement($client);
        // dd($x->accounts->listAccounts());
        return Res('Banner List.', $results, 200);
    }
}
