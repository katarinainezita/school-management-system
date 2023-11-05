<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("education")->insert([
            'level' => 'S1',
            'institution' => 'Institut Teknologi Sepuluh Nopember',
            'score'=> 3.64,
            'major' => 'Teknik Informatika',
            'owner_id' => 1,
            'owner_type' => 'App\Models\Student'
        ]);

        DB::table("education")->insert([
            'level' => 'S2',
            'institution' => 'Massachusetts Institute of Technology',
            'score'=> 3.92,
            'major' => 'Computer Science',
            'owner_id' => 1,
            'owner_type' => 'App\Models\Lecturer'
        ]);

        DB::table("education")->insert([
            'level' => 'S3',
            'institution' => 'Massachusetts Institute of Technology',
            'score'=> 3.64,
            'major' => 'Computer Science',
            'owner_id' => 1,
            'owner_type' => 'App\Models\Lecturer'
        ]);
    }
}
