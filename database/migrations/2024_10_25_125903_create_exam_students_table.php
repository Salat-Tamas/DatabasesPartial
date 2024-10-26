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
        Schema::create('exam_students', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable()->default('N/A');
            $table->integer('schoolCode')->nullable()->default(-1);
            $table->text('schoolName')->nullable()->default('N/A');
            $table->text('shortSchoolName')->nullable()->default('N/A');
            $table->text('schoolType')->nullable()->default('N/A');
            $table->text('medium')->nullable()->default('N/A');
            $table->text('location')->nullable()->default('N/A');
            $table->text('countyCode')->nullable()->default('N/A');
            $table->text('county')->nullable()->default('N/A');
            $table->text('nationality')->nullable()->default('N/A');
            $table->float('romanian')->nullable()->default(-1.0);
            $table->float('mathematics')->nullable()->default(-1.0);
            $table->text('native')->nullable()->default('N/A');
            $table->float('avg')->nullable()->default(-1.0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_students');
    }
};
