<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tiket;

class Kategori extends Model
{
    protected $guarded = [];

    public function tiket()
    {
    	return $this->hasMany(Kategori::class, 'idKategori', 'id');
    }
}
