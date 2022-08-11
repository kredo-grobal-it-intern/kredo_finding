<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_postings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedTinyInteger('occupation');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedTinyInteger('industry');
            $table->unsignedTinyInteger('employment_status');
            $table->string('job_description', 500);
            $table->string('welcome_requirements', 500);
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('opening_time')->nullable();
            $table->string('closing_time')->nullable();
            $table->unsignedTinyInteger('salary');
            $table->string('employee_benefits', 500)->nullable();
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
        Schema::dropIfExists('job_postings');
    }
}
