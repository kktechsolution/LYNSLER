<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class AllBlogsController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query();
        $results = Search($request,$query, function ($query) {
            return $query;
        });
        return Res('Post List.', $results, 200);
    }

    public function categories(Request $request)
    {

        $query = Category::query();
        $results = Search($request,$query, function ($query) {
            return $query->with('products');
        });
        return Res('All Categories Results', $results, 200);
    }

    public function product(Request $request)
    {

        $query = Product::query();
        $results = Search($request,$query, function ($query) {
            return $query->with(['images','category']);
        });
        return Res('All Products Results', $results, 200);
    }
}
