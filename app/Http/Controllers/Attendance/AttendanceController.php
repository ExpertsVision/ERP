<?php

namespace App\Http\Controllers\Attendance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Auth;
use Session;

class AttendanceController extends Controller
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
     public function Attendance()
{  
  $id = Auth::user()->id;
      $image_name = '../images/'.$id.'.png';
    return view('Attendance.attendance',compact('image_name'));
}
 public function Check_in_pass()
    {
      $id = Auth::user()->id;
      $image_name = '../images/'.$id.'.png';
      // $date = Carbon::now();
      date_default_timezone_set("Asia/Karachi");
      $time = date("h:i");
      $date = date("Y-m-d");     
        return view('Attendance.attendance',compact('time','date','message','image_name'));
      //return view('home');
    }
    public function check_in(Request $request)
{
     $id = Auth::user()->id;
      $image_name = '../images/'.$id.'.png';
      $email = Auth::user()->email;
      $name = Auth::user()->name;
      date_default_timezone_set("Asia/Karachi");
      $time = date("h:i");
      $actual_time = date("9:00");
      $actual_start_at = Carbon::parse($time);
      $actual_end_at   = Carbon::parse($actual_time);
      $mins = $actual_end_at->diffInMinutes($actual_start_at, true);

// dd($mins/60);
      $date = date("Y-m-d"); 
      $recordexist = DB::table('Attendance')->where('Email', '=', $email)->where('Date', '=', $date)->first();
      if (is_null($recordexist)) 
      {
        if ($time <= $actual_time) 
        {
          DB::table('Attendance')->insert(['Name' => $name, 'Email' => $email,'Check_in_Time'=>$time,'Date'=>$date,'late_minutes'=>$mins]);
          $check_in_message='You have Checked in. Please come back to Check Out at 18:30';
          return view('Attendance.attendance',compact('check_in_message',$check_in_message,'image_name',$image_name));

         // Session::flash('message', 'This is a message!');
          // return redirect()->route('Attendance.attendance');
        }
        elseif ($time > $actual_time) 
        {
          DB::table('Attendance')->insert(['Name' => $name, 'Email' => $email,'Check_in_Time'=>$time,'Date'=>$date,'late_minutes'=> '0']);
          $check_in_message='Well done. You have Checked in before the time. Please come back to Check Out at 18:30';
          return view('Attendance.attendance',compact('check_in_message',$check_in_message,'image_name',$image_name));
        }
      }
      else
      {
     $message='Already Checked in.';
       return view('home')->with('message', $message,'image_name',$image_name);
     }
}
public function Break_on(Request $request)
{
     $email = Auth::user()->email;
      $name = Auth::user()->name;
      date_default_timezone_set("Asia/Karachi");
      $time = date("h:i");
      $date = date("Y-m-d"); 
      $recordexist = DB::table('Attendance')->where('Email', '=', $email)->where('Date', '=', $date)->first();
     
      if (is_null($recordexist)) 
      {
       $Break_on_message='Please check in first.';
        // return view('home')->with('message', $message);
        //  $check_out_message='You have Checked out.';
       return view('Attendance.attendance',compact('Break_on_message',$Break_on_message));
      }
      else
      {
     DB::table('Attendance')->where('Email','=',$email)->where('Date', '=', $date)->update(['Break_on' => $time]);
       $Break_on_message='Your Break Time has started. please come back at 14:00.';
        // return view('home')->with('message', $message);
        //  $Break_on_message='Please check in first.'.$recordexist;
       return view('Attendance.attendance',compact('Break_on_message',$Break_on_message));
     }
}
public function Break_off(Request $request)
{
     $email = Auth::user()->email;
      $name = Auth::user()->name;
      date_default_timezone_set("Asia/Karachi");
      $time = date("h:i");
      $date = date("Y-m-d"); 
      $recordexist = DB::table('Attendance')->where('Email', '=', $email)->where(['Date'=> $date,'Break_on'=>$time])->first();
      if (is_null($recordexist)) 
      {
       $Break_off_message='Please take Break first.';
       return view('Attendance.attendance',compact('Break_off_message',$Break_off_message));
      }
      else
      {
     DB::table('Attendance')->where('Email','=',$email)->where('Date', '=', $date)->update(['Break_off' => $time]);
       $Break_off_message='Welcome back.';
       return view('Attendance.attendance',compact('Break_off_message',$Break_off_message));
     }
}
public function check_out(Request $request)
{
     $id = Auth::user()->id;
     $email = Auth::user()->email;
      $name = Auth::user()->name;
      date_default_timezone_set("Asia/Karachi");
      $time = date("h:i");
      $date = date("Y-m-d"); 
      $recordexist = DB::table('Attendance')->where('Email', '=', $email)->where('Date', '=', $date)->first();
      $report_check = DB::table('assign_tasks')->where('employee_id','=',$id)->whereNull('report')->count();
      // dd($report_check);
      if (is_null($recordexist)) 
      {
       $check_out_message='Please check in first.';
       return view('Attendance.attendance',compact('check_out_message',$check_out_message));
        // return view('home')->with('message', $message);
      }
      elseif ($report_check > 0) 
      {
        $check_out_message='you have not submitted reports for today. Please submit report for each task.';
       return view('Attendance.attendance',compact('check_out_message',$check_out_message));
      }
      else
      {
     DB::table('Attendance')->where('Email','=',$email)->where('Date', '=', $date)->update(['Check_out_Time' => $time]);
     $check_out_message='Great. you have submitted all reports today. Checked out successfully.';
       return view('Attendance.attendance',compact('check_out_message',$check_out_message,'report_check',$report_check));
       // $message='You have Checked out.';
       //  return view('home')->with('message', $message);
     }
}
public function early_check_out(Request $request)
{
     $email = Auth::user()->email;
      $name = Auth::user()->name;
      $txtearly_check_out_reason = $request->input('txtearly_check_out_reason');
      date_default_timezone_set("Asia/Karachi");
      $time = date("h:i");
      $date = date("Y-m-d"); 
      $recordexist = DB::table('Attendance')->where('Email', '=', $email)->where('Date', '=', $date)->first();
      if (is_null($recordexist)) 
      {
       $early_check_out_message='Please check in first.'.$recordexist;
        // return view('home')->with('message', $message);
        // $early_check_out_message='You have Checked out.';
       return view('Attendance.attendance',compact('early_check_out_message',$early_check_out_message));
      }
      else
      {
     DB::table('Attendance')->where('Email','=',$email)->where('Date', '=', $date)->update(['early_check_out_time' => $time,'early_check_out_reason' => $txtearly_check_out_reason]);
       $early_check_out_message='You have Checked out at Unusual time. please remember to check out at 16:30. THANKS';
        // return view('home')->with('message', $message);
       return view('Attendance.attendance',compact('early_check_out_message',$early_check_out_message));
     }
}
}
