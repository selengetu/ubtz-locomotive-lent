<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttentionHotstand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotstand', function (Blueprint $table) {
            $table->increments('hotstand_id');
            $table->integer('ribbon_id');
            $table->integer('station_id');
            $table->dateTime('starttime');
            $table->dateTime('endtime');
            $table->timestamps();
            $table->foreign('ribbon_id')->references('ribbon_id')->on('ribbon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotstand');
    }
}
