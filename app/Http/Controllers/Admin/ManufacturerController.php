<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManufacturerController extends Controller
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
        $users = User::wherte('type','manufacturer')->orderBy('name');
        // Default sorting
        // Check if request has a sort parameter
        if ($request->has('sort')) {
            $sortField = $request->get('sort');
            $sortDirection = $request->get('direction', 'asc');

            $users = User::orderBy($sortField, $sortDirection);
        }

        $users = $users->paginate(3);
        return view('admin.manufacturers', ['manufacturers' => $users]);
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

        return view('admin.add_manufacturer');
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
            'email' => 'requried',
            'phone' => 'requried',
            'password' => 'requried',
            'gender' => 'requried',
            'avatar' => 'requried',

        ]);
        if ($request->hasfile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('avatar/', $filename);
            $validated['avatar'] =  $filename;
        }



        $validated['user_id'] =  Auth::user()->id;
        $validated['type'] =  "manufacturer";


        User::create($validated);


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
