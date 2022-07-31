<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
        	'nama_lengkap' => "Asep Saepullah",
        	'google_id' => 1,
        	'email' => 'saneglos005@gmail.com',
        	'password' => password_hash('saneglos005@gmail.com', PASSWORD_DEFAULT),
        	'telepon' => "6281214707143",
            'alamat' => "Indramayu"
        ]);

    }
}
