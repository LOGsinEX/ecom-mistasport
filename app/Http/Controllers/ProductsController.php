<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
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
    public function show()
    {
        $products = Product::all();
        return view('adminproducts.index', compact('products'));
    }
    public function stock()
    {
        $products = Product::all();
        return view('adminproducts.stock', compact('products'));
    }
    public function addstock(Request $request, $id)
    {
        $products = Product::where('id',$id)->first();
        // dd($products);
        $products->stok = $products->stok + $request->stok;
        $products->save();
        return redirect('/admin/settingstok');
        
    }
    public function create()
    {
        return view('adminproducts.add');
    }
    public function store(Request $request)
    {
        $image = $request->file('gambar');
        // dd($request);
        $image->storeAs('public/photos', $image->hashName());
        // dd($path);
        Product::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'stok'=>$request->stok,
            'harga'=>$request->harga,
            'gambar' => $image->hashName(),
        ]);


        return redirect('/admin/data-produk');

        
    }
    public function actionupdate(Request $request)
    {
        $products=Product::where('id',$request->id)->first();
        if($request->file('gambar')){
            $image = $request->file('gambar');
            $image->storeAs('public/photos', $image->hashName());
            $products->nama = $request->nama;
            $products->kategori = $request->kategori;
            $products->harga = $request->harga;
            $products->deskripsi = $request->deskripsi;
            $products->gambar = $image->hashName();
            $products->save();
        }else{
            $products->nama = $request->nama;
            $products->kategori = $request->kategori;
            $products->deskripsi = $request->deskripsi;
            $products->harga = $request->harga;
            $products->save();
        }

        return redirect('/admin/data-produk');

        
    }
    public function update($id)
    {
        $products = Product::where('id',$id)->first();


        return view('adminproducts.update',compact('products'));

    }
    public function destroy($id){

        $products = Product::where('id',$id)->delete();
        
        return redirect('/admin/data-produk');
    }
}
