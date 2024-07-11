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
        Schema::create('jobpostings', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->text('job_description');
            $table->string('job_location');
            $table->string('job_type');
            $table->string('job_category');
            $table->string('experience');
             $table->integer('salary');
            $table->string('company_name'); 
            // $table->string('company_logo')->nullable();
            $table->string('company_description');
            $table->string('company_website');
            $table->string('how_to_apply');
            $table->date('application_deadline');
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobpostings');
    }
};
