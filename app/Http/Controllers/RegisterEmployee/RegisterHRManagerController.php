<?php

namespace App\Http\Controllers\RegisterEmployee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterHRManagerController extends Controller
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
     public function RegisterHRManager()
{  
    return view('RegisterEmployee.RegisterHRManager');
}
public function AddDepartments()
{  
    return view('RegisterEmployee.AddDepartments');
}
}
