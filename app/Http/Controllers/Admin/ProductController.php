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


       $products =product::orderBy('name');
        // Default sorting
        // Check if request has a sort parameter
        if ($request->has('sort')) {
            $sortField = $request->get('sort');
            $sortDirection = $request->get('direction', 'asc');

            $products = Product::orderBy($sortField, $sortDirection);
        }

        $products = $products->paginate(3);
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
         return view('admin.add_product',['product_categories' => $product_categories]);
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
        // dd($request->all());

        $validated = $request->validate([
            'product_category_id' => 'required',
            'sort_description' => 'required',
            'quantity' => 'required',
            'sort_description' => 'required',
            'image' => 'required',
            'description' => 'required',
            'price' => 'required',
            'name' => 'required',
        ]);
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('product_images/', $filename);
            $validated['image'] =  $filename;
        }
        // dd($request->file('images'));






        $validated['user_id'] =  Auth::user()->id;
        // $validated['password'] =  bcrypt($request->password);
        // $validated['type'] =  "user";
        // $validated['gender'] =  'male';
        // $validated['remarks'] =  'Added By Admin';


        $product = Product::create($validated);

        $images = $request->file('images');

        if (!empty($images) && is_array($images)) {
            foreach ($images as $image) {
                // Check if the file is valid
                if ($image->isValid()) {
                    $extension = $image->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;

                    // Store the file in the storage disk
                    $path = $image->storeAs('product_images', $filename, 'public');

                    // Check if the file was successfully stored
                    if ($path) {
                        ProductImages::create(['product_id' => $product->id, 'image' => $filename]);

                    } else {
                        // Handle the case where the file couldn't be stored
                    }
                } else {
                    // Handle the case where the file is not valid
                }
            }
        }

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
        //
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
