<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt("password"),
            "created_by" => 0,
            "updated_by" => 0,
            "level" => 1,
            "active" => 1,
        ]);
    }
}
