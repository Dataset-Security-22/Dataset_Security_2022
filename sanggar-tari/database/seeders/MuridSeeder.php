<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\Murid;

class MuridSeeder extends Seeder
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
    		Murid::create([
    			"nama_murid" => $faker->firstname,
    			"umur" => mt_rand(1, 20),
    			"jenis_kelamin" => "L",
    			"no_hp" => $faker->phoneNumber,
    			"alamat" => $faker->address,
    			"foto" => NULL
    		]);
    	}
    }
}
