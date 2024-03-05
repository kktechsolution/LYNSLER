<?php

namespace App\Http\Controllers\Api\User;

use App\EcomOrders;
use App\EcomOrderItems;
use App\Product;
use App\Deliverystatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EcommerceOrder;
use App\Models\EcommerceOrderDetail;
use App\Models\ProductReview;
use App\ProductSizes;
use Illuminate\Support\Facades\Auth;

class EcomOrdersController extends Controller
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


        $orders = EcommerceOrder::where('user_id', Auth::user()->id)->with(['user_address','order_details'])->get();
        foreach($orders as $order)
        {
            foreach ($order->order_details as $orderDetail) {

            $product_review = ProductReview::where('user_id', Auth::user()->id)->where('product_id', $orderDetail->product_id)->get()->first();
            if(!empty($product_review))
            {
                $orderDetail->is_reviewed  = '1';
            }
            else
            {
                $orderDetail->is_reviewed  = '0';
            }
        }
        }
        return Res('my ecom orders',$orders,200);
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

        if (!$this->authorize(['user', 'designer'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }

        $ecom_order = new EcommerceOrder();
        $ecom_order->user_id = Auth::user()->id;
        $ecom_order->user_address_id = $request->user_address_id;
        $ecom_order->payment_type = $request->payment_type;
        if($request->payment_type == "ONLINE")
        {
            $ecom_order->razorpay_id = $request->razorpay_id;
            $ecom_order->payment_status = "compeleted";

        }
        $ecom_order->save();
        $amount = 0;
        foreach ($request->products as $product) {
            $order_details = new EcommerceOrderDetail();
            $order_details->order_id = $ecom_order->id;
            $order_details->product_id = $product['id'];
            $order_details->quantity = $product['quantity'];
            $order_details->color = $product['color'];
            $order_details->size = $product['size'];
            $order_details->amount = $product['quantity']*$product['amount'];
            $order_details->save();
            $amount += $order_details->amount;

        }

        $ecom_order->amount =$amount;
        $ecom_order->update();

        return Res("Order Placed",$ecom_order,200);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\EcomOrders  $ecomOrders
     * @return \Illuminate\Http\Response
     */
    public function show(EcomOrders $ecomOrders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EcomOrders  $ecomOrders
     * @return \Illuminate\Http\Response
     */
    public function edit(EcomOrders $ecomOrders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EcomOrders  $ecomOrders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$this->authorize(['user'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }
        $ecom_order = new EcommerceOrder();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EcomOrders  $ecomOrders
     * @return \Illuminate\Http\Response
     */
    public function destroy(EcomOrders $ecomOrders)
    {
        //
    }

    public function paymentProcess(Request $request)
    {

        $order = EcommerceOrder::find($request->orderid);
        $order->payment_status = "compeleted";
        $order->razorpay_id = $request->razorpayid;
        $order->update();


        $arr = array("status" => 200, "message" => 'Payment Status Upadated');

        return response($arr);
    }

    public function generateTrackingId()
    {

        $trackingid = rand(10, 100000000);

        return $this->checkTrackingId($trackingid);
    }

    public function checkTrackingId($trackingdid)
    {

        $verifytrackingid = EcomOrders::where('tracking_id', $trackingdid)->get();

        if (count($verifytrackingid) == 0) {

            return $trackingdid;
        } else {

            return $this->generateTrackingId();
        }
    }

    public function getOrderByTrackingId(Request $request)
    {

        $trackingid = $request->tracking_id;

        $order = EcomOrders::where('tracking_id', $trackingid)
            ->get();

        foreach ($order as $data) {
            $orderid = $data->id;
        }

        $status =  Deliverystatus::where('ecom_order_id', $orderid)->get();

        return response(['order' => $order, 'status_array' => $status, 'msg' => "Found", 'status' => 200]);
    }

    public function checkStockBySize($id)
    {

        $data = ProductSizes::find($id);

        return response(['msg' => "Success", 'data' => $data]);
    }
}
