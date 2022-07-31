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
        User::create([
            "nama" => "admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt("password")
        ]);

        User::create([
            "nama" => "najmah",
            "email" => "najmah@gmail.com",
            "password" => bcrypt("password")
        ]);

        User::create([
            "nama" => "feby",
            "email" => "feby@gmail.com",
            "password" => bcrypt("feby")
        ]);
    }
}
