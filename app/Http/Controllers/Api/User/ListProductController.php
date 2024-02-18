<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Catlog;
use App\Models\CatlogCategory;
use App\Models\Extra;
use App\Models\Fabric;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListProductController extends Controller
{
    public function index(Request $request)
    {
        if (!$this->authorize(['user', 'designer'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }

        $query = Product::query();
        $results = Search($request, $query, function ($query) {
            return $query->with(['product_images', 'product_category','product_reviews']);
        });

        foreach($results as $item){
            $x = 0;
            $r = 0;
            foreach($item->product_reviews as $reviews)
            {
                $user = User::find($reviews->user_id);
                $reviews->user = $user;
                $r += $reviews->ratings;
                $x++;

            }
            if($x!=0)
            {
            $item->avg_rate = $r/$x;
            }
            else
            {
                $item->avg_rate=5;
            }

        }

        return Res('Search Results', $results, 200);
    }

    public function product_categpry_list(Request $request)
    {
        if (!$this->authorize(['user', 'designer'])) {
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
        if (!$this->authorize(['user', 'designer'])) {
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

    public function get_fabrics()
    {
        $fabrics = Fabric::all();
        return response($fabrics);
    }

    public function get_extras()
    {
        $trims = Extra::all();
        return response($trims);
    }

    public function catlog_categories()
    {
        $trims = CatlogCategory::with('catlog')->get();
        return response($trims);
    }

    public function catlogs()
    {
        $trims = Catlog::all();
        return response($trims);
    }

    public function get_designer($id)
    {
        $trims = User::find($id);
        $trims->designer_details;
        $trims->catlogs;

        return response($trims);
    }
}
