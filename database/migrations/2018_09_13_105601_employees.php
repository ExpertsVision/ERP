<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Employees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('finance_manager_id')->nullable();
            $table->foreign('finance_manager_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('shift_timing_id')->nullable(); //specify a length of 10 to match an increment id (when declaring foreign keys)
            $table->foreign('shift_timing_id')->references('id')->on('shift_types')->onDelete('cascade');
            $table->string('timezone')->nullable();
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
