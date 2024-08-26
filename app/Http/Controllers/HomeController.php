<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }
    
    public function kategori($kategori)
    {
        $products = Product::where('kategori',$kategori)->get();
        // dd($products);
        return view('home', compact('products'));
    }

    public function adminHome(){
        return view('adminHome');
    }
}
