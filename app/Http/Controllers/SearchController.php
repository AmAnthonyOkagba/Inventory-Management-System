<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search= $request->input('search');
        
        $products = Product::query()->where('name','like','%'.$search .'%')->paginate(12);
        return view('pages.search')->with(['products'=>$products, 'search'=>$search]);
    }
}
