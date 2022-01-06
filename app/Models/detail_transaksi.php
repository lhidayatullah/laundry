<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    protected $fillable = ['id_detail_transaksi', 'id_transaksi', 'id_paket', 'berat'];
    protected $hidden = ['create_at', 'updated_at'];
    protected $table = "detail_transaksi";
    protected $primaryKey = 'id_detail_transaksi';
}
