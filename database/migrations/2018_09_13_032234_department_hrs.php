<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DepartmentHrs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_hrs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('hr_manager_id');
            $table->foreign('hr_manager_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('department_id');
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
