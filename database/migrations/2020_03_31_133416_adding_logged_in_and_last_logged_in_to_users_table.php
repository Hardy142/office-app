<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddingLoggedInAndLastLoggedInToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('last_logged_in')->useCurrent();
            $table->boolean('logged_in')->default(1);
            $table->boolean('active')->default(1);
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
            $table->dropColumn('last_logged_in');
            $table->dropColumn('logged_in');
            $table->dropColumn('active');
        });
    }
}
