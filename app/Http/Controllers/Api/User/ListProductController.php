<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListProductController extends Controller
{
    public function index(Request $request)
    {
        if (!$this->authorize(['user','designer'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }

        $query = Product::query();
        $results = Search($request, $query, function ($query) {
            return $query->with(['product_images','product_category']);
        });


        return Res('Search Results', $results, 200);
    }

    public function product_categpry_list(Request $request)
    {
        if (!$this->authorize(['user','designer'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }

        $query = ProductCategory::query();
        $results = Search($request, $query, function ($query) {
            return $query->with(['products']);
        });


        return Res('Search Results', $results, 200);
    }

    public function getDesigners(Request $request)
    {
        if (!$this->authorize(['user','designer'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }
        $lng = $request->lng;
        $lat = $request->lat;
        $circle_radius = 6371;
        $max_distance = 20;
        $designers = DB::select('SELECT * FROM
        (SELECT *, (' . $circle_radius . ' * acos(cos(radians(' . $lat . ')) * cos(radians(lat)) *
        cos(radians(lng) - radians(' . $lng . ')) +
        sin(radians(' . $lat . ')) * sin(radians(lat))))
        AS distance
        FROM designer_details) AS distances

        ORDER BY distance;

    ');
    return Res('Search Results', $designers, 200);
}

}