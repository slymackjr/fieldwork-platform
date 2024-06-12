<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->id('attendanceID');
            $table->unsignedBigInteger('employerID');
            $table->unsignedBigInteger('studentID')->nullable();
            for ($i = 1; $i <= 40; $i++) {
                $table->string('day_' . $i)->default('absent');
            }
            $table->timestamps();

            $table->foreign('employerID')->references('employerID')->on('employers')->onDelete('cascade');
            $table->foreign('studentID')->references('studentID')->on('students')->onDelete('cascade');

            // Add composite unique index
            $table->unique(['employerID', 'studentID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance');
    }
}
