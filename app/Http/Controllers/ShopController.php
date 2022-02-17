<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class ShopController extends Controller
{
    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in cart');
        // return redirect()->route('product.cart');
    }

    public function index()
    {
        $products = Product::paginate(12);
        return view('pages.shop', compact('products'));
    }
}
