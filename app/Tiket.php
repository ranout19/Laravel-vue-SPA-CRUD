<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kategori;
use App\Transaksi;

class Tiket extends Model
{
    protected $fillable = [
    	'namaTiket',
        'jenisTiket',
        'hargaTiket',
        'jumlahTiket',
        'idKategori'
    ];

    public function kategori()
    {
    	return $this->belongsTo(Kategori::class, 'idKategori', 'id');
    }

    public function transaksi()
    {
    	return $this->hasMany(Transaksi::class, 'idTiket', 'id');
    }
}
