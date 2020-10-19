<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('job_title')->after('username')->nullable();;
            $table->string('profile_image')->after('job_title')->nullable();;
            $table->text('about_me')->after('profile_image')->nullable();;
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
            $table->dropColumn('job_title');
            $table->dropColumn('profile_image');
            $table->dropColumn('about_me');
        });
    }
}
