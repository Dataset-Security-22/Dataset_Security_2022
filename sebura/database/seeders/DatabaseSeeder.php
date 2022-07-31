<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataPengurus;
use App\Models\Role;
use App\Models\Jabatan;
use App\Models\Prodi;
use App\Models\Divisi;

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

        //DATA PENGURUS
        DataPengurus::create([
            'nama' => "Feby Maulana Hendrayatno",
            'email' => "feby@gmail.com",
            'password' => bcrypt("feby"),
            'role' => 1,
            'jabatan' => 1,
            'prodi' => 1,
            'divisi_sebura' => 1,
            'tahun_kepengurusan' => "2020/2021",
            'gambar' => " "
        ]);
        DataPengurus::create([
            'nama' => "Alif Rizki A.H",
            'email' => "alifrizki@gmail.com",
            'password' => bcrypt("12"),
            'role' => 2,
            'jabatan' => 2,
            'prodi' => 2,
            'divisi_sebura' => 2,
            'tahun_kepengurusan' => "2020/2021",
            'gambar' => " "
        ]);

        //ROLE
        Role::create([
            'role_name' => 'Admin'
        ]);
        Role::create([
            'role_name' => 'Pengurus'
        ]);

        //JABATAN
        Jabatan::create([
            'nama_jabatan' => "Ketua Umum"
        ]);
        Jabatan::create([
            'nama_jabatan' => "W.Ketua Umum"
        ]);

        //PRODI
        Prodi::create([
            'nama_prodi' => "Teknik Informatika"
        ]);
        Prodi::create([
            'nama_prodi' => "Rekayasa Perangkat Lunak"
        ]);
        Prodi::create([
            'nama_prodi' => "Keperawatan"
        ]);
        Prodi::create([
            'nama_prodi' => "Teknik Pendingin dan Tata Udara"
        ]);
        Prodi::create([
            'nama_prodi' => "Teknik Mesin"
        ]);
        Prodi::create([
            'nama_prodi' => "Perancangan Manufaktur"
        ]);

        //DIVISI SEBURA
        Divisi::create([
            'nama_divisi' => "BAND"
        ]);
        Divisi::create([
            'nama_divisi' => "PADUS"
        ]);
        Divisi::create([
            'nama_divisi' => "DANCE"
        ]);
        Divisi::create([
            'nama_divisi' => "TARI TRADISIONAL"
        ]);
    }
}
