<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Model\Anggota;

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
        //$this->call(JabatanSeeder::class);
        //$this->call(BagianSeeder::class);
        //$this->call(DivisiSeeder::class);
        //$this->call(AnggotaSeeder::class);
        //$this->call(JurusanSeeder::class);
        //$this->call(ProdiSeeder::class);
        $this->call(AkunSeeder::class);
        //$this->call(AnggotaSeeder::class);
    }
}
