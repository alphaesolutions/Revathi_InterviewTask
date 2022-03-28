<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\BillingAddress;
use App\Models\CustomerAddress;
use App\Models\Items;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('all'))
        {
            $order_details=Order::select('id','order_code','order_date','order_time','delivery_date','delivery_time','customer_id','customer_address_id','billing_address_id','order_status_id')->with('customer','billing_address','delivery_address','orderstatus','orderitem')->orderBy('id','Asc')->get();
        }else{
            $order_details=Order::select('id','order_code','order_date','order_time','delivery_date','delivery_time','customer_id','customer_address_id','billing_address_id','order_status_id')->with('customer','billing_address','delivery_address','orderstatus','orderitem');
            if($request->has('order_status_id'))
            {
                $order_details = $order_details->where('order_status_id','=',$request->order_status_id);
            }
            $order_details = $order_details->orderBy('id','Desc')->get();
        }

        return response()->json([
            'status' => 1,
            'data' => [
                'order_details' => $order_details,
            ]
        ]);
    }

    public function add_order(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'delivery_date' => 'required',
            'delivery_time' => 'required',
            'customer_id' => 'required',
            'complete_address' => 'required',
            'landmark' => 'required',
            'name' => 'required',
            'phone_no' => 'required',
            'item_id' => 'required|array',
            'item_quantity' => 'required|array',
        ]);
        if ($validator->fails()) {
            $rdata['status'] = 0;
            $rdata['message'] = $validator->errors()->first();
            $rdata['data'] = [];
            return response()->json($rdata);
        }
        $total_orders=Order::count();

        $order = Order::create([
            'order_code' => 'OR00'.$total_orders,
            'order_date' => date('Y-m-d'),
            'order_time' => date('H:i:s'),
            'delivery_date' => date('Y-m-d',strtotime($request->delivery_date)),
            'delivery_time' => date('H:i:s',strtotime($request->delivery_time)),
            'customer_id' => 1,
            'customer_address_id' => 0,
            'order_status_id' => 1,
            'total_item' => 0,
            'total_amount' => '0.00',
            'is_active' => 1,
        ]);

        $address = CustomerAddress::create([
            'address_type_id' => 1,
            'customer_id' => 1,
            'complete_address' => $request->complete_address,
            'landmark' => $request->landmark,
            'is_active' => 1,
        ]);

        $billing_address = BillingAddress::create([
            'customer_id' => 1,
            'order_id' => $order->id,
            'phone_no' => $request->phone_no,
            'name' => $request->name,
            'address' => $request->complete_address,
            'is_active' => 1,
        ]);

        $order_id=$order->id;
        $total_amount=array(0);
        foreach($request->item_id as $key=>$value) {
            $order = OrderItem::create([
                'order_id' => $order_id,
                'items_id' => $value,
                'quantity' => $request->item_quantity[$key],
                'amount' => 100,
                'created_by' => 1,
            ]); 
            
            $total_amount[]=100;
        }

        $data1['customer_address_id']=$address->id;
        $data1['billing_address_id']=$billing_address->id;
        $data1['total_item']=count($request->item_id);
        $data1['total_amount']=array_sum($total_amount);
        Order::where('id','=',$order_id)->update($data1);

        if($order)
        {
            return response()->json([
                'status' => 1,
                'data' => [
                    'message' => 'Order created successfully',
                    'status' => 'Order status is New',
                    'expected_delivery_date_time' => $request->delivery_date.' '.$request->delivery_time,
                ]
            ]);
        }

        return response()->json([
            'status' => 0,
            'message' => 'Sorry something went wrong.!',
            'data' => []
        ]);
    }

    public function update_status($id,Request $request)
    {
        $data = $request->all();
        $order = Order::find($id);
        if(!$order)
        {
            return response()->json([
                'status' => 0,
                'message' => 'Sorry something went wrong.!',
                'data' => []
            ]);
        }
        $data['order_status_id'] = $request->order_status_id;
        $order = Order::find($id)->update($data);
        if($order)
        {
            return response()->json([
                'status' => 1,
                'message' => 'Order status updated successfully!',
                'data' => []
            ]);
        }
    }    

    public function delay_orders()
    {
        $delay_orders=Order::select('id','order_code','order_date','order_time','delivery_date','delivery_time','customer_id','customer_address_id','billing_address_id','order_status_id')->where('order_status_id','=',3)->get();

        return response()->json([
            'status' => 1,
            'data' => [
                'delay_orders' => $delay_orders,
            ]
        ]);
    }
}
