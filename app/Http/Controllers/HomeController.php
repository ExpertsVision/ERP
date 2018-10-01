<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
class HomeController extends Controller
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
    public function index()
    {
      $id = Auth::user()->id;
      $image_name = '../images/'.$id.'.png';
          //dd($image_name);
        // dd($total_mins_late);
       // return view('layouts.sidebar',compact('image_name'));
        return view('home',compact('image_name'));
    }
     public function create()
{
    //return view('create');
}
   /* public function insert(Request $request)
    {   
 $Monthly_salary = $request->input('Monthly_salary');
      //$email = $request->input('email');
    DB::insert('INSERT INTO office_expense_monthly(Office_ID, Employee_ID, Expense_amount, Expense_Catagory, Total_Salary, Bonus, Overtime_hours, Overtime_Pay, Loan_Paid, Misc_Payments, Remarks) VALUES(?,?,?,?,?,?,?,?,?,?,?)' ,['1','2','4000','Lunch',$Monthly_salary,'5400','1','10','0','0','Good']);
    

    $s="data inserted successfully!";
    return view("addsalary",compact($s));
    //return view('power')->withName($bill);
  // return view('welcome', compact('name', 'date'));

} */

/*public function insertform(){
      return view('ExpenseView');
   }*/
    
   public function insert(Request $request){

      $Office_ID = $request->input('Office_ID');
      $Employee_ID = $request->input('Employee_ID');
      $Expense_amount = $request->input('Expense_amount');
      $Expense_Catagory = $request->input('Expense_Catagory');
      $Monthly_Salary = $request->input('Monthly_Salary');
      $Bonus = $request->input('Bonus');
      $Overtime_hours = $request->input('Overtime_hours');
      $Overtime_Pay = $request->input('Overtime_Pay');
      $Loan_Paid = $request->input('Loan_Paid');
      $Misc_Payments = $request->input('Misc_Payments');
      $Remarks = $request->input('Remarks');
      DB::insert('insert into office_expense_monthly(Office_ID, Employee_ID, Expense_amount, Expense_Catagory, Total_Salary, Bonus, Overtime_hours, Overtime_Pay, Loan_Paid, Misc_Payments, Remarks) values(?,?,?,?,?,?,?,?,?,?,?)',[$Office_ID,$Employee_ID,$Expense_amount,$Expense_Catagory,$Monthly_Salary,$Bonus,$Overtime_hours,$Overtime_Pay,$Loan_Paid,$Misc_Payments,$Remarks]);
      echo "Record inserted successfully.<br/>";
      echo '<a href = "/public/home">Back</a>';

//$message=$e;
   }   
   }


