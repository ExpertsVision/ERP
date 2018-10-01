<?php

namespace App\Http\Controllers\Attendance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\User;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon;
use Auth;
// use Barryvdh\DomPDF\Facade as PDF;

class LeaveApplicationController extends Controller
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
    public function LeaveApplication()
	{  
        $id = Auth::user()->id;
        $image_name = '../images/'.$id.'.png';
    	return view('Attendance.leave_application',compact('image_name'));
	}
    public function SendLeaveApplication(Request $request)
    {  
        //Get Content From The Form
        $id = Auth::user()->id;
        $email = $request->input('email');
        $leave_type = $request->input('leave_type');
        $subject = $request->input('subject');
        $description = $request->input('description');
        $datefrom = $request->input('datefrom');
        $dateto = $request->input('dateto');
        $datefrom= Carbon\Carbon::createFromFormat('d/m/Y', $datefrom);
        $dateto=Carbon\Carbon::createFromFormat('d/m/Y', $dateto);
      DB::table('leave_application')->insert(['Employee_ID'=>$id,'leave_type'=>$leave_type,'subject'=>$subject,'description'=>$description,'datefrom'=>$datefrom,'dateto'=>$dateto,'leave_status'=>'Pending']);


        $data = array(
    'email' => $email,   
    'leave_type'=> $leave_type,
    'subject' => $subject,
    'description' => $description,
    'datefrom' => $datefrom,
    'dateto' => $dateto
);
        // dd($data);

// $pdf = PDF::loadView('pdf.invoice',$data);
// return $pdf->stream('invoice.pdf', array('Attachment' => 0));

// $pdf = PDF::loadView('Attendance.leave_application', ['arrayname' => $data]);
// return $pdf->download('filename.pdf');
// $pdf = PDF::loadView('letters.test', $data);

Mail::send('Attendance.submitted_data', $data, function($message) 
{
    $message->from('abc@example.com', 'Employee');

    // $message->to('mr.maqsood.shah@gmail.com')->subject('Leave Application');
    // $message->cc('mr.maqsood.shah@gmail.com')->subject('Leave Application');

    // $message->attachData($pdf->output(), "invoice.pdf");
});

return view('Attendance.submitted_data',compact('leave_type','subject','description','datefrom','dateto'));
    }
}
