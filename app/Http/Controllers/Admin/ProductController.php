<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImages;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->type != 'master_admin') {
            return redirect()->back();
        }


        $products = product::orderBy('name');
        // Default sorting
        // Check if request has a sort parameter
        if ($request->has('sort')) {
            $sortField = $request->get('sort');
            $sortDirection = $request->get('direction', 'asc');

            $products = Product::orderBy($sortField, $sortDirection);
        }

        $products = $products->paginate(5);
        // dd($catlogs);
        return view('admin.products', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->type != 'master_admin') {
            return redirect()->back();
        }
        $product_categories = ProductCategory::all();
        return view('admin.add_product', ['product_categories' => $product_categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->type != 'master_admin') {
            return redirect()->back();
        }

        $validated = $request->validate([
            'product_category_id' => 'required',
            'sort_description' => 'required',
            'quantity' => 'required',
            'sort_description' => 'required',
            'description' => 'required',
            'price' => 'required',
            'name' => 'required',
            'attributes' => 'required',
            'featured' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg', // Adjust this as per your image validation requirements
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg', // Adjust this as per your image validation requirements
        ]);

        // print_r($validated);
        // exit();
        // Handle single image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageFileName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('product_images/', $imageFileName);
            $validated['user_id'] = 1;
            $validated['image'] = $imageFileName;
        }
        $product = Product::create($validated);

        // Handle multiple images upload
        // Handle multiple images upload
        $images = $request->file('images');
        $validated['images'] = [];

        if (!empty($images) && is_array($images)) {
            foreach ($images as $image) {
                if ($image->isValid()) {
                    $extension = $image->getClientOriginalExtension();
                    $filename = time() . '_' . uniqid() . '.' . $extension;
                    $path = $image->move('product_images', $filename);

                    // Check if the file was successfully moved
                    if ($path) {
                        // Store the filename in the array
                        // $validated['images'][] = $filename;
                        ProductImages::create(['product_id' => $product->id, 'image' => $filename]);
                    } else {
                        // Handle the case where the file couldn't be moved
                    }
                } else {
                    // Handle the case where the file is not valid
                }
            }
        }

        // Now you can use $validated['images'] to save the filenames in your database or perform any other necessary actions

        // ...


        return redirect()->route('products.index')->with('success', 'Product added successfully.');
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
        if (Auth::user()->type != 'master_admin') {
            return redirect()->back();
        }
        $product = Product::find($id);
        $product->product_images;
        $product_categories = ProductCategory::all();
        return view('admin.edit_product', ['product' => $product,'product_categories' => $product_categories]);

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
        if (Auth::user()->type != 'master_admin') {
            return redirect()->back();
        }

        $validated = $request->validate([
            'product_category_id' => 'nullable',
            'sort_description' => 'nullable',
            'quantity' => 'nullable',
            'sort_description' => 'nullable',
            'description' => 'nullable',
            'price' => 'nullable',
            'name' => 'nullable',
            'attributes' => 'nullable',
            'featured' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg', // Adjust this as per your image validation requirements
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg', // Adjust this as per your image validation requirements
        ]);


        // Handle single image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageFileName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('product_images/', $imageFileName);
            $validated['user_id'] = 1;
            $validated['image'] = $imageFileName;
        }
        $product = Product::find($id);
        $product->update($validated);

        // Handle multiple images upload
        // Handle multiple images upload
        $images = $request->file('images');
        $validated['images'] = [];

        if (!empty($images) && is_array($images)) {

            $oldImg = ProductImages::where('product_id', $id)->delete();
            foreach ($images as $image) {
                if ($image->isValid()) {
                    $extension = $image->getClientOriginalExtension();
                    $filename = time() . '_' . uniqid() . '.' . $extension;
                    $path = $image->move('product_images', $filename);

                    // Check if the file was successfully moved
                    if ($path) {
                        // Store the filename in the array
                        // $validated['images'][] = $filename;
                        ProductImages::create(['product_id' => $product->id, 'image' => $filename]);
                    } else {
                        // Handle the case where the file couldn't be moved
                    }
                } else {
                    // Handle the case where the file is not valid
                }
            }
        }

        // Now you can use $validated['images'] to save the filenames in your database or perform any other necessary actions

        // ...


        return redirect()->route('products.index')->with('success', 'Product updated successfully.');    }

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
