<?php

namespace App\Http\Controllers\OfficeExpense;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeductionsController extends Controller
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

   public function Deductions()
{
    return view('OfficeExpense.Deductions');
}
}
