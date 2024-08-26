<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = "transaksi";

    protected $fillable = ["id_user","noresi", "penerima", "alamat", "kodepos", "total_pembayaran"];
    
    use HasFactory;
}
