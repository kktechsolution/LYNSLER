<?php

namespace App\Http\Controllers\Manufacturer;

use App\Http\Controllers\Controller;
use App\Models\ManufacturerDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManufacturerHomeController extends Controller
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
        if (Auth::user()->type != 'manufacturer') {
            return redirect()->back();
        }

        return view('manufacturer.home', []);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->type != 'manufacturer') {
            return redirect()->back();
        }

        return view('Manufacturer.editprofile', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->type != 'manufacturer') {
            return redirect()->back();
        }
        $validated = $request->validate([
            'name' => 'nullable',
            'email' => 'nullable|unique:users,email,'.Auth::user()->id,
            'phone' => 'nullable|unique:users,email,'.Auth::user()->id,
            'password' => 'nullable',
            'gender' => 'nullable',
            'avatar' => 'nullable',
            'percentage' => 'nullable',
            'adhar_no' => 'nullable',
            'adhar_pic' => 'nullable',

        ]);
        $user = User::find(Auth::user()->id);
        if ($request->hasfile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('avatar/', $filename);
            $validated['avatar'] =  $filename;
        }



        $validated['user_id'] =  Auth::user()->id;
        $validated['password'] =  bcrypt($request->password);
        $validated['type'] =  "manufacturer";


        $user->update($validated);
        $validated['user_id'] =  $user->id;

        $manufacturer_details = ManufacturerDetail::where('user_id',$user->id)->get()->first();
        $manufacturer_details->update($validated);


        return redirect()->route('manufacturers.index')->with('success', 'Profile Updated successfully.');
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
