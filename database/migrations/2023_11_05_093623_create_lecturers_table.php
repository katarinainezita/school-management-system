<?php

use App\Models\User;
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
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('name', 300);
            $table->string('phoneNumber', 20);
            $table->text('description');
            $table->date('dateOfBirth');
            $table->string('photo');
            $table->integer('totalStudents')->default(0);
            $table->integer('reviews')->default(0);     // sum of reviews in all of their course's
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecturers');
    }
};
