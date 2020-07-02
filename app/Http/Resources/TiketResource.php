<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Tiket;

class TiketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'namaTiket' => $this->namaTiket,
            'jenisTiket' => $this->jenisTiket,
            'hargaTiket' => $this->hargaTiket,
            'jumlahTiket' => $this->jumlahTiket,
            'namaKategori' => $this->kategori->namaKategori,
            'idKategori' => $this->idKategori,
        ];
    }   
}
