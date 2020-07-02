<?php

use Illuminate\Database\Seeder;
use App\Kategori;
use App\Transaksi;
use App\Tiket;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //factory(Tiket::class, 10)->create();
        factory(Transaksi::class, 10)->create();
    }
}
