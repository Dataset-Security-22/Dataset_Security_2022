<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Faker\Factory as Faker;

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
        // $faker = Faker::create("id_ID");
        // for ($i = 1; $i <= 10; $i++)
        // {
        // 	User::create([
        // 		"name" => $faker->lastName,
        // 		"email" => $faker->email,
        // 		"password" => bcrypt("login123"),
        // 		"id_role" => mt_rand(1, 2)
        // 	]);

            User::create([
            "name" => "feby",
            "email" => "feby@gmail.com",
            "password" => bcrypt("feby"),
            "id_role" => mt_rand(1, 2)
        ]);

            
        // }
    }
}
