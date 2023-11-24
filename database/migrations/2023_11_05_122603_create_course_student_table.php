<?php

use App\Models\Course;
use App\Models\Student;
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
        Schema::create('course_student', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Course::class);
            $table->foreignIdFor(Student::class);
            $table->double('courseCompletion', 3, 2)->default(0.00);   // learning percentage progress
            $table->string('status', 20)->default('learning progress'); // cart, learning progress, completed
            $table->integer('score')->nullable()->default(0);   // mean score from task and assignment
            $table->text('review')->nullable();
            $table->decimal('rating', 1, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_student');
    }
};
