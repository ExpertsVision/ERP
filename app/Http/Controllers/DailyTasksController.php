<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DailyTasksController extends Controller
{
    public function add_dailytasks()
{
    return view('DailyTasks');
}
}
