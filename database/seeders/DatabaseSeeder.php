<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('students')->insert([
            'name' => 'Thoriq Afif Habibi',
            'email' => 'thoriq@yahoo.com',
            'password' => bcrypt('12345'),
            'class' => 'B',
            'dateOfBirth' => '2003-04-25',
            'profilePicture' => 'student-1.jpeg',
            'score' => 92.0
        ]);

        DB::table('students')->insert([
            'name' => 'Rudy',
            'email' => 'rudy@yahoo.com',
            'password' => bcrypt('54321'),
            'class' => 'C',
            'dateOfBirth' => '2003-09-30',
            'profilePicture' => 'student-2.jpeg',
            'score' => 95.0
        ]);
    }
}
