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
        Schema::create('fieldworks', function (Blueprint $table) {
            $table->bigIncrements('fieldworkID'); // Assuming you want an auto-incrementing ID for this table
            $table->unsignedBigInteger('employerID');
            $table->unsignedBigInteger('studentID');
            $table->string('status');
            $table->timestamps();

            $table->foreign('employerID')->references('employerID')->on('employers')->onDelete('cascade');
            $table->foreign('studentID')->references('studentID')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fieldworks');
    }
};
