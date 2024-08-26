<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "carts";

    protected $fillable = ["id","id_user","jumlah", "id_product", "is_checkout", "id_transaksi"];
    
    use HasFactory;
}
