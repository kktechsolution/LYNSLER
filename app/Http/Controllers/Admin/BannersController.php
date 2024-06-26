<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BannersController extends Controller
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
        $catlog_categories = Banner::paginate(5); // Default sorting
        // Check if request has a sort parameter

        return view('admin.banners', ['catlog_categories' => $catlog_categories]);
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

        return view('admin.add_banner');
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
            'name' => 'required|unique:banners',
            'banner' => 'required',
            'title_1' => 'nullable',
            'title_2' => 'nullable',
            'title_3' => 'nullable',
            'url' => 'nullable',
        ]);
        if ($request->hasfile('banner')) {
            $file = $request->file('banner');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('banner_image/', $filename);
            $validated['banner'] =  $filename;
            // dd($filename);
        }
        Banner::create($validated);
        return redirect()->route('banners.index')->with('success', 'Banner added successfully.');
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
        $catlog_category = Banner::find($id);
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
        $catlog_category = Banner::find($id);
        if (empty($catlog_category)) {
            return redirect()->back();
        }

        return view('admin.edit_banner', ['banner' => $catlog_category]);
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
            'name' => 'nullable',
            'banner' => 'nullable',
        ]);


        $catlog_category = Banner::find($id);

        if (empty($catlog_category)) {
            return redirect()->back();
        }

        if ($request->hasfile('banner')) {
            $file = $request->file('banner');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('banner_image/', $filename);
            File::delete('banner_image/' . $catlog_category->getRawOriginal('banner'));
            $validated['banner'] =  $filename;
        }

        $catlog_category->update($validated);
        return redirect()->route('banners.index')->with('success', 'Banner updated successfully.');
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

        // $catlog_category = Banner::find($id);
        // if (empty($catlog_category)) {
        //     $message = 'Catlog Catehory Not Found.';
        //     $data = [];
        //     $code = 400;
        //     return Res($message, $data, $code);
        // }

        // File::delete('banner_image/' . $catlog_category->getRawOriginal('banner'));

        // $catlog_category->delete();

        // $message = 'Catlog Category Deleted.';
        // $data = ['catlog_category' => $catlog_category];
        // $code = 200;
        // return Res($message, $data, $code);
    }
}
