<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class ActionRequestsController extends Controller
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
     public function actionrequest()
	{  
        $id = Auth::user()->id;
        $image_name = '../images/'.$id.'.png';
		$view_all_leaves_in_table=DB::table('leave_application')->select('Leave_Application_ID','Employee_ID','leave_Type','Subject','Description','DateFrom','DateTo')->where('leave_status','=','Pending')->get();
     return view ('action_requests',compact('view_all_leaves_in_table','image_name'));
	}
	public function accept($Leave_Application_ID)
	{  
      	DB::table('leave_application')->where('Leave_Application_ID',$Leave_Application_ID)->update(['leave_status' => 'Accepted']);
        return redirect()->route('action_requests');
	}
    public function reject($Leave_Application_ID)
    {  
        DB::table('leave_application')->where('Leave_Application_ID',$Leave_Application_ID)->update(['leave_status' => 'Rejected']);
        return redirect()->route('action_requests');
        // DB::table('leave_application')->where('Leave_Application_ID',$Leave_Application_ID)->delete();
        // return redirect()->route('action_requests');
    }
}
