<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomOrderController extends Controller
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


       $ecom_orders =Order::orderBy('id')->with(['user']);
        // Default sorting
        // Check if request has a sort parameter
        if ($request->has('sort')) {
            $sortField = $request->get('sort');
            $sortDirection = $request->get('direction', 'asc');

            $ecom_orders = Order::orderBy($sortField, $sortDirection);
        }

        $ecom_orders = $ecom_orders->paginate(5);
        // dd($catlogs);
        return view('admin.custom_orders', ['ecom_orders' => $ecom_orders]);
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
        //
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


        $order = Order::with(['designer','manufacturer','user','order_details','main_fabric','extras_order','fabric_order'])
        ->where('id', $id)
        ->get()->first();
        $manufactuers = User::where('type','manufacturer')->get();
        return view('admin.edit_custom_order', ['order' => $order,'manufacturer' => $manufactuers]);
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
            'order_status' => 'required',
            'manufacturer_id' => 'nullable',

        ]);

        $ecom_order = Order::find($id);
        $ecom_order->order_status = $request->order_status;
        if(!empty ($request->manufacturer_id))
        {
            $ecom_order->manufacturer_id = $request->manufacturer_id;
        }
        $ecom_order->update();

        return redirect()->route('custom_orders.index')->with('success', 'Order Status updated successfully.');
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
