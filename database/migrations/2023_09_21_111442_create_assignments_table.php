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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id('assignment_id');
            $table->string('assignment_title');
            $table->mediumText('assignment_description');
            $table->date('assignment_due_date');
            $table->longText('assignment_content');
            $table->string('assignment_file')->nullable();
            $table->string('course_id')->nullable();
            $table->string('module_code');
            $table->string('signed_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
