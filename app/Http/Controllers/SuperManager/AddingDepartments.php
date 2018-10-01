<?php

namespace App\Http\Controllers\SuperManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;

class AddingDepartments extends Controller
{
    public function AddDepartment(Request $request)
    {
    	$departments = $request->get('departments');
    	foreach ($departments as $department) {
    		$new_department = array(
    				'department_name' => $department,
    			);
    		$Department = new Department($new_department);
    		$Department -> save();
    	}
    	return view('RegisterEmployee.AddDepartments');
    }
}
