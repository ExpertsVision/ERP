<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/register_company','Admin\RegisterCompanyController@CompanyRegistered')->middleware('role:Admin');
Route::get('/register_company','Admin\RegisterCompanyController@RegisterCompany')->name('register_company')->middleware('role:Admin');
Route::get('/register_employee','RegisterEmployee\RegisterEmployeeController@RegisterEmployee')->name('register_employee')->middleware('role:Super Manager');
Route::post('/register_employee','RegisterEmployee\RegisterEmployeeController@EmployeeRegistered')->middleware('role:Super Manager');
Route::get('/profile','ProfileController@profile')->name('profile')->middleware('role:Employee');


Route::get('/shift_time','ShiftTiming\shift_timeController@ShiftTime')->name('shift_time')->middleware('role:HR Manager');
Route::get('/task_assign','Task\assignController@assign')->name('task_assign')->middleware('role:Employee,HR Manager');
Route::post('/assign_task','Task\assignController@assign_tasks')->name('assign_task')->middleware('role:Employee,HR Manager');
// Route::get('/task_assign','Task\assignController@assign')->name('task_assign')->middleware('role:HR Manager');
Route::get('/view_all','Task\view_allController@view_all')->name('view-all')->middleware('role:Employee,HR Manager');
// Route::get('/view_all','Task\view_allController@view_all')->name('view-all')->middleware('role:HR Manager');

Route::get('/add_departments','RegisterEmployee\RegisterHRManagerController@AddDepartments')->name('add_departments')->middleware('role:Super Manager');

Route::get('/attendance','Attendance\AttendanceController@Attendance')->name('attendance')->middleware('role:Employee');
Route::get('/leave_application','Attendance\LeaveApplicationController@LeaveApplication')->name('leave_application')->middleware('role:Employee');
Route::get('/action_requests','ActionRequestsController@actionrequest')->name('action_requests')->middleware('role:HR Manager');
Route::get('/accept_request/{Leave_Application_ID}','ActionRequestsController@accept')->name('accept_request')->middleware('role:HR Manager');
Route::get('/reject_request/{Leave_Application_ID}','ActionRequestsController@reject')->name('reject_request')->middleware('role:HR Manager');
Route::post('/points_given/{assign_task_id}','Task\view_allController@points')->name('points_given')->middleware('role:HR Manager');

Route::post('/leave_application_submitted','Attendance\LeaveApplicationController@SendLeaveApplication')->name('leave_application_submitted')->middleware('role:Employee');
Route::get('/check_in', 'Attendance\AttendanceController@check_in_pass')->name('check_in')->middleware('role:Employee');
Route::post('/check_in', 'Attendance\AttendanceController@check_in')->name('check_in')->middleware('role:Employee');
Route::post('/early_check_out', 'Attendance\AttendanceController@early_check_out')->name('early_check_out')->middleware('role:Employee');
Route::post('/check_out', 'Attendance\AttendanceController@check_out')->name('check_out')->middleware('role:Employee');
Route::post('/Break_on', 'Attendance\AttendanceController@Break_on')->name('Break_on')->middleware('role:Employee');
Route::post('/Break_off', 'Attendance\AttendanceController@Break_off')->name('Break_off')->middleware('role:Employee');
Route::get('/submit_report/{submit_report}','Task\submit_ReportController@SubmitReport')->name('submit_report')->middleware('role:Employee');
Route::post('/report_sent','Task\submit_ReportController@report_submitted')->name('report_sent')->middleware('role:Employee');
Route::get('/office_expense','OfficeExpense\OfficeExpenseController@OfficeExpense');
Route::post('/office_expense','OfficeExpense\OfficeExpenseController@insert');
Route::get('/deductions','OfficeExpense\DeductionsController@Deductions');
//Registration_Verification
// Route::get('/confirm_registration/{token}', 'Admin\RegisterCompanyController@TokenConfirmation');
// Route::post('/set_password','Admin\RegisterCompanyController@PasswordIsSet');

// Route::get('insert','HomeController@create');
// Route::post('create','HomeController@insert');
// Route::get('add_dailytasks','DailyTasksController@add_dailytasks');
/* SUPER MANAGER*/
Route::post('/addingdepartments', 'SuperManager\AddingDepartments@AddDepartment')->middleware('role:Super Manager');
Route::get('/register_hr_manager','SuperManager\RegisterHRs@RegisterHRManager')->name('register_hr_manager')->middleware('role:Super Manager');
Route::post('addinghrmanager', 'SuperManager\RegisterHRs@HRregistered')->middleware('role:Super Manager');
Route::post('/register_company', 'SuperManager\SetTimeZone@companydefaulttimezone')->middleware('role:Super Manager');
Route::get('shift_time','ShiftTiming\shift_timeController@ShiftTime')->name('shift_time')->middleware('role:Super Manager');
/* END SUPER MANAGER */

/* HR MANAGER */
Route::get('/register_manager','RegisterEmployee\RegisterEmployeeController@RegisterManager')->name('register_manager')->middleware('role:HR Manager');
Route::post('/register_employee','RegisterEmployee\RegisterEmployeeController@Registered')->name('register_employee')->middleware('role:HR Manager');