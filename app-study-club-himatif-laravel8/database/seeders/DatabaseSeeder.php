<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use \App\Models\User;
use \App\Models\Classes;
use \App\Models\Category;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(50)->create();

    	Category::create([
    		'category' => 'Tidak ada kategori'
    	]);

    	Category::create([
    		'category' => 'Web Programming'
    	]);

    	Category::create([
    		'category' => 'Mobile Programming'
    	]);

    	Category::create([
    		'category' => 'Desain UI/UX'
    	]);

        Classes::create([
            'id' => 0,
            'class' => 'Tidak ada kelas'
        ]);

        User::create([
            'name' => 'Hakim Asrori',
            'nim' => '2003071',
            'email' => 'rilozpedia20@gmail.com',
            'password' => Hash::make('rilozpedia20@gmail.com'),
            'id_role' => 1,
            'id_category' => 2,
            'id_class' => 1
        ]);
    }
}
