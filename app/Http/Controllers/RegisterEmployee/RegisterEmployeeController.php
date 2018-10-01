<?php

namespace App\Http\Controllers\RegisterEmployee;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use DB;
use App\User;
use Session;
use Illuminate\Support\Facades\Input;


class RegisterEmployeeController extends Controller
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
     public function RegisterEmployee()
{  
    return view('RegisterEmployee.RegisterEmployee');
}
public function EmployeeRegistered(Request $request)

{
    //     $validatedData = $request->validate([          
    //     'company_name'=> 'unique:users,name',
    //     'email'=> 'unique:users,email',           
    //     ]);

    // $user = new User;
    // $user->name = $request->input('company_name');
    // $user->email = $request->input('email');
    // $user->password = bcrypt("1234");
    // $user->role = 'Super Manager';
    // //$user->verifyToken = Str::random(8);
    // $user->save();
    
    // $thisUser= User::findOrFail($user->id);
    // // $token = app('auth.password.broker')->createToken($thisUser);
    // //sending Email
    //  Mail::send('Email.VerifyEmail', ["data" => $thisUser], function($message) use ($thisUser) {
    //             $message->from('noreply@shareride.com', 'EMS By Experts VISION');
    //             $message->to($thisUser->email)->subject('Congratulations! Your account is verified');
    //         });

    // Session::flash('flash_message', 'Company Successfully Registered');
    // return redirect()->route('register_company');

}
public function RegisterManager()
{  
    $hr_manager_id = Auth::id();
    Session()->put('hr_manager_id', $hr_manager_id);
    $company_id = DB::table('managers')
    ->where('managers.manager_id', '=', $hr_manager_id)
    ->first()->company_id;
    $timezone = DB::table('companys_timezones')
    ->where('companys_timezones.company_id', '=', $company_id)
    ->first()->timezone;
    Session()->put('timezone', $timezone);
    $departments = DB::table('departments')
    ->join('department_hrs', 'departments.department_id', '=', 'department_hrs.department_id')
    ->where('department_hrs.hr_manager_id', '=', $hr_manager_id)
    ->get();
    Session()->put('departments', $departments);
    return view('RegisterEmployee.RegisterManager', compact('timezone', 'departments'));
}

public function Registered(Request $request)
{
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt("1234");
        $user->role = Input::get('role');
        $user->save();      
        $thisUser= User::findOrFail($user->id);
        Mail::send('Email.VerifyEmail', ["data" => $thisUser], function($message) use ($thisUser) 
        {
            $message->from('noreply@shareride.com', 'EMS By Experts VISION');
            $message->to($thisUser->email)->subject('Congratulations! Your account is verified');
        });

        $hr_manager_id = Session::get('hr_manager_id');
        $department_id = Input::get('department_id');
        $timezone = Input::get('timezone');

        if($user->role !='Employee'){
            $manager = DB::table('managers_hr_department')->insert(array(
                    'manager_id' => $user->id,
                    'hr_manager_id' => $hr_manager_id,
                    'department_id' => $department_id
                ));
            }
        else{
            $employee = DB::table('employees_hr_department')->insert(array(
                    'employee_id' => $user->id,
                    'hr_manager_id' => $hr_manager_id,
                    'department_id' => $department_id
            ));
        }

        $employee = DB::table('employes')->insert(array(
                'employee_id' => $user->id,
                'timezone' => $timezone
            ));
        $timezone = Session::get('timezone');
        $departments = Session::get('departments');
        return view('RegisterEmployee.RegisterManager', compact('timezone', 'departments'));
}

}
