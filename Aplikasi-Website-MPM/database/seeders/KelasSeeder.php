<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\Model\Kelas;

class KelasSeeder extends Seeder
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
    		Kelas::create([
    			"nama_kelas" => $faker->lastname,
    			"id_prodi" => 
    		]);
    	}
    }
}
