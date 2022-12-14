<?php

namespace Database\Seeders;

use App\Models\Petugas;
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
            "username" => "admin",
            "password" => bcrypt("password"),
            "role" => 1
        ]);

        User::create([
            "nama" => "petugas",
            "alamat" => "Jakarta",
            "no_telepon" => "12345",
            "saldo" => 2000,
            "biaya_admin" => 0,
            "username" => "petugas",
            "password" => bcrypt("password"),
            "role" => 2
        ]);

        Petugas::create([
            "nik_petugas" => "555",
            "nama" => "petugas",
            "alamat" => "Jakarta",
            "no_telepon" => "12345",
            "jk" => "L"
        ]);
    }
}
