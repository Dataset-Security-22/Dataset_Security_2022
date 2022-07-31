<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            "name" => "Administrator",
            "username" => "admin",
            "password" => bcrypt("password"),
            "role" => 1,
            "active" => 1,
            "id_kelas" => 1
        ]);
    }
}
