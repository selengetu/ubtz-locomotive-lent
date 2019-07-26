<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaultDet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fault_det', function (Blueprint $table) {
            $table->increments('fault_det_id');
            $table->integer('fault_id');
            $table->dateTime('faulttime')->nullable();
            $table->integer('over_speed')->nullable();
            $table->integer('stoptime')->nullable();
            $table->integer('tapetype')->nullable();
            $table->integer('reasontype')->nullable();
            $table->integer('broketype')->nullable();
            $table->integer('is_techact')->nullable();
            $table->string('reason', 500)->nullable();
            $table->integer('is_stop')->nullable();
            $table->integer('is_test')->nullable();
            $table->integer('is_attack')->nullable();
            $table->integer('tush_no')->nullable();
            $table->string('tush_name', 20)->nullable();
            $table->integer('weight')->nullable();
            $table->integer('constkilo')->nullable();
            $table->integer('constspeed')->nullable();
            $table->integer('faultkilo')->nullable();
            $table->integer('faultspeed')->nullable();
            $table->timestamps();
            $table->foreign('fault_id')->references('fault_id')->on('fault');
            $table->foreign('reasontype')->references('reasontype_id')->on('reason_type');
            $table->foreign('broketype')->references('broketype_id')->on('broke_type');
            $table->foreign('tapetype')->references('tapetype_id')->on('tape_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fault_det');
    }
}
