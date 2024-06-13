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
            $table->string('location')->nullable();
            $table->unsignedBigInteger('officeID')->nullable();
            $table->string('supervisorName');
            $table->string('supervisorPhone')->nullable();
            $table->string('supervisorEmail')->unique();
            $table->string('password');
            $table->string('supervisorPosition')->nullable();
            $table->string('supervisorSignature')->nullable(); 
            $table->string('Muhuri')->nullable(); 
            $table->string('companyLogo')->nullable(); 
            $table->string('fieldworkTitle')->nullable();
            $table->text('fieldworkDescription')->nullable();
            $table->date('applicationDeadline')->nullable();
            $table->string('TIN', 9)->nullable(); 
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
