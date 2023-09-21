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
        Schema::create('students', function (Blueprint $table) {
            $table->string('regno');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('other_name')->nullable();
            $table->string('usertype')->default('student');
            $table->integer('level');
            $table->integer('status')->nullable();
            $table->string('phone');
            $table->boolean('is_repeating');
            $table->string('address')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('image')->nullable()->default(null);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
