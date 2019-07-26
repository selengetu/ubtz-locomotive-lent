<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectroniccardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electroniccard', function (Blueprint $table) {
            $table->increments('card_id');
            $table->integer('ribbon_id');
            $table->integer('fromstation');
            $table->integer('tostation');
            $table->integer('cardtype');
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
        Schema::dropIfExists('electroniccard');
    }
}
