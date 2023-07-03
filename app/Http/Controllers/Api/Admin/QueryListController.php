<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUsData;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class QueryListController extends Controller
{
    public function query_list(Request $request)
    {
        if (!$this->authorize(['admin'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }

        $query = ContactUsData::query();
        $results = Search($request,$query, function ($query) {
            return $query;
        });
        return Res('Search Results', $results, 200);
    }

    public function all_newsletters(Request $request)
    {
        if (!$this->authorize(['admin'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }

        $query = Newsletter::query();
        $results = Search($request,$query, function ($query) {
            return $query;
        });
        return Res('Search Results', $results, 200);
    }

    public function query_read($id)
    {
        if (!$this->authorize(['admin'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }

        $query = ContactUsData::find($id);
        if (empty($query)) {
            $message = 'Data Not Found.';
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        $query->is_readed = true;

        $query->update();

        $message = 'Query Readed .';
        $data = ['query' => $query];
        $code = 200;
        return Res($message, $data, $code);
    }



}
