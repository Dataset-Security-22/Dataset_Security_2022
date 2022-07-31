<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Anggota;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
    	for ($i = 1; $i <= 50; $i++)
    	{
    		User::create([
    			'nim' => $faker->buildingNumber,
    			'nama' => $faker->name,
    			'jenis_kelamin' => 'L',
    			'agama' => 'islam',
    			'no_hp' => $faker->phoneNumber,
    			'alamat' => $faker->address,
    			'id_kelas' => 1
    		]);
    	}
    }
}
