<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Attendances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('attendance_id');
            $table->unsignedInteger('employee_id'); //specify a length of 10 to match an increment id (when declaring foreign keys)
            $table->foreign('employee_id')->references('id')->on('users');
            $table->date('date');
            $table->time('check_in');
            $table->time('check_out');
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
