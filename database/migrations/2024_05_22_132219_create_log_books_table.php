<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_books', function (Blueprint $table) {
            $table->bigIncrements('logID');
            $table->unsignedBigInteger('employerID');
            $table->unsignedBigInteger('studentID');
            
            $table->foreign('employerID')->references('employerID')->on('employers')->onDelete('cascade');
            $table->foreign('studentID')->references('studentID')->on('students')->onDelete('cascade');
            $table->string('status');
            // Create columns for each day (40 days for 8 weeks)
            for ($day = 1; $day <= 40; $day++) {
                $table->text('day_' . $day)->nullable();
            }
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
        Schema::dropIfExists('log_books');
    }
}
