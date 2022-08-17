<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        product::create([
            "id" => "1",
			"category_id" => "1",
            "sku" => "BS350420",
            "description" => "Sayuran sehat dan segar",
            "picture_name" => "image/TsowjCNjMqbkWfZ7Cr5HtdCyX3qqO3QK0svIQ8Aq.jpg",
            "price" => "33000.00",
            "current_discount" => "2000.00",
            "stock" => "10",
            "product_unit" => "kg",
            "is_available" => "1",

            //"profile_picture" => NULL,

		]);
       



    }
}
