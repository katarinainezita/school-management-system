<?php

namespace Database\Seeders;

use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User;
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

        User::factory()
                ->count(30)
                ->for(Student::factory(), 'role')
                ->sequence(
                    ['role_id' => 1],
                    ['role_id' => 2],
                    ['role_id' => 3],
                    ['role_id' => 4],
                    ['role_id' => 5],
                    ['role_id' => 6],
                    ['role_id' => 7],
                    ['role_id' => 8],
                    ['role_id' => 9],
                    ['role_id' => 10],
                    ['role_id' => 11],
                    ['role_id' => 12],
                    ['role_id' => 13],
                    ['role_id' => 14],
                    ['role_id' => 15],
                )
                ->create();

        User::factory()
                ->count(20)
                ->for(Lecturer::factory(), 'role')
                ->sequence(
                    ['role_id' => 1],
                    ['role_id' => 2],
                    ['role_id' => 3],
                    ['role_id' => 4],
                    ['role_id' => 5],
                    ['role_id' => 6],
                    ['role_id' => 7],
                    ['role_id' => 8],
                    ['role_id' => 9],
                    ['role_id' => 10],
                )
                ->create();

        // DB::table('users')->insert([
        //     'email' => 'lecturer@gmail.com',
        //     'password' => bcrypt('12345678'),
        //     'role_id' => 1,
        //     'role_type' => 'App\Models\Lecturer'
        // ]);
    }
}
