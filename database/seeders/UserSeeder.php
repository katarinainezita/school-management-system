<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'role_id' => 1,
            'role_type' => 'App\Models\Admin'
        ]);

        DB::table('users')->insert([
            'email' => 'student@gmail.com',
            'password' => bcrypt('12345678'),
            'role_id' => 1,
            'role_type' => 'App\Models\Student'
        ]);

        DB::table('users')->insert([
            'email' => 'lecturer@gmail.com',
            'password' => bcrypt('12345678'),
            'role_id' => 1,
            'role_type' => 'App\Models\Lecturer'
        ]);
    }
}
