<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            return view('pages.checkout');
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function placeOrder(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' =>'required|email',
            'phone' =>'required|numeric',
            'address' =>'required',
        ]);

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = Cart::subtotal();
        $order->tax = Cart::tax();
        $ordertotal = Cart::total();
        $order->total = $ordertotal;
        $order->firstname = $request->firstname;
        $order->lastname = $request->lastname;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->status = 'ordered';
        $order->save();
        // session()->with('message','order has been saved successfully!');

        foreach(Cart::content() as $item)
        {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        Cart::destroy();
        session()->forget('checkout');

        return redirect('/');
    }
}
