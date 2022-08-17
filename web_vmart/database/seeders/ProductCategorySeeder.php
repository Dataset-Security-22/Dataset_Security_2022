<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\product_category;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        product_category::create([
            "id" => "1",
			"name" => "sayur",

		]);
        product_category::create([
            "id" => "1",
			"name" => "buah",

		]);




    }
}
