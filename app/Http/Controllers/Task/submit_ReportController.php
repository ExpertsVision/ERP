<?php

namespace App\Http\Controllers\Task;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class submit_ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function SubmitReport()
{  
    return view('Task.submit_report');
}
public function report_submitted(Request $request)
    {  
        
        $description = $request->input('description');
        $task_number = $request->input('task_number');
        // dd($points_txtbox);
        DB::table('assign_tasks')->where('assign_task_id',$task_number)->update(['report' => $description]);
        // return redirect()->route('Task.view_all');
        return redirect('view_all');
    }
}
