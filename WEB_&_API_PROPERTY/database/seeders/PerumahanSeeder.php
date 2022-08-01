<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\Perumahan;

class PerumahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create('id_ID');
        Perumahan::create([
            "id" => 1,
			"nama_perumahan" => "Balongan Asri",
            "alamat" => "Balongan",
            "uraian" => "aman dan nyaman",
            // "stok" => "50",
            "foto" => "image/C5yrh4knDzWURuSD6XJKD0c8Yxw0zCXu0pQwQEZs.jpg",
            "id_user" =>2
		]);

        Perumahan::create([
            "id" => 2,
			"nama_perumahan" => "Permai",
            "uraian" => "Aman Banjir",
            "alamat" => "Indramayu",
            // "stok" => "40",
            "foto" => "image/hNxDIikz1sfeGAMQbr0oLtLa9nWftSoQ3HDmBZh8.jpg",
            "id_user" =>2
		]);

    }
}
