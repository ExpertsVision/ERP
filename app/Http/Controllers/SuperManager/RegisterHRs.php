<?php

namespace App\Http\Controllers\SuperManager;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use DB;
use App\DepartmentHRs;
use App\User;
use Session;

class RegisterHRs extends Controller
{
    public function RegisterHRManager()
    {
    	$departments = DB::table('departments')->get();
    	Session()->put('departments', $departments);
    	return view('RegisterEmployee.RegisterHRManager', compact('departments'));
	}

	public function HRregistered(Request $request)
	{
		$company_id = Auth::id();
		$user = new User;
		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->password = bcrypt("1234");
		$user->role = 'HR Manager';

	    $user->save();	    
	    $thisUser= User::findOrFail($user->id);
	    Mail::send('Email.VerifyEmail', ["data" => $thisUser], function($message) use ($thisUser) 
	    {
	        $message->from('noreply@shareride.com', 'EMS By Experts VISION');
	        $message->to($thisUser->email)->subject('Congratulations! Your account is verified');
	    });

    	$hr_departments = $request->get('hr_departments');
    	foreach ($hr_departments as $hr_department) {
    		$hr_department = array(
    				'hr_manager_id' => $user->id,
    				'department_id' => $hr_department,
    			);
    		$Department_HR = new DepartmentHRs($hr_department);
    		$Department_HR -> save();
    	}

        $manager = DB::table('managers')->insert(array(
                'manager_id' => $user->id,
                'company_id' => $company_id
            ));
    	$departments = Session::get('departments');
    	return view('RegisterEmployee.RegisterHRManager', compact('departments'));
	}
}
