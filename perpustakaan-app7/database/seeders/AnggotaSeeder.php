<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

use App\Models\AnggotaModel;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=1; $i <= 50 ; $i++) { 
        	AnggotaModel::create([
        		"nis" => $faker->postcode,
        		"nama_anggota" => $faker->lastName,
        		"alamat" => $faker->address,
        		"ttl_anggota" => $faker->city,
        		"no_hp" => $faker->phoneNumber,
        	]);
        }
    }
}
