<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('zipcode')->nullable()->default(NULL)->after('img_name');
            $table->string('country')->nullable()->default(NULL)->after('img_name');
            $table->string('state')->nullable()->default(NULL)->after('img_name');
            $table->string('city')->nullable()->default(NULL)->after('img_name');
            $table->string('address2')->nullable()->default(NULL)->after('img_name');
            $table->string('address1')->nullable()->default(NULL)->after('img_name');
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
            $table->dropColumn('zipcode');
            $table->dropColumn('country');
            $table->dropColumn('state');
            $table->dropColumn('city');
            $table->dropColumn('address2');
            $table->dropColumn('address1');
        });
    }
}
