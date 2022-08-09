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
            "nama" => "admin",
            "alamat" => "Jakarta",
            "no_telepon" => "12345",
            "saldo" => 0,
            "biaya_admin" => 0,
            "username" => "ha",
            "password" => bcrypt("password"),
            "role" => 1
        ]);
    }
}
