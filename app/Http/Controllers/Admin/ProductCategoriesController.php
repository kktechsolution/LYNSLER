<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductCategoriesController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
     {
         $this->middleware('auth');
     }


    public function index(Request $request)
    {
        if (Auth::user()->type != 'master_admin') {
            return redirect()->back();
        }
        $product_categories = ProductCategory::orderBy('name'); // Default sorting
        // Check if request has a sort parameter
        if ($request->has('sort')) {
            $sortField = $request->get('sort');
            $sortDirection = $request->get('direction', 'asc');

            $product_categories = ProductCategory::orderBy($sortField, $sortDirection);
        }

        $product_categories = $product_categories->paginate(5);
        return view('admin.product_categories', ['product_categories' => $product_categories]);
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

        return view('admin.add_product_category');
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
            'name' => 'required|unique:product_categories',
            'icon' => 'required',

        ]);
        if ($request->hasfile('icon')) {
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('product_categories_icon/', $filename);
            $validated['icon'] =  $filename;
            // dd($filename);
        }
        ProductCategory::create($validated);


        return redirect()->route('product_categories.index')->with('success', 'Product Category added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->type != 'master_admin') {
            return redirect()->back();
        }
        $product_category = ProductCategory::find($id);
        if (empty($product_category)) {
            return redirect()->back();
        }

        return view('admin.show_product_category', ['product_category' => $product_category]);
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
        $product_category = ProductCategory::find($id);
        if (empty($product_category)) {
            return redirect()->back();
        }

        return view('admin.edit_product_category', ['product_category' => $product_category]);
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
            'name' => 'nullable||unique:product_categories,name,' . $id,
            'icon' => 'nullable',
        ]);


        $product_category = ProductCategory::find($id);

        if (empty($product_category)) {
            return redirect()->back();
        }

        if ($request->hasfile('icon')) {
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('product_categories_icon/', $filename);
            File::delete('product_categories_icon/' . $product_category->getRawOriginal('icon'));
            $validated['icon'] =  $filename;
        }

        $product_category->update($validated);
        return redirect()->route('product_categories.index')->with('success', 'Product Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if (!$this->authorize(['master_admin'])) {
        //     return Res('Unauhorized Attempt.', [], 403);
        // }

        // $product_category = ProductCategory::find($id);
        // if (empty($product_category)) {
        //     $message = 'Product Catehory Not Found.';
        //     $data = [];
        //     $code = 400;
        //     return Res($message, $data, $code);
        // }

        // File::delete('product_categories_icon/' . $product_category->getRawOriginal('icon'));

        // $product_category->delete();

        // $message = 'Product Category Deleted.';
        // $data = ['product_category' => $product_category];
        // $code = 200;
        // return Res($message, $data, $code);
    }
}
