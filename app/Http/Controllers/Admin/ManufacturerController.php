<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BankDetail;
use App\Models\ManufacturerDetail;
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
        $users = User::where('type','manufacturer')->orderBy('name');
        // Default sorting
        // Check if request has a sort parameter
        if ($request->has('sort')) {
            $sortField = $request->get('sort');
            $sortDirection = $request->get('direction', 'asc');

            $users = User::orderBy($sortField, $sortDirection);
        }

        $users = $users->paginate(5);
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
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'avatar' => 'required',
            'percentage' => 'nullable',
            'adhar_no' => 'nullable',
            'adhar_pic' => 'nullable',
            'account_no' => 'nullable',
            'bank_name' => 'nullable',
            'branch_name' => 'nullable',
            'ifsc_code' => 'nullable',

        ]);
        if ($request->hasfile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('avatar/', $filename);
            $validated['avatar'] =  $filename;
        }

        if ($request->hasfile('adhar_pic')) {
            $file = $request->file('adhar_pic');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('adhar_pic/', $filename);
            $validated['adhar_pic'] =  $filename;
        }



        $validated['user_id'] =  Auth::user()->id;
        $validated['password'] =  bcrypt($request->password);
        $validated['type'] =  "manufacturer";
        $validated['gender'] =  'male';
        $validated['remarks'] =  'Added By Admin';


        $user = User::create($validated);
        $validated['user_id'] =  $user->id;

        ManufacturerDetail::create($validated);
        BankDetail::create($validated);


        return redirect()->route('manufacturers.index')->with('success', 'Manufacturer  added successfully.');
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
        $user = User::find($id);
        if (empty($user)) {
            return redirect()->back();
        }

        $user->manufacturer_details;

        return view('admin.show_manufacturer', ['user' => $user]);
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
        $user = User::find($id);
        if (empty($user)) {
            return redirect()->back();
        }
        $user->manufacturer_details;

        return view('admin.edit_manufacturer', ['user' => $user]);
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
            'email' => 'nullable|unique:users,email,'.$id,
            'phone' => 'nullable|unique:users,email,'.$id,
            'password' => 'nullable',
            'gender' => 'nullable',
            'avatar' => 'nullable',
            'percentage' => 'nullable',
            'adhar_no' => 'nullable',
            'adhar_pic' => 'nullable',

        ]);
        $user = User::find($id);
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


        return redirect()->route('manufacturers.index')->with('success', 'Manufacturer Updated successfully.');
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
