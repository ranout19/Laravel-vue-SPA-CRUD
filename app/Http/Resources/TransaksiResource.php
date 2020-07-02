<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transaksi;

class TransaksiResource extends JsonResource
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
            'namaTiket' => $this->tiket->namaTiket,
            'qty' => $this->qty,
            'status' => $this->status,
            'hargaTiket' => $this->tiket->hargaTiket
        ];
    }
}
