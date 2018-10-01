<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AssignTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_tasks', function (Blueprint $table) {
            $table->increments('assign_task_id');
            $table->unsignedInteger('employee_id'); //specify a length of 10 to match an increment id (when declaring foreign keys)
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->unsignedInteger('project_id'); //specify a length of 10 to match an increment id (when declaring foreign keys)
            $table->foreign('project_id')->references('project_id')->on('projects');
            $table->date('date');
            $table->string('subject');
            $table->string('description')->nullable();
            $table->time('estimated_time');
            $table->integer('points')->nullable();
            $table->string('report')->nullable();
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
