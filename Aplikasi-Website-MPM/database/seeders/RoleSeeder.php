<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

use App\Models\Model\Role;

class RoleSeeder extends Seeder
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
    		Role::create([
    			"nama_role" => "admin"
    		]);

            Role::create([
                "nama_role" => "mahasiswa"
            ]);

            Role::create([
                "nama_role" => "mahasiswa"
            ]);
    	}
    }
}
