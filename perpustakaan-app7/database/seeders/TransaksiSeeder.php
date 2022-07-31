<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\Transaksi;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create("id_ID");

        for ($i = 1; $i <= 10; $i++)
        {
            Transaksi::create([
                "kode_transaksi" => "KT-".$i,
                "kode_buku" => "KB-".mt_rand(1, 10),
                "id_anggota" => mt_rand(1, 10),
                "tanggal_pinjam" => date("Y-m-d"),
                "tanggal_kembali" => date("Y-m-d"),
                "tanggal_mengembalikan" => date("Y-m-d"),
                "denda" => 0,
                "id_petugas" => 1
            ]);
        }
    }
}
