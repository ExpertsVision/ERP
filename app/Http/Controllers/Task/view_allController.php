<?php

namespace App\Http\Controllers\Task;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class view_allController extends Controller
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
     public function view_all()
{  
     $id = Auth::user()->id;
   $view_all_tasks = DB::table('assign_tasks')->select('assign_task_id','employee_id','project_id','subject','description','estimated_time','points','report')->whereNull('points')->get();
   $view_all_tasks_Employee = DB::table('assign_tasks')->select('assign_task_id','employee_id','project_id','subject','description','estimated_time','points','report')->where('employee_id','=',$id)->get();
    return view('Task.view_all',compact('view_all_tasks','view_all_tasks_Employee'));
}
public function points(Request $request, $assign_task_id)
    {  
        $points_txtbox = $request->input('points_txtbox');
        // dd($points_txtbox);
        DB::table('assign_tasks')->where('assign_task_id',$assign_task_id)->update(['points' => $points_txtbox]);
        // return redirect()->route('Task.view_all');
        return redirect('view_all');
    }
}
