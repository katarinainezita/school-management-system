<?php

use App\Models\Admin;
use App\Models\Course;
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
        Schema::create('courses_rejecteds', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->foreignIdFor(Course::class);
            $table->foreignIdFor(Admin::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses_rejecteds');
    }
};
