<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class);

        $user = User::create([
            'name'          => 'Admin',
            'email'         => 'admin@gmail.com',
            'password'      => bcrypt('admin123'),
            'created_at'    => date("Y-m-d H:i:s")
        ]);
        $user->assignRole('Admin');

        $user2 = User::create([
            'name'          => 'Teacher',
            'email'         => 'teacher@gmail.com',
            'password'      => bcrypt('teacher123'),
            'created_at'    => date("Y-m-d H:i:s")
        ]);
        $user2->assignRole('Teacher');

        $user3 = User::create([
            'name'          => 'Parent',
            'email'         => 'parent@gmail.com',
            'password'      => bcrypt('parent123'),
            'created_at'    => date("Y-m-d H:i:s")
        ]);
        $user3->assignRole('Parent');

        $user4 = User::create([
            'name'          => 'Student',
            'email'         => 'student@gmail.com',
            'password'      => bcrypt('student123'),
            'created_at'    => date("Y-m-d H:i:s")
        ]);
        $user4->assignRole('Student');


        DB::table('teachers')->insert([
            [
                'user_id'           => $user2->id,
                'gender'            => 'male',
                'phone'             => '09120118832',
                'dateofbirth'       => '1993-04-11',
                'current_address'   => 'Himamaylan City',
                'permanent_address' => 'Himamaylan City',
                'created_at'        => date("Y-m-d H:i:s")
            ]
        ]);

        DB::table('parents')->insert([
            [
                'user_id'           => $user3->id,
                'gender'            => 'male',
                'phone'             => '09123452821',
                'current_address'   => 'Kabankalan City',
                'permanent_address' => 'Kabankalan City',
                'created_at'        => date("Y-m-d H:i:s")
            ]
        ]);

        DB::table('grades')->insert([
            'teacher_id'        => 1,
            'class_numeric'     => 1,
            'class_name'        => 'One',
            'class_description' => 'class one'
        ]);

        DB::table('students')->insert([
            [
                'user_id'           => $user4->id,
                'parent_id'         => 1,
                'class_id'          => 1,
                'roll_number'       => 1,
                'gender'            => 'male',
                'phone'             => '09120345222',
                'dateofbirth'       => '1993-04-11',
                'current_address'   => 'Bago City',
                'permanent_address' => 'Bago City',
                'created_at'        => date("Y-m-d H:i:s")
            ]
        ]);

    }
}
