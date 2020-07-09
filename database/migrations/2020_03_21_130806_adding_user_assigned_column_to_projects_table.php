<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddingUserAssignedColumnToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->integer('user_assigned')->unsigned(); 
            $table->foreign('user_assigned')->references('id')->on('users');
            $table->integer('user_created')->unsigned(); 
            $table->foreign('user_created')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['user_assigned', 'user_created']);
        });
    }
}
