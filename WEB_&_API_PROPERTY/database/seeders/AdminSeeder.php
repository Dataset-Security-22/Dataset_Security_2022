<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            "id" => "1",
			"name" => "admin",
            'email'=> "admin@gmail.com",
            'umur' => 12,
            'alamat'=> "Indramayu, blok panggang"
		]);

    }
}
