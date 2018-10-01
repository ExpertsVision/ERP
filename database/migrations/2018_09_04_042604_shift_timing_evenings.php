<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShiftTimingEvenings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_timing_evenings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('day');
            $table->time('check_in');
            $table->time('check_out');
            $table->time('break_time_out');
            $table->time('break_time_in');
            $table->unsignedInteger('shift_timing_id'); //specify a length of 10 to match an increment id (when declaring foreign keys)
            $table->foreign('shift_timing_id')->references('id')->on('shift_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}