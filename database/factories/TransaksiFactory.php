<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaksi;
use App\Tiket;
use Faker\Generator as Faker;

$factory->define(Transaksi::class, function (Faker $faker) {
    return [
        'idTiket' => function(){
        	return Tiket::all()->random();
        },
        'qty' => rand(1, 100),
        'status' => rand(0, 1)
    ];
});
