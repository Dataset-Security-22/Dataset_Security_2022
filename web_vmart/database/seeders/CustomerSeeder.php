<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        customer::create([
            "id" => "1",
			"id_user" => "2",
            "name" => "Agung Tri Saputra",
            "phone_number" => "081328907767",
            "address" => "Kost Indah Jaya Belakang No. 19, Jl. Medan Baru VI, Kandang Limun, Bengkulu",
            //"profile_picture" => NULL,

		]);
        


    }
}
