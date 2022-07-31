<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\Model\Jabatan;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('Id_ID');

    	for ($i = 1; $i <= 10; $i++)
    	{
    		Jabatan::create([
    			"nama_jabatan" => $faker->jobTitle
    		]);
    	}
    }
}
