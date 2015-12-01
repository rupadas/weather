<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('main');
            $table->string('city');
            $table->string('description');
            $table->float('temperature');
            $table->float('pressure');
            $table->integer('humidity');
            $table->float('temp_min');
            $table->float('temp_max');
            $table->float('sea_level');
            $table->float('grnd_level');
            $table->float('speed');
            $table->float('degree');
            $table->datetime('sunrise');
            $table->datetime('sunset');
            $table->date('date');
            $table->time('time');
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
        Schema::drop('infos');
    }
}
