<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Banner;
use App\Models\Catlog;
use App\Models\CatlogCategory;
use App\Http\Controllers\Controller;
use App\Models\DesignerReview;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$this->authorize(['user', 'designer'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }
        $user = User::find(Auth::user()->id);
        $banners = Banner::all();
        $catlog_categories = CatlogCategory::with(['catlog'])->get();
        $products = Product::all();

        $results = Product::with(['product_images', 'product_category','product_reviews'])->get();


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

        return response(['user' => $user, 'banners' => $banners, 'catlog_categories' => $catlog_categories,'products' => $results]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
    foreach ($designers as $item) {
        $review = DesignerReview::where('designer_id',$item->user_id)->get();
        $catlog = Catlog::where("user_id",$item->user_id)->with('catlog_category')->get();
        $item->reviews = $review;
        $item->catlogs=$catlog;
        $item->designer = User::find($item->user_id);
        $x = 0;
            $r = 0;
            foreach($review as $reviews)
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
        return response($designers);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$this->authorize(['user', 'designer'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }

        $input = $request->all();
        $rules = array(
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users,email,' . auth::user()->id,
            'phone' => 'required|unique:users,phone,' . auth::user()->id,
            'gender' => 'required',
            'dob' => 'nullable',


        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array());
        } else {
            $user = User::find(auth::user()->id);
            $file = $request->file('image');
            if ($file != '') {

                $image1 = $request->file('image');
                $imageName1 = time() . $image1->getClientOriginalName();
                $file->move('avatar/', $imageName1);
                $user->avatar =  $imageName1;
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->dob = $request->dob;
            $user->update();


            $arr = array("status" => 200, "message" => 'Profile Updated', "user" => $user);
        }
        return response($arr);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
