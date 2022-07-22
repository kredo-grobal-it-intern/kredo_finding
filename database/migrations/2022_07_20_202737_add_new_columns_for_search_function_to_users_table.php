<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsForSearchFunctionToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->string('preferred_country')->nullable()->default(NULL)->after('self_introduction');
          $table->string('preferred_state')->nullable()->default(NULL)->after('self_introduction');
          $table->string('company_name')->nullable()->default(NULL)->after('self_introduction');
          $table->tinyInteger('preferred_employment_status')->nullable()->default(NULL)->after('occupation');
          $table->tinyInteger('job_position')->nullable()->default(NULL)->after('occupation');
          $table->string('tenureship')->nullable()->default(NULL)->after('occupation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->dropColumn('preferred_country');
          $table->dropColumn('preferred_state');
          $table->dropColumn('company_name');
          $table->dropColumn('preferred_employment_status');
          $table->dropColumn('job_position');
          $table->dropColumn('tenureship');
        });
    }
}
