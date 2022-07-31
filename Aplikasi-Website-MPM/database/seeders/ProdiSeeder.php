<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\Model\Prodi;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create("id_ID");

    	for ($i = 1; $i <= 30; $i++)
    	{
    		Prodi::create([
    			"nama_prodi" => $faker->lastname,
    			"id_jurusan" => mt_rand(1, 30)
    		]);
    	}
    }
}
