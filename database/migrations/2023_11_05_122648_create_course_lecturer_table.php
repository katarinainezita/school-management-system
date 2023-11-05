<?php

use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('course_lecturer', function (Blueprint $table) {
            $table->foreignIdFor(Course::class);
            $table->foreignIdFor(Lecturer::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_lecturer');
    }
};
