<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "admin",
            "username" => "Administrator",
            "password" => bcrypt("password"),
            "role" => 1,
            "active" => 1,
            "id_kelas" => 0
        ]);
    }
}
