<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id('studentID');
            $table->string('studentName');
            $table->string('registrationID')->unique();
            $table->string('studentEmail')->unique();
            $table->string('studentPhone');
            $table->string('password');
            $table->string('course');
            $table->integer('studyYear');
            $table->decimal('currentGPA', 3, 2);
            $table->string('introductionLetter')->nullable();
            $table->string('resultSlip')->nullable();
            $table->string('university'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
