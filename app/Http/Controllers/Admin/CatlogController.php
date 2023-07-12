<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catlog;
use App\Models\CatlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CatlogController extends Controller
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
        $catlogs = Catlog::orderBy('name'); // Default sorting
        // Check if request has a sort parameter
        if ($request->has('sort')) {
            $sortField = $request->get('sort');
            $sortDirection = $request->get('direction', 'asc');

            $catlogs = Catlog::orderBy($sortField, $sortDirection);
        }
        $catlogs = $catlogs->with(['Designer'])->paginate(3);
        return view('admin.catlogs', ['catlogs' => $catlogs]);
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

        $catlog_categories = CatlogCategory::all();

        return view('admin.add_catlog', ['catlog_categories' => $catlog_categories]);
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
            'name' => 'required',
            'description' => 'requried',
            'catlog_category_id' => 'requried',
            'img1' => 'requried',
            'img2' => 'requried',
            'img3' => 'requried',

        ]);
        if ($request->hasfile('img1')) {
            $file = $request->file('img1');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('catlog_images/', $filename);
            $validated['img1'] =  $filename;
        }

        if ($request->hasfile('img2')) {
            $file = $request->file('img2');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('catlog_images/', $filename);
            $validated['img2'] =  $filename;
        }

        if ($request->hasfile('img3')) {
            $file = $request->file('img3');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('catlog_images/', $filename);
            $validated['img3'] =  $filename;
        }

        $validated['user_id'] =  Auth::user()->id;


        Catlog::create($validated);


        return redirect()->route('catlogs.index')->with('success', 'Catlog  added successfully.');
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
        $catlog = Catlog::find($id);
        if (empty($catlog)) {
            return redirect()->back();
        }
        $catlog->Designer;

        return view('admin.show_catlog', ['catlog' => $catlog]);
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
        $catlog = Catlog::find($id);
        if (empty($catlog)) {
            return redirect()->back();
        }
        $catlog->Designer;
        $catlog_categories = CatlogCategory::all();

        return view('admin.edit_catlog', ['catlog_categories' => $catlog_categories]);
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
            'description' => 'nullable',
            'catlog_category_id' => 'nullable',
            'img1' => 'nullable',
            'img2' => 'nullable',
            'is_active' => 'nullable',
            'is_approved' => 'nullable',
        ]);

        $catlog = Catlog::find($id);
        if (empty($catlog)) {
            return redirect()->back();
        }

        if ($request->hasfile('img1')) {
            $file = $request->file('img1');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('catlog_images/', $filename);
            File::delete('catlog_images/' . $catlog->getRawOriginal('img1'));
            $validated['img1'] =  $filename;
        }

        if ($request->hasfile('img2')) {
            $file = $request->file('img2');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('catlog_images/', $filename);
            File::delete('catlog_images/' . $catlog->getRawOriginal('img2'));
            $validated['img2'] =  $filename;
        }

        if ($request->hasfile('img3')) {
            $file = $request->file('img3');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('catlog_images/', $filename);
            File::delete('catlog_images/' . $catlog->getRawOriginal('img3'));
            $validated['img3'] =  $filename;
        }



        $catlog->update($validated);


        return redirect()->route('catlogs.index')->with('success', 'Catlog  updated successfully.');
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
