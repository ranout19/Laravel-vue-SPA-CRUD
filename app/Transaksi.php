<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tiket;

class Transaksi extends Model
{
    protected $guarded = [];

    public function tiket()
    {
    	return $this->belongsTo(Tiket::class, 'idTiket', 'id');
    }
}
