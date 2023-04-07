<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('issue_comments', function (Blueprint $table) {
            $table->renameColumn('task_id', 'issue_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('issue_comments', function (Blueprint $table) {
            $table->renameColumn('issue_id', 'task_id');
        });
    }
};
