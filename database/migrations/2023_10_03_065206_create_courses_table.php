<?php

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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->unique();
            $table->text('description');
            $table->string('category', 50);
            $table->string('level', 20);    // beginner, intermediate, advanced
            $table->string('photo', 200)->nullable()->default('course/default.jpeg');
            $table->boolean('verified')->default(false);
            $table->boolean('draft')->default(true);
            $table->string('slug');
            $table->foreignIdFor(Lecturer::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
