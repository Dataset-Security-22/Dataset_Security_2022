<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('id_ID');

    	User::create([
			"name" => "admin",
			"email" => "admin@gmail.com",
			"password" => bcrypt("password"),
			"id_role" => 1
		]);
		
		User::create([
			"name" => "pelatih",
			"email" => "pelatih@gmail.com",
			"password" => bcrypt("password"),
			"id_role" => 2
		]);

		User::create([
			"name" => "pelatih2",
			"email" => "pelatih2@gmail.com",
			"password" => bcrypt("password"),
			"id_role" => 2
		]);

		User::create([
			"name" => "pelatih3",
			"email" => "pelatih3@gmail.com",
			"password" => bcrypt("password"),
			"id_role" => 2
		]);

		User::create([
			"name" => "pelatih4",
			"email" => "pelatih4@gmail.com",
			"password" => bcrypt("password"),
			"id_role" => 2
		]);

		User::create([
			"name" => "murid",
			"email" => "murid@gmail.com",
			"password" => bcrypt("password"),
			"id_role" => 3
		]);
    }
}
