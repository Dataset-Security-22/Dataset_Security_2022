<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\Pelatih;

class PelatihSeeder extends Seeder
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
        	Pelatih::create([
        		"nama_pelatih" => $faker->firstname,
        		"jenis_kelamin" => "L",
        		"no_hp" => $faker->phoneNumber,
        		"alamat" => $faker->address,
        		"foto" => NULL
        	]);

            
        }
    }
}
