<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders =  Order::orderBy('status','ASC')->orderBy('created_at','DESC')->paginate(10);
        return view('pages.admin.admin-oder',['orders' => $orders]);
    }

    public function updateOrderStatus(Request $request)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);
        
        $order = Order::find($request->id);
        $order->status = $request->input('status');
        if($order->status == "delivered")
        {
            $order->delivered_date = DB::raw('CURRENT_DATE');
        }
        else if($order->status == "canceled")
        {
            $order->canceled_date = DB::raw('CURRENT_DATE');
        }
        $order->save();
        session()->flash('order_message','Order status has been updates successfully!');
        
        return redirect('admin/orders')->with('order_message','Order status has been updates successfully!');
    }
}
