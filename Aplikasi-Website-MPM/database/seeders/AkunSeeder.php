<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create("id_ID");

    	
    	User::create([
    		"username" => "admin",
    		"nama" => "admin",
    		"email" => "admin@gmail.com",
    		"password" => bcrypt("password"),
			"created_by" => 1,
    		"updated_by" => 1,
    		"id_role" => 1
    	]);

        User::create([
            "username" => "bph",
            "nama" => "bph",
            "email" => "bph@gmail.com",
            "password" => bcrypt("password"),
            "created_by" => 1,
            "updated_by" => 1,
            "id_role" => 2
        ]);

        User::create([
            "username" => "mahasiswa",
            "nama" => "mahasiswa",
            "email" => "mahasiswa@gmail.com",
            "password" => bcrypt("password"),
            "created_by" => 1,
            "updated_by" => 1,
            "id_role" => 3
        ]);
    }
}
