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
            $table->unsignedBigInteger('officeID')->nullable();
            $table->string('supervisorName');
            $table->string('supervisorPhone')->nullable();
            $table->string('supervisorEmail')->unique();
            $table->string('password');
            $table->string('supervisorPosition')->nullable();
            $table->string('supervisorSignature')->nullable(); // Assuming this will store the path to the image
            $table->string('Muhuri')->nullable(); // Assuming this will store the path to the image
            $table->string('fieldworkTitle')->nullable();
            $table->text('fieldworkDescription')->nullable();
            $table->date('applicationDeadline')->nullable();
            $table->string('TIN', 9)->nullable(); // Add TIN field with 9 character limit
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
