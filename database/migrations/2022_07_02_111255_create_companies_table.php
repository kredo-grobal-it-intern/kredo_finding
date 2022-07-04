<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('services', 500)->nullable()->default(NULL);
            $table->longText('img_name')->nullable()->default(NULL);
            $table->string('address1')->nullable()->default(NULL);
            $table->string('address2')->nullable()->default(NULL);
            $table->string('city')->nullable()->default(NULL);
            $table->string('state')->nullable()->default(NULL);
            $table->string('country')->nullable()->default(NULL);
            $table->string('zipcode')->nullable()->default(NULL);
            $table->string('establishment_year')->nullable()->default(NULL);
            $table->string('president_name')->nullable()->default(NULL);
            $table->string('total_personnel')->nullable()->default(NULL);
            $table->string('capital')->nullable()->default(NULL);
            $table->string('gross_sales')->nullable()->default(NULL);
            $table->string('average_age')->nullable()->default(NULL);
            $table->string('homepage_url')->nullable()->default(NULL);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable()->default(NULL);
            $table->rememberToken();
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
        Schema::dropIfExists('companies');
    }
}
