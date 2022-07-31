<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

use App\Models\BukuModel;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('id_ID');

    	for ($i = 1; $i <= 10; $i++)
    	{
    		BukuModel::create([
    			"kode_buku" => "KB-".$i,
    			"id_kategori" => mt_rand(1, 10),
    			"judul" => $faker->title,
    			"pengarang" => $faker->lastname,
    			"tahun_terbit" => $faker->year,
    			"penerbit" => $faker->firstname,
    			"stok" => $faker->randomDigit
    		]);
    	}
    }
}
