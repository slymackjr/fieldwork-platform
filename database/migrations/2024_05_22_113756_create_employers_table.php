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
        Schema::create('employers', function (Blueprint $table) {
            $table->bigIncrements('employerID');
            $table->string('companyName');
            $table->unsignedBigInteger('officeID');
            $table->string('supervisorName');
            $table->string('supervisorPhone');
            $table->string('supervisorEmail')->unique();
            $table->string('supervisorPassword');
            $table->string('supervisorPosition');
            $table->string('supervisorSignature'); // Assuming this will store the path to the image
            $table->string('Muhuri'); // Assuming this will store the path to the image
            $table->string('fieldworkTitle');
            $table->text('fieldworkDescription');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
