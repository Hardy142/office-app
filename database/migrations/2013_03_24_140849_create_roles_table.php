<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        DB::table('roles')->insert(
            array(
                'name' => 'Super Admin',
                'slug' => 'super_admin'
            )
        );

        DB::table('roles')->insert(
            array(
                'name' => 'Admin',
                'slug' => 'admin'
            )
        );

        DB::table('roles')->insert(
            array(
                'name' => 'Employee',
                'slug' => 'employee'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
