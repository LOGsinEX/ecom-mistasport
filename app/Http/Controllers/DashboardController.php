<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $products = Product::all();
        return view('dashboard', compact('products'));
    }
    public function detail(Request $request,$id)
    {
        $products = Product::where('id',$id)->first();
        // dd($products);
        return view('detailproduct', compact('products'));
    }
}
