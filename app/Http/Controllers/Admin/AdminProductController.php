<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('pages.admin.admin-product', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::where('id',$id)->first();
        return view('pages.admin.admin-edit-product-component', compact('product'));
    }

    public function create()
    {
        return view('pages.admin.admin-add-product-component');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'regular_price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'regular_price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        $product = Product::find($request->id);
        $product->name = $request->input('name');
        $product->regular_price = $request->input('regular_price');
        $product->sale_price = $request->input('sale_price');
        $product->quantity = $request->input('quantity');

        $product->update();
        session()->flash('message','Product has been updated successfully!');

        return redirect('admin/products')->with('message','Product has been updated successfully!');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'regular_price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->regular_price = $request->input('regular_price');
        $product->sale_price = $request->input('sale_price');
        $product->quantity = $request->input('quantity');
        $product->save();

        return redirect('admin/products')->with('message','Product has been saved successfully!');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('admin/products')->with('message','Product has been delete successfully!');
    }
}
