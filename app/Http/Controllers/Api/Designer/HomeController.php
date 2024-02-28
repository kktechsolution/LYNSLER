<?php

namespace App\Http\Controllers\Api\Designer;

use App\Http\Controllers\Controller;
use App\Models\BankDetail;
use App\Models\Banner;
use App\Models\Catlog;
use App\Models\CatlogCategory;
use App\Models\DesignerDetail;
use App\Models\Extra;
use App\Models\Fabric;
use App\Models\ManufacturingCost;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!$this->authorize(['user', 'designer'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }
        $designer = array_merge(User::find(Auth::user()->id)->toArray(), DesignerDetail::where('user_id', auth::user()->id)->get()->first()->toArray());
        $bank_details = BankDetail::where('user_id', auth::user()->id)->get()->first();
        $banners = Banner::all();
        $catlog_categories = CatlogCategory::all();
        $catlog_details = Catlog::where('user_id', Auth::user()->id)->get();

        return response(['designer_details' => $designer, 'banners' => $banners, 'bank_details' => $bank_details, 'catlog_categories' => $catlog_categories, 'my_catlogs' => $catlog_details]);
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
        if (!$this->authorize(['designer'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }
        $input = $request->all();
        $rules = array(
            'account_no' => 'required',
            'bank_name' => 'required',
            'branch_name' => 'required',
            'ifsc_code' => 'required',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array());
            return response($arr);
        }
        $input['user_id'] = Auth::user()->id;
        $bank_details = BankDetail::where('user_id', Auth::user()->id)->get()->first();
        if (!empty($bank_details)) {
            $bank_details->update($input);
        } else {
            $bank_details = BankDetail::create($input);
        }
        $arr = array("status" => 200, "message" => "bank details updated", "data" => $bank_details);
        return response($arr);
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
        if (!$this->authorize(['designer'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }
        $input = $request->all();
        $rules = array(
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users,email,' . auth::user()->id,
            'phone' => 'required|unique:users,phone,' . auth::user()->id,
            'gender' => 'required',
            // 'address' => 'required',
            'title_tag' => 'required',
            'description' => 'required',
            'adhar_no' => 'required',
            'lat' => 'required',
            'lng' => 'required',

        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array());
        } else {
            $user = User::find(auth::user()->id);
            $designer_details = DesignerDetail::where('user_id', auth::user()->id)->get()->first();
            $file = $request->file('image');
            $file2 = $request->file('adhar_image');
            if ($file != '') {
                $request->validate([
                    'avatar' =>  'image'
                ]);
                $image1 = $request->file('avatar');
                $imageName1 = time() . $image1->getClientOriginalName();
                $file->move('avatar/', $imageName1);

                $user->avatar =  $imageName1;
            }
            if ($file2 != '') {
                $request->validate([
                    'adhar_pic' =>  'image'
                ]);
                $image2 = $request->file('adhar_pic');
                $imageName2 = time() . $image2->getClientOriginalName();
                $file2->move('adhar_pic/', $imageName2);

                $designer_details->adhar_pic =  $imageName2;
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->update();

            $designer_details->title_tag = $request->title_tag;
            $designer_details->description = $request->description;
            $designer_details->adhar_no = $request->adhar_no;
            $designer_details->lat = $request->lat;
            $designer_details->lng = $request->lng;
            $designer_details->update();
            $designer_detail = array_merge($user->toArray(), $designer_details->toArray());
            $arr = array("status" => 200, "message" => 'Profile Updated', "designer_details" => $designer_detail);
        }
        return response($arr);
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

    public function preOrderData()
    {
        if (!$this->authorize(['user', 'designer'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }
        $trims = Extra::all();
        $fabrics = Fabric::all();
        $styles = ManufacturingCost::all();
        return response(['trims' => $trims, 'fabrics' => $fabrics, 'styles' => $styles]);
    }

    public  function order(Request $request)
    {
        if (!$this->authorize(['user', 'designer'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }
        $input = $request->all();
        $rules = array(
            'design_image_1' => 'required',
            'design_image_2' => 'required',
            'design_image_4' => 'required',
            'design_image_3' => 'required',
            'order_id' => 'required',


        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array());
            return response($arr);
        }

                $design_image_1 = $request->file('design_image_1');
                $design_image_1_name = time() . $design_image_1->getClientOriginalName();
                $design_image_1->move('order_image/', $design_image_1_name);

                $design_image_2 = $request->file('design_image_2');
                $design_image_2_name = time() . $design_image_2->getClientOriginalName();
                $design_image_2->move('order_image/', $design_image_2_name);

                $design_image_3 = $request->file('design_image_3');
                $design_image_3_name = time() . $design_image_3->getClientOriginalName();
                $design_image_3->move('order_image/', $design_image_3_name);

                $design_image_4 = $request->file('design_image_4');
                $design_image_4_name = time() . $design_image_4->getClientOriginalName();
                $design_image_4->move('order_image/', $design_image_4_name);

        $order = Order::find($request->order_id);
        $order_details = OrderDetail::where('order_id',$order->id)->get()->first();
        if(!empty($order_details)){
            $order_details->design_image_1 = $design_image_1_name;
            $order_details->design_image_2 = $design_image_2_name;
            $order_details->design_image_3 = $design_image_3_name;
            $order_details->design_image_4 = $design_image_4_name;
            $order_details->update();
            $order->order_status = "design_compelete";
            $order->update();

        }
        return Res('Order Updated.', ['order'=>$order,'order_details'=>$order_details], 200);
    }

    public function getOrders()
    {
       $orders = Order::where('designer_id', Auth::user()->id)->with(['order_details','main_fabric','extras_order','fabric_order',])
        ->orderBy('id', 'desc')
        ->get();
        return Res('My Order List.', $orders, 200);
    }

    public function getTransactions()
    {
       $orders = Transaction::where('user_id', Auth::user()->id)->with('order')
        ->orderBy('id', 'desc')
        ->get();
        return Res('My Transactions List.', $orders, 200);
    }
}
