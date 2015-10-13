<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }

    public function orders(Order $order)
    {
        return $order->get_group_orders();
    }

    public function add_order()
    {
        return view('orders.add_order');
    }

    public function save_order(Request $request)
    {
        $order_id = rand(1,10000000);

        $new_order = $request->all();
        $new_order['order_id'] = $order_id;

        if(Order::create($new_order))
        {
            $status = '1';
        }
        else
        {
            $status = '0';
        }
        return response()->json(['status'=>$status]);
    }

    public function view_order($id)
    {
        return view('orders.orders_list',['order_id'=>$id]);
    }

    public function get_order($id,Order $order)
    {
        return $order->get_order_by_id($id);
    }

    public function delete_order($id,Order $order)
    {
        if($order->delete_order_by_id($id))
        {
            return response()->json(['status'=>'1']);
        }
        else
        {
            return response()->json(['status'=>'0']);
        }
    }

    public function save_order_list(Request $request,Order $order)
    {
        $data = $request->all();

        $order_id = $data[0]['order_id'];

        $status = true;

        foreach($data as $val)
        {
            $val['available'] = $val['available'] ? 1 : 0;

            if(!$val['order_id'])
            {
                $val['order_id'] = $order_id;
                $status = $status && Order::create($val);
            }
            else
            {
                $update_data['price'] = $val['price'];
                $update_data['description'] = $val['description'];
                $update_data['available'] = $val['available'];

                $status = $status && $order->update_order_by_id($val['id'],$update_data);
            }
        };

        return response()->json(['status'=>$status]);
    }
}
