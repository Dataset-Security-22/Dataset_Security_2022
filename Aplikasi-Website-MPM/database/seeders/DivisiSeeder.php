<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\Model\Divisi;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('id_ID');

    	for ($i = 1; $i <= 10 ; $i++) { 
    		Divisi::create([
    			"id_bagian" => mt_rand(1, 10),
    			"nim_anggota" => mt_rand(1, 10),
    			"id_jabatan" => mt_rand(1, 10)
    		]);
    	}
    }
}
