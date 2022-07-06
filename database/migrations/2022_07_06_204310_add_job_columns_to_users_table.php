<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJobColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('job_experiences', 500)->nullable()->default(NULL)->after('self_introduction');
            $table->string('job_skills')->nullable()->default(NULL)->after('self_introduction');
            $table->string('occupation')->nullable()->default(NULL)->after('self_introduction');
            $table->tinyInteger('is_active')->nullable(false)->default(0)->after('facebook_id')->comment('0:inactive 1:active');
            $table->renameColumn('email_verified_at', 'date_email_verified');
            $table->renameColumn('created_at', 'date_created');
            $table->renameColumn('updated_at', 'date_updated');
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
            $table->dropColumn('job_experiences');
            $table->dropColumn('job_skills');
            $table->dropColumn('occupation');
            $table->dropColumn('is_active');
            $table->renameColumn('date_email_verified', 'email_verified_at');
            $table->renameColumn('date_created', 'created_at');
            $table->renameColumn('date_updated', 'updated_at');
        });
    }
}
