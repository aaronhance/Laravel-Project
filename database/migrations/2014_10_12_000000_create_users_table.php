<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('phone')->unsigned();
            $table->string('dob');
            $table->string('country');
            $table->string('state');
            $table->string('street');
            $table->string('postcode');
            $table->ipAddress('lastip');
            $table->string('password');
            $table->integer('servers_online');
            $table->integer('servers_total');
            $table->integer('players_online');
            $table->integer('players_total');
            $table->integer('players_most');
            $table->integer('role');
            $table->boolean('suspended');
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
        Schema::dropIfExists('users');
    }
}
