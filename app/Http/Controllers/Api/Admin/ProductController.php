<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
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
        $query = Product::query();
        $results = Search($request, $query, function ($query) {
            return $query->with(['brand', 'category', 'images']);
        });
        return Res('Product List.', $results, 200);
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
            'name' => 'required|unique:products',
            'zoho_id' => 'required|unique:products',
            'category_id' => ['required', Rule::exists('categories', 'id')->where('is_active', true)],
            'brand_id' => ['required', Rule::exists('brands', 'id')->where('is_active', true)],
            'product_code' => 'required|unique:products',
            'sort_description' => 'required',
            'long_description' => 'required',
            'thumbnail' => 'required',
            'relative_product_id' => 'nullable',
            'b_to_c_price' => 'required',
            'is_featured' => 'nullable',
            'b_to_b_price' => 'required',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }


        if ($request->hasfile('thumbnail')) {
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('product/thumbnail/', $filename);
            $input['thumbnail'] =  $filename;
        }

        $product = Product::create($input);

        if ($request->has('attribute')) {
            foreach ($request->attribute as $key => $value) {
                $product_attribute = new ProductAttribute();
                $product_attribute->product_id = $product->id;
                $product_attribute->attribute_name = $key;
                $product_attribute->attribute_value = $value;
                $product_attribute->save();
            }
        }

        $message = 'Product Added.';
        $data = ['product' => $product];
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
        $query = Product::find($id);
        $query->images;
        $query->product_attribute;
        $query->category;
        $query->brand;
        $results['product'] = $query;
        return Res('Single Product With Images And Category.', $results, 200);
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
        $rules = array(
            'name' => 'nullable|unique:products,name,' . $id,
            'zoho_id' => 'nullable|unique:products,zoho_id,' . $id,
            'category_id' => ['nullable', Rule::exists('categories', 'id')->where('is_active', true)],
            'brand_id' => ['required', Rule::exists('brands', 'id')->where('is_active', true)],
            'product_code' => 'nullable|unique:products,product_code,' . $id,
            'sort_description' => 'required',
            'long_description' => 'required',
            'thumbnail' => 'nullable',
            'relative_product_id' => 'nullable',
            'b_to_c_price' => 'required',
            'is_featured' => 'nullable',
            'b_to_b_price' => 'required',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        $product = Product::find($id);

        if (empty($product)) {
            $message = 'Product Not Found.';
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        if ($request->hasfile('thumbnail')) {
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('product/thumbnail/', $filename);
            File::delete('product/thumbnail/' . $product->getRawOriginal('thumbnail'));
            $input['thumbnail'] =  $filename;
        }

        $product->update($input);


        if ($request->has('attribute')) {
            $old_product_attribute = ProductAttribute::where('product_id', $product->id)->get();

            foreach ($old_product_attribute  as $attribute_old) {
                $attribute_old->delete();
            }
            foreach ($request->attribute as $key => $value) {
                $product_attribute = new ProductAttribute();
                $product_attribute->product_id = $product->id;
                $product_attribute->attribute_name = $key;
                $product_attribute->attribute_value = $value;
                $product_attribute->save();
            }
        }


        $message = 'Product Updated.';
        $data = ['product' => $product];
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



        $product = Product::find($id);
        if (empty($product)) {
            $message = 'Product Not Found.';
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        File::delete('product/thumbnail/' . $product->getRawOriginal('thumbnail'));

        $images = $product->images;

        foreach ($images as $image) {
            File::delete('product/images/' . $image->getRawOriginal('image'));
        }

        $product->delete();

        $message = 'Product Deleted.';
        $data = ['product' => $product];
        $code = 200;
        return Res($message, $data, $code);
    }
}
