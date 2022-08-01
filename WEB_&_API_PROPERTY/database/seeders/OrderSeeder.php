<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            "id" => "1",
            "status" => "succes",
            "name" => "buyer",
            "email" => "buyer@gmail.com",
            "id_rumah" => "1",
            "id_owner" => "2",
            "transaction_id" => "808a2031-8815-43cd-878c-2edb7e07745d",
            "order_id" => "1032092517",
            "gross_amount" => 50000000,
            "payment_type" => "bank_transfer",
            "pdf_url" => "https://app.sandbox.midtrans.com/snap/v1/transactions/4255068c-a3f1-4702-955b-eaa854b9f390/pdf",
		]);
    }



}
