<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderDetailsController extends Controller
{
    public function mount($order_id)
    {
        $this->$order_id = $order_id;
    }

    public function index($order_id)
    {
        $order = Order::find($order_id);
        return view('pages.admin.admin-oder-details',['order'=>$order]);
    }
}
