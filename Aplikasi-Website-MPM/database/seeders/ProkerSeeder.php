<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\Model\Proker;

class ProkerSeeder extends Seeder
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
    		Proker::create([
    			"nama_proker" => $faker->paragraph,
    			"waktu" => $faker->paragraph,
    			"target" => $faker->paragraph,
    			"parameter" => $faker->paragraph,
    			"metode" => $faker->paragraph,
    			"sasaran" => $faker->paragraph,
    			"kebutuhan" => $faker->paragraph,
    			"id_users" => mt_rand(1, 10)
    		]);
    	}
    }
}
