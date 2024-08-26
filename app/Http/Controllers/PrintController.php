<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Auth;

class PrintController extends Controller
{
    //
    public function cetak($id)
    {
        $auth = Auth::user();
        $transaksi = Transaksi::where('id',$id)->first();
        // dd($transaksi);
        $pdf = PDF::loadview('invoice', ['data' => $transaksi]);
        return $pdf->download('invoice.pdf');
    }
}
