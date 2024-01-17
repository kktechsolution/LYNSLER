<?php

namespace App\Http\Controllers\Manufacturer;

use App\Http\Controllers\Controller;
use App\Models\BankDetail;
use App\Models\Extra;
use App\Models\Fabric;
use App\Models\ManufacturerDetail;
use App\Models\Order;
use App\Models\Transaction;
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
        $manufacturer = User::find(Auth::user()->id);
        $manufacturer->manufacturer_details;
        $manufacturer->get_bank_details;
        // var_dump($manufacturer);
        return view('Manufacturer.editprofile', ['manufacturer' => $manufacturer]);
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
            'email' => 'nullable|unique:users,email,' . Auth::user()->id,
            'phone' => 'nullable|unique:users,email,' . Auth::user()->id,
            'password' => 'nullable',
            'gender' => 'nullable',
            'avatar' => 'nullable',
            'percentage' => 'nullable',
            'adhar_no' => 'nullable',
            'adhar_pic' => 'nullable',
            'bank_name' => 'nullable',
            'branch_name' => 'nullable',
            'account_no' => 'nullable',
            'ifsc_code' => 'nullable',

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

        $manufacturer_details = ManufacturerDetail::where('user_id', $user->id)->get()->first();
        $manufacturer_details->update($validated);

        $bank_details = BankDetail::where('user_id', $user->id)->get()->first();
        $bank_details->update($validated);

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
        if (Auth::user()->type != 'manufacturer') {
            return redirect()->back();
        }

        $order = Order::find($id);
        $order->user;
        $order->designer;
        $order->fabric_order;
        $order->extras_order;
        $order->address;
        $order->order_details;
        $main_fabric = Fabric::find($order->order_details->fabric_id);
        $fabrics = [];
        foreach ($order->fabric_order as $fabric_o) {
            $fabric = Fabric::find($fabric_o->fabric_id);
            if ($fabric) {
                $fabric->used_for = $fabric_o->used_for;

                $fabrics[] = $fabric;
            }
        }

        $fabricsCollection = collect($fabrics);

        $extras = [];
        foreach ($order->extras_order as $fabric_o) {
            $extra = Extra::find($fabric_o->extra_id);
            if ($extra) {
                $extra->quantity = $fabric_o->quantity;
                $extra->total_amount = $fabric_o->total_amount;

                $extras[] = $extra;
            }
        }

        $extraCollection = collect($extras);

        return view('Manufacturer.orderDetails', ['order' => $order,'main_fabric' => $main_fabric,'fabrics'=>$fabricsCollection,'extras'=>$extraCollection]);
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

    public function myOrders()
    {
        if (Auth::user()->type != 'manufacturer') {
            return redirect()->back();
        }

        $orders = Order::with(['designer', 'user'])
            ->where('manufacturer_id', Auth::user()->id)
            ->paginate(3);

        return view('manufacturer.orderList', ['orders' => $orders]);
    }

    public function transactions()
    {
        if (Auth::user()->type != 'manufacturer') {
            return redirect()->back();
        }

        $transactions = Transaction::where('user_id',Auth::user()->id)->paginate(3);        ;
        return view('Manufacturer.trans', ['transactions' => $transactions]);

    }
}
