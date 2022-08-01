<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\DeskripsiRumah;

class DeskripsiRumahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeskripsiRumah::create([
            "perumahan_id" => "1",
            "alamat_id" => "1",
            "id" => "1",
            "foto" => "image/c3Hnv0Ow1M7ZeIm4ysD12qOAlpMBAFifSZjtObik.jpg",
			"type" => "45",
            "harga" =>50000000,
            "stock" =>40,
            "kusen" => "Kayu",
            "pintu" => "Kayu Panil",
            "jendela" => "Kaca",
            "plafond" => "Gypsum rangka Holo",
            "air" => "PDAM",
            "listrik" => "900 Watt",
            "pondasi" => "Batu Kali",
            "dinding" => "Bata ringan / Hebel diaci dan dicat",
            "lantai" => "Keramik",
            "atap" => "Baja Ringan dan Genteng Beton",
            "wc" => " closet Jongkok",
            "id_user" =>2,
		]);

        DeskripsiRumah::create([
            "perumahan_id" => "1",
            "alamat_id" => "1",
            "id" => "2",
			"type" => "35",
            "foto" => "image/Ad1FjLv05Viv8msgUf45Dt01tDa0d1fWHqrXPow5.jpg",
            "harga" =>75000000,
            "stock" =>40,
            "kusen" => "Kayu",
            "pintu" => "Kayu Panil",
            "jendela" => "Kaca",
            "plafond" => "Gypsum rangka Holo",
            "air" => "PDAM",
            "listrik" => "900 Watt",
            "pondasi" => "Batu Kali",
            "dinding" => "Bata ringan / Hebel diaci dan dicat",
            "lantai" => "Keramik",
            "atap" => "Baja Ringan dan Genteng Beton",
            "wc" => " closet Jongkok",
            "id_user" =>2,
		]);
    }
}
