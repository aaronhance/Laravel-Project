<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
        });        
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->integer('type_id');
            $table->integer('max_slots');
            $table->integer('base_cost');
            $table->integer('monthly_multipliyer');
            $table->integer('disk_limit');
            $table->integer('memory_limit');
        });        
        Schema::create('hosts', function (Blueprint $table) { //has many types
            $table->increments('id');
            $table->string('name')->index();
            $table->integer('max_slots');
            $table->integer('max_memory');
        });        
        Schema::create('allowed_types', function (Blueprint $table) { //has many types
            $table->increments('id');
            $table->integer('type_id');
            $table->integer('host_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
        Schema::dropIfExists('products');
        Schema::dropIfExists('hosts');
        Schema::dropIfExists('allowed_types');
    }
}
