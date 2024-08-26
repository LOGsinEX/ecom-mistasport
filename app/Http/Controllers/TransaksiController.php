<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
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
        $user = Auth::user();
        $keranjang = Cart::where('id_user',$user->id)->where('is_checkout',0)->get();
        $totalharga = 0;
        foreach ($keranjang as $item) {
            $product = Product::where('id',$item->id_product)->first();
            $temp = $product->harga * $item->jumlah;
            $totalharga = $totalharga + $temp;
        }
        
        return view('transaksi', compact('keranjang','totalharga'));
    }
    public function store(Request $request)
    {
        
        $user = Auth::user();
        $keranjang = Cart::where('id_user',$user->id)->where('is_checkout',0)->get();
        $dateAsString = date('Ymd');
        $count = Transaksi::count();
        
        $transaksi = new Transaksi;
        $transaksi->id_user = $user->id;
        $transaksi->noresi = 'MISTASPORTSID'.$dateAsString.$count;
        $transaksi->penerima = $request->penerima;
        $transaksi->alamat = $request->alamat;
        $transaksi->kodepos = $request->kodepos;
        $transaksi->total_pembayaran = $request->totalpembayaran;
        $transaksi->save();

        foreach ($keranjang as $item) {
            $product = Product::where('id',$item->id_product)->first();
            $product->stok = $product->stok - $item->jumlah;
            $product->save();
            $item->is_checkout = 1;
            $item->id_transaksi = $transaksi->id;
            $item->save();
        }

        return redirect('/mytransaksi');

    }
    public function datalist(){
        $user = Auth::user();

        $transaksi = Transaksi::where('id_user',$user->id)->get(); 
        return view('transaksi-detail',compact('transaksi'));
    }
    public function indexadmin(){
        $user = Auth::user();

        $transaksi = Transaksi::get(); 
        return view('transaksiadmin',compact('transaksi'));
    }

}
