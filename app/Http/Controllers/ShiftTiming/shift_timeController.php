<?php

namespace App\Http\Controllers\ShiftTiming;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class shift_timeController extends Controller
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
     public function ShiftTime()
{  
    return view('shift_time.shift_time');
}
}
