<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Tiket;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\TransaksiResource;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TransaksiResource::collection(Transaksi::where('status', 0)->latest()->get());
    }

    public function selesai()
    {
        return TransaksiResource::collection(Transaksi::where('status', 1)->latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $row = Tiket::where('id', $request->idTiket)->first();
        Tiket::where('id', $request->idTiket)->update([
            'jumlahTiket' => $row->jumlahTiket - $request->qty
        ]);
        Transaksi::create($request->all());
        return response('ditambahkan', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        Transaksi::where('status', 0)->update([
            'status' => 1
        ]);
        return response('terubah', Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $row = Tiket::where('id', $transaksi->idTiket)->first();
        Tiket::where('id', $transaksi->idTiket)->update([
            'jumlahTiket' => $row->jumlahTiket + $transaksi->qty
        ]);
        $transaksi->delete();
        return response('terhapus', Response::HTTP_CREATED);
    }
}
