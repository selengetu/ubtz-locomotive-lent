<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttentionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attention', function (Blueprint $table) {
            $table->increments('attention_id');
            $table->integer('ribbon_id');
            $table->integer('fromstation');
            $table->integer('tostation');
            $table->integer('speed');
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
        Schema::dropIfExists('attention');
    }
}
