<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
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

    public function index(){
        $user = Auth::user();

        $keranjang = Cart::where('id_user',$user->id)->where('is_checkout',0)->get();
        
        return view('keranjang',compact('keranjang'));
    }

    public function store(Request $request,$iduser,$idproduct)
    {
        
        Cart::create([
            'id_user' => $iduser,
            'jumlah' => $request->jumlah,
            'is_checkout'=> '0',
            'id_product' => $idproduct,
        ]);


        return redirect('/home');

    }
    public function destroy($id){

        $keranjang = Cart::where('id',$id)->delete();
        
        return redirect('/keranjang');
    }
}
