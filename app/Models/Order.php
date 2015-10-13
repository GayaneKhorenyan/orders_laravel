<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = array('order_id','price', 'description','available');

    public $timestamps = false;

    public function get_group_orders()
    {
        $orders = Order::orderBy('id', 'desc')
            ->groupBy('order_id')
            ->get();

        return $orders;
    }

    public function get_order_by_id($id)
    {
        return Order::where('order_id', '=', $id)->get()->toArray();
    }

    public function delete_order_by_id($id)
    {
        $order = Order::find($id);

        return $order->delete();
    }

    public function update_order_by_id($id,$data)
    {
        return Order::find($id)->update($data);
    }
}
