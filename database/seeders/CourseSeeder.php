<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('courses')->insert([
            'name' => 'Mathematics',
            'teacher' => 'Frank Li',
            'day' => 'Monday',
            'time' => '07:00:00',
            'class' => 'B'
        ]);

        DB::table('courses')->insert([
            'name' => 'Physics',
            'teacher' => 'Yovanka Lip',
            'day' => 'Tuesday',
            'time' => '08:00:00',
            'class' => 'C'
        ]);
    }
}
