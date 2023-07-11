<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CatlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CatlogCategoriesController extends Controller
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
        $catlog_categories = CatlogCategory::orderBy('name'); // Default sorting
        // Check if request has a sort parameter
        if ($request->has('sort')) {
            $sortField = $request->get('sort');
            $sortDirection = $request->get('direction', 'asc');

            $catlog_categories = CatlogCategory::orderBy($sortField, $sortDirection);
        }

        $catlog_categories = CatlogCategory::paginate(5);
        return view('admin.catlog_categories', ['catlog_categories' => $catlog_categories]);
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

        return view('admin.add_catlog_category');
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
            'name' => 'required|unique:catlog_categories',
            'icon' => 'required',

        ]);
        if ($request->hasfile('icon')) {
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('catlog_categories_icon/', $filename);
            $validated['icon'] =  $filename;
            // dd($filename);
        }
        CatlogCategory::create($validated);


        return redirect()->route('catlog_categories.index')->with('success', 'Catlog Category added successfully.');
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
        $catlog_category = CatlogCategory::find($id);
        if (empty($catlog_category)) {
            return redirect()->back();
        }

        return view('admin.show_catlog_category', ['catlog_category' => $catlog_category]);
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
        $catlog_category = CatlogCategory::find($id);
        if (empty($catlog_category)) {
            return redirect()->back();
        }

        return view('admin.edit_catlog_category', ['catlog_category' => $catlog_category]);
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
            'name' => 'nullable||unique:catlog_categories,name,' . $id,
            'icon' => 'nullable',
        ]);


        $catlog_category = CatlogCategory::find($id);

        if (empty($catlog_category)) {
            return redirect()->back();
        }

        if ($request->hasfile('icon')) {
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('catlog_categories_icon/', $filename);
            File::delete('catlog_categories_icon/' . $catlog_category->getRawOriginal('icon'));
            $validated['icon'] =  $filename;
        }

        $catlog_category->update($validated);
        return redirect()->route('catlog_categories.index')->with('success', 'Catlog Category updated successfully.');
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

        // $catlog_category = CatlogCategory::find($id);
        // if (empty($catlog_category)) {
        //     $message = 'Catlog Catehory Not Found.';
        //     $data = [];
        //     $code = 400;
        //     return Res($message, $data, $code);
        // }

        // File::delete('catlog_categories_icon/' . $catlog_category->getRawOriginal('icon'));

        // $catlog_category->delete();

        // $message = 'Catlog Category Deleted.';
        // $data = ['catlog_category' => $catlog_category];
        // $code = 200;
        // return Res($message, $data, $code);
    }
}
