<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!$this->authorize(['user', 'designer'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }

        $review =  ProductReview::where('user_id', Auth::user()->id)->get();

        return Res("All My Product Reviews",$review,200);


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
        $input = $request->all();
        $rules = array(
            'product_id' => 'required|exists:products,id',

            'review' => 'required',
            'ratings' => 'required',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array());
            return response($arr);
        }
        $input['user_id'] = Auth::user()->id;
        $check = ProductReview::where('user_id',Auth::user()->id)->where('product_id',$request->product_id)->get()->first();
        if(!empty($check))
        {
            return Res('Review Already Added.',$check,200);

        }
        $review = ProductReview::create($input);
        return Res('Review Added.',$review,200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$this->authorize(['user', 'designer'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }

        $review =  ProductReview::findOrFail($id);
        return Res("Review Fetched. ",$review,200);

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

        $review =  ProductReview::findOrFail($id);

        $review->update($request->all());

        return Res("Product Review Updated.",$review,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$this->authorize(['user', 'designer'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }

        $review =  ProductReview::findOrFail($id);

        $review->delete($id);

        return Res("Product Review Deleted.",$review,200);
    }
}
