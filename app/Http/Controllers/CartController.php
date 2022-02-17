<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        return view('pages.cart');
    }

    public function checkout()
    {
        if(Auth::check())
        {
            return redirect()->route('checkout');
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {
        Cart::add($request->id, $request->name,$request->qty, $request->price)
            ->associate('App\Models\Product');

        return redirect()->back();
        // ->route('product.cart')
        // ->with('success_message','Item added in cart');
    }

    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success_message','Item Removed');
    }
}
