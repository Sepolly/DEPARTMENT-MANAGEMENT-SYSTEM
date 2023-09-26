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
        Schema::create('test_submissions', function (Blueprint $table) {
            $table->id('submission_id');
            $table->unsignedBigInteger('test_id');
            $table->unsignedBigInteger('student_id');
            $table->string('answers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_submissions');
    }
};