<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$this->authorize(['admin'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }
        $query = ProductImage::query();
        $results = Search($request,$query, function ($query) {
            return $query;
        });
        return Res('Product Images List.', $results, 200);
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
        if (!$this->authorize(['admin'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }

        $input = $request->all();
        $rules = array(
            'product_id' => ['required', Rule::exists('products', 'id')],
            'image' => 'required',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        $product_image = new ProductImage();

        $product_image->product_id = $request->product_id ;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('product/images/', $filename);
            $product_image->image = $filename;
        }



        $product_image->save();

        $message = 'Product Image Added.';
        $data = ['product_image' => $product_image];
        $code = 200;
        return Res($message, $data, $code);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$this->authorize(['admin'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }
        $query = ProductImage::find($id);
        $query->product->category;
        $results['product_image'] = $query;
        return Res('Single Product Image With Product And Category.', $results, 200);
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
        if (!$this->authorize(['admin'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }

        $input = $request->all();
        

        $product_image = ProductImage::find($id);

        if(empty($product_image)) {
            $message = 'Product Image Not Found.';
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('product/images/', $filename);
            File::delete('product/images/' . $product_image->getRawOriginal('image'));
            $product_image->image = $filename;
        }

        if($request->has('is_active')) {
            $product_image->is_active = $request->is_active;
        }




        $product_image->update();

        $message = 'Product Image Updated.';
        $data = ['product_image' => $product_image];
        $code = 200;
        return Res($message, $data, $code);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$this->authorize(['admin'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }



        $product_image = ProductImage::find($id);
        if (empty($product_image)) {
            $message = 'Product Image Not Found.';
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        File::delete('product/images/' . $product_image->getRawOriginal('image'));



        $product_image->delete();

        $message = 'Product Image Deleted.';
        $data = ['product_image' => $product_image];
        $code = 200;
        return Res($message, $data, $code);
    }
}
