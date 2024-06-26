<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fabric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FabricController extends Controller
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


       $fabrics =Fabric::orderBy('name');
        // Default sorting
        // Check if request has a sort parameter
        if ($request->has('sort')) {
            $sortField = $request->get('sort');
            $sortDirection = $request->get('direction', 'asc');

            $fabrics = Fabric::orderBy($sortField, $sortDirection);
        }

        $fabrics = $fabrics->paginate(5);
        // dd($fabrics);
        return view('admin.fabrics', ['fabrics' => $fabrics]);
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

         return view('admin.add_fabric');
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
            'description' => 'required',
            'icon_image' => 'required',
            'price' => 'required',


        ]);
        if ($request->hasfile('icon_image')) {
            $file = $request->file('icon_image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('fabric_images/', $filename);
            $validated['icon_image'] =  $filename;
        }

        Fabric::create($validated);
        return redirect()->route('fabrics.index')->with('success', 'Fabric  added successfully.');
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

        $fabric = Fabric::find($id);

        return view('admin.edit_fabrics',['fabrics' => $fabric]);
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
            'name' => 'required',
            'description' => 'required',
            'icon_image' => 'nullable',
            'price' => 'required',


        ]);
        $fabric = Fabric::find($id);
        if ($request->hasfile('icon_image')) {
            $file = $request->file('icon_image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('fabric_images/', $filename);
            $validated['icon_image'] =  $filename;
        }

        $fabric->update($validated);
        return redirect()->route('fabrics.index')->with('success', 'Fabric updated successfully.');

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
