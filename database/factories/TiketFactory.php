<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tiket;
use App\Kategori;
use Faker\Generator as Faker;

$factory->define(Tiket::class, function (Faker $faker) {
    return [
        'namaTiket' => $faker->word,
        'jenisTiket' => $faker->word,
        'hargaTiket' => rand(1000, 10000),
        'jumlahTiket' => rand(1, 100),
        'idKategori' => function(){
        	return Kategori::all()->random();
        }
    ];
});
