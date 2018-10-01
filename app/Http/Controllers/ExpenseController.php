<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExpenseController extends Controller {



   public function create()
{
    return view('create');
}
   public function insertform()
   {
       $id = Auth::user()->id;
        $image_name = '../images/'.$id.'.png';
      return view('home',compact('image_name'));
   }
	
   public function insert(Request $request){
      $Total_Salary = $request->input('Total_Salary');
      DB::insert('insert into office_expense_monthly (Total_Salary) values(?)',[$Total_Salary]);
      echo "Record inserted successfully.<br/>";
      echo '<a href = "/insert">Click Here</a> to go back.';
   }
}