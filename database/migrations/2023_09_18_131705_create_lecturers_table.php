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
        Schema::create('lecturers', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string("firstname");
            $table->string("lastname");
            $table->string("usertype")->default('lecturer');
            $table->string("title")->nullable();
            $table->string("email");
            $table->string("address")->nullable();
            $table->string("phone");
            $table->string("password");
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
