<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!$this->authorize(['user'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }

        $address = UserAddress::where('user_id', Auth::user()->id)->get();
        return Res('user_address',$address,200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$this->authorize(['user'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }
        $address = new UserAddress();
        $address->user_id = Auth::user()->id;
        $address->address_line_1 = $request->address_line_1;
        $address->address_line_2 = $request->address_line_2;
        $address->address_line_3 = $request->address_line_3;
        $address->pincode = $request->pincode;
        $address->save();
        return Res('address stored',$address,200);
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
        if (!$this->authorize(['user'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }
        $address =  UserAddress::find($id);
        $address->address_line_1 = $request->address_line_1;
        $address->address_line_2 = $request->address_line_2;
        $address->address_line_3 = $request->address_line_3;
        $address->pincode = $request->pincode;
        $address->update();
        return Res('address updated',$address,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$this->authorize(['user'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }
        $address =  UserAddress::find($id);

        $address->delete();
        return Res('address deleted',$address,200);
    }
}
