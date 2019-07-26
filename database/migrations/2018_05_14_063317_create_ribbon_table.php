<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRibbonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ribbon', function (Blueprint $table) {
            $table->increments('ribbon_id');
            $table->integer('route_id');
            $table->integer('depo_id');
            $table->integer('speedcontrollerno');
            $table->integer('loctype');
            $table->integer('locserial');
            $table->integer('locno');
            $table->integer('is_ribbon');
            $table->dateTime('starttime');
            $table->dateTime('endtime');
            $table->integer('fromstation');
            $table->integer('tostation');
            $table->integer('patchmin')->nullable();
            $table->integer('translator_id');
            $table->integer('translate_date');
            $table->integer('create_who');
            $table->integer('update_who');
            $table->timestamps();
            $table->foreign('translator_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ribbon');
    }
}
