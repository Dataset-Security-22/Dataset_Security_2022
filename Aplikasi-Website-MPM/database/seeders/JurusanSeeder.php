<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\Model\Jurusan;

class JurusanSeeder extends Seeder
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
    		Jurusan::create([
    			"nama_jurusan" => $faker->lastname
    		]);
    	}
    }
}
