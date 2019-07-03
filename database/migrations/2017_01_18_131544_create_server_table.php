<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->integer('type_id')->index();
            $table->integer('host_id');
            $table->string('status')->index();
            $table->integer('user_id');
            $table->integer('current_players');
            $table->integer('max_players');
            $table->integer('max_memory');
            $table->integer('cpu_priority');
            $table->integer('max_disk');
            $table->string('server_secret');
            $table->datetime('started_at');
            $table->string('ip');
            $table->integer('port');
            $table->boolean('suspeneded');
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
        Schema::dropIfExists('servers');
    }
}
