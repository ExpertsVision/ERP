<?php

namespace App\Http\Controllers\Task;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use DB;
use App\DepartmentHRs;
use App\User;
use Session;

class assignController extends Controller
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
     public function assign()
{  
        $name = Auth::user()->name;
        // $role = Auth::user()->role;
        $employes=DB::table('users')->select('name','id')->where('role','=','Employee')->get();
        $projects=DB::table('projects')->select('project_name','project_id')->get();
        // $employes = DB::table('users')->select('name','=',$name)->where('role','=','Employee');
        // Session()->put('employes', $employes);
        // return view('RegisterEmployee.RegisterHRManager', compact('departments'));
    return view('Task.assign', compact('employes','projects'));
}
 public function assign_tasks(Request $request)
{  
      $employee_name = $request->get('employee_name');
      $project_name = $request->get('project_name');
      $subject = $request->get('subject');
      $description = $request->get('description');
      $estimated_time = $request->get('estimated_time');
      // $id = $request->get('id');
      $id = DB::table('users')->select('id')->where('name','=', $employee_name)->first();
      $proj_id = DB::table('projects')->select('project_id')->where('project_name','=', $project_name)->first();
      //dd($id);
      //DB::table('assign_tasks')->insert('employee_id', '=', $id);
      DB::table('assign_tasks')->insert(array('employee_id' => $id->id,'project_id'=>$proj_id->project_id,'subject'=>$subject,'description'=>$description,'estimated_time'=>$estimated_time));
      // DB::table('assign_tasks')->insert(['employee_id'=>$id]);
// DB::insert('insert into consumer(ManagerID,ConsumerName,Email,Phone,Address,  City,OperatingZone_ID,ConsumerTypeUsageID,ConsumerTypeBillingID,SystemID) values(?,?,?,?,?,?,?,?,?,?)',[$manager_id,$name,$email,$phone,$address,$city,$opertating_zone_id,$consu_typeuID,$consu_typebID,$system_id]);
//DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle']);
      // $message="Task Assigned successfully";     
      return view('home');
  }
}
