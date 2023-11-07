<?php

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
        Schema::create('working_experiences', function (Blueprint $table) {
            $table->id();
            $table->integer('owner_id');
            $table->string('owner_type');
            $table->string('institution', 100);
            $table->string('role', 50)->nullable();
            $table->integer('month_start');
            $table->integer('year_start');
            $table->integer('month_end');
            $table->integer('year_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('working_experiences');
    }
};
