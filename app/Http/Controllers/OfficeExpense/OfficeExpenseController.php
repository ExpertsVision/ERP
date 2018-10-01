<?php

namespace App\Http\Controllers\OfficeExpense;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class OfficeExpenseController extends Controller
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

   public function OfficeExpense()
{
    $id = Auth::user()->id;
    $image_name = '../images/'.$id.'.png';
    return view('OfficeExpense.OfficeExpense',compact('image_name'));
}
public function insert(Request $request){
      $total_salary = $request->input('total_salary');
      $expense_amount = $request->input('expense_amount');
      $expense_catagory = $request->input('expense_catagory');
      $bonus = $request->input('bonus');
      $overtime_hours = $request->input('overtime_hours');
      $overtime_pay = $request->input('overtime_pay');
      $loan_paid = $request->input('loan_paid');
      $misc_payment = $request->input('misc_payment');
      $remarks = $request->input('remarks');
      
      DB::insert('insert into office_expense_monthly (Expense_amount,Expense_Catagory,Total_Salary,Bonus,Overtime_hours,Overtime_Pay,Loan_Paid,Misc_Payments,Remarks) values(?,?,?,?,?,?,?,?,?)',[$expense_amount,$expense_catagory,$total_salary,$bonus,$overtime_hours,$overtime_pay,$loan_paid,$misc_payment,$remarks]);
      echo "Record inserted successfully.<br/>";
      echo '<a href = "/insert">Click Here</a> to go back.';
   }
}
