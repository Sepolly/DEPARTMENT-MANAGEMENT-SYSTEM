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
        Schema::create('tests', function (Blueprint $table) {
            $table->id('test_id');
            $table->string('test_title');
            $table->string('test_description')->nullable();
            $table->string('test_image')->nullable();
            $table->string('test_file')->nullable();
            $table->boolean('test_status')->default(false);
            $table->string('course_id')->nullable();
            $table->string('module_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
