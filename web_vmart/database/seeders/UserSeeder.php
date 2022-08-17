<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\user;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        user::create([
            "id" => "1",
			"name" => "Admin Toko Sayur",
            "email" => "admin@local.test",
            "username" => "admin",
            "password" => "$2y$10$Brm3RNWFKvZ1e0ej1vBz9.QbFMW21q0l/iDSt5aDOoGj9zlLFuxh6",
            "role" => "admin",
            //"profile_picture" => NULL,

		]);
        user::create([
            "id" => "2",
			"name" => "Customer Toko Sayur",
            "email" => "customer@local.test",
            "username" => "customer",
            "password" => "$2y$10$6C/A5Yy1gt4yhStWDWN1M.isBaznzDc.MZJdIj7UddW3.qIX5vDvK",
            "role" => "customer",
            //"profile_picture" => NULL,

		]);



    }
}
