<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Auth;
use Storage;

class ProfileController extends Controller
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
     public function profile()
	{  
        $id = Auth::user()->id;
        $email = Auth::user()->email;
        // $ip_addres = \Request::ip();
        $medical_count = DB::table('leave_application')->select('Employee_ID')->where('Employee_ID','=',$id)->where('leave_type','=','Medical Leave')->where('leave_status','=','Accepted')->count();
        $casual_count = DB::table('leave_application')->select('Employee_ID')->where('Employee_ID','=',$id)->where('leave_type','=','Casual Leave')->where('leave_status','=','Accepted')->count();
        $unpaid_count = DB::table('leave_application')->select('Employee_ID')->where('Employee_ID','=',$id)->where('leave_type','=','Unpaid Leave')->where('leave_status','=','Accepted')->count();
        $business_count = DB::table('leave_application')->select('Employee_ID')->where('Employee_ID','=',$id)->where('leave_type','=','Business Leave')->where('leave_status','=','Accepted')->count();
        $total_mins_late = DB::table('attendance')->where('Email','=',$email)->sum('late_minutes');
        $in_hours = $total_mins_late/60;
        $in_hours = round($in_hours,1);
        $Medical_show_modal = DB::table('leave_application')->select('Leave_Application_ID','leave_type','DateFrom','DateTo','leave_status')->where('Employee_ID','=',$id)->where('leave_type','=','Medical Leave')->get();
        $Business_show_modal = DB::table('leave_application')->select('Leave_Application_ID','leave_type','DateFrom','DateTo','leave_status')->where('Employee_ID','=',$id)->where('leave_type','=','Business Leave')->get();
        $Unpaid_show_modal = DB::table('leave_application')->select('Leave_Application_ID','leave_type','DateFrom','DateTo','leave_status')->where('Employee_ID','=',$id)->where('leave_type','=','Unpaid Leave')->get();
         $Casual_show_modal = DB::table('leave_application')->select('Leave_Application_ID','leave_type','DateFrom','DateTo','leave_status')->where('Employee_ID','=',$id)->where('leave_type','=','Casual Leave')->get();
         $Mins_Late_show_modal = DB::table('attendance')->select('Date','Check_in_Time','Check_out_Time','early_check_out_reason','early_check_out_time','Break_on','Break_off','late_minutes')->where('Email','=',$email)->get();
          $late_mins_show_modal = DB::table('attendance')->select('Date','late_minutes')->where('Email','=',$email)->get();
        // dd($ip_addres);
      $image_name = '../images/'.$id.'.png';
       return view('layouts.profile',compact('medical_count','casual_count','unpaid_count','total_mins_late','business_count','in_hours','Medical_show_modal','Business_show_modal','Unpaid_show_modal','Casual_show_modal','Mins_Late_show_modal','late_mins_show_modal','image_name'));
	}
}
