<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriorityAndOtherColumnsToIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('issues', function (Blueprint $table) {
            $table->integer('priority')->after('status')->unsigned();
            $table->integer('position')->after('priority')->unsigned();
            $table->integer('task_id')->after('project_id')->unsigned();
            $table->string('column')->after('position');
            $table->string('swim_lane')->after('column');
            $table->timestamp('started_at')->nullable();
            $table->timestamp('modified_at')->nullable();
            $table->timestamp('moved_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('issues', function (Blueprint $table) {
            $table->dropColumn('priority');
            $table->dropColumn('position');
            $table->dropColumn('task_id');
            $table->dropColumn('column');
            $table->dropColumn('swim_lane');
            $table->dropColumn('started_at');
            $table->dropColumn('modified_at');
            $table->dropColumn('moved_at');
        });
    }
}
