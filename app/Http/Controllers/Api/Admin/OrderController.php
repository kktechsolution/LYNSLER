<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$this->authorize(['admin'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }
        $query = Order::query();
        $results = Search($request, $query, function ($query) {
            return $query->with(['customer']);
        });
        return Res('Order List.', $results, 200);
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
        if (!$this->authorize(['admin'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }


        $input = $request->all();
        $rules = array(
            'user_id' => ['required', Rule::exists('users', 'id')],
            'user_address_id' => ['required'],
            'order_type' => 'required',
            'payment_mode' => 'required',

        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://accounts.zoho.com.au/oauth/v2/token?refresh_token=1000.577db4b5787aa5d48354c3fc938439e3.1f50a901a5e8f4693b4dc14b767dd9e8&client_id=1000.B1QACEJF0GJ24KLRHPTMXGG5ASOSLS&client_secret=5d7fe7e94df4e5017116e73666d94472be7f48aef6&grant_type=refresh_token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'Cookie: 3e285c6f31=ab4135fb07b081628e9395b1c3f85d5b; _zcsr_tmp=c5af3eed-64c3-4f1c-88d2-bee7708e9603; iamcsr=c5af3eed-64c3-4f1c-88d2-bee7708e9603'
            ),
        ));

        $response1 = curl_exec($curl);

        curl_close($curl);
        $data_token = json_decode($response1, true);

        $access_token = $data_token['access_token'];

        $address = UserAddress::find($request->user_address_id);
        // $input[] = ['address' => $address];

        $add = $address->address_line_1 . "\n" . $address->address_line_2 . "\n" . $address->address_line_3 . "\n" . $address->postal_code . "\n";

        $order = Order::create($input);

        $xml = simplexml_load_file('https://www.ds.net.au/export/datafeeds/ds-standard-soh.xml');

        $total_amount = 0;
        $line_items = array();
        $tax_id = "70187000000011263";
        $tax_type = "tax";
        $tax_percentage = 10;

        if ($request->has('product_ids')) {
            foreach ($request->product_ids as $product_id) {
                $product_id1 = (json_decode($product_id));
                $product = Product::find($product_id1[0]);

                // return response($product);

                $order_details = new OrderDetail();
                $order_details->order_id = $order->id;
                $order_details->product_id = $product->id;
                $order_details->order_total = $product->b_to_b_price * $product_id1[1];
                $order_details->quantity = $product_id1[1];
                $total_amount += $product->b_to_b_price * $product_id1[1];
                $order_details->amount_to_pay = $product->b_to_b_price * $product_id1[1];
                foreach ($xml->item as $product1) {
                    if ($product1->vendor_sku == $product->product_code) {
                        $total_soh = (int) $product1->total_soh;
                        if ($total_soh == 0) {
                            $order_details->in_stock = false;
                        } else {
                            $order_details->in_stock = true;
                        }
                        break;
                    }
                    if (!isset($total_soh)) {
                        $order_details->in_stock = false;
                    }
                }

                // return response($product->zoho_id);
                $line_items[] = array(
                    "item_id" => $product->zoho_id,
                    "quantity" => $product_id1[1],
                    "tax_id" => $tax_id,
                    "tax_type" => $tax_type,
                    "tax_percentage" => $tax_percentage
                );
                $order_details->save();
            }
        }
        $order->order_total = $total_amount;
        $order->address = $add;
        $order->update();
        $reqDta = json_encode($line_items);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://www.zohoapis.com.au/books/v3/purchaseorders?organization_id=7002380328',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '  {  "vendor_id": "70187000000022382",
            "is_inclusive_tax": false,
            "line_items":' . $reqDta . '
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $access_token,
                'Cookie: JSESSIONID=BB651AF0E928A774C6C4CA984EE35EA5; _zcsr_tmp=bfeeebe1-dadc-4cbf-9cdb-cb42b6930e5a; f647a8ef34=7e271deb460052347510424ca814156d; zbcscook=bfeeebe1-dadc-4cbf-9cdb-cb42b6930e5a'
            ),
        ));
        $response2 = curl_exec($curl);
        curl_close($curl);
        // return response($response2);

        $message = 'Order Added.';
        $data = ['order' => $order->order_details];
        $code = 200;
        return Res($message, $data, $code);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$this->authorize(['admin'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }
        $query = Order::find($id);
        $query->order_details;
        $query->customer;
        return Res('Order List.', $query, 200);
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
        if (!$this->authorize(['admin'])) {
            return Res('Unauhorized Attempt.', [], 403);
        }


        $input = $request->all();
        $rules = array(
            'order_status' => 'required'
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $message = $validator->errors()->all();
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        $order_details = OrderDetail::find($id);

        if (empty($order_details)) {
            $message = ' Not Found.';
            $data = [];
            $code = 400;
            return Res($message, $data, $code);
        }

        $order_details->order_status = $request->order_status;
        $order_details->update();

        $message = 'Order Updated.';
        $data = ['order_details' => $order_details];
        $code = 200;
        return Res($message, $data, $code);
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
