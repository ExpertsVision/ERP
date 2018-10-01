<?php

namespace App\Http\Controllers\Admin;
use auth;
use App\User;
use Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterCompanyController extends Controller

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
     

    public function RegisterCompany()
{  
    return view('Admin.RegisterCompany');
}

     public function CompanyRegistered(Request $request)

{
        $validatedData = $request->validate([          
        'company_name'=> 'unique:users,name',
        'email'=> 'unique:users,email',           
        ]);

    $user = new User;
    $user->name = $request->input('company_name');
    $user->email = $request->input('email');
    $user->password = bcrypt("1234");
    $user->role = 'Super Manager';
    //$user->verifyToken = Str::random(8);
    $user->save();
    
    $thisUser= User::findOrFail($user->id);
    //dd($user->id);
    // $token = app('auth.password.broker')->createToken($thisUser);
    //sending Email
     Mail::send('Email.VerifyEmail', ["data" => $thisUser], function($message) use ($thisUser) {
                $message->from('noreply@shareride.com', 'EMS By Experts VISION');
                $message->to($thisUser->email)->subject('Congratulations! Your account is verified');
            });

    Session::flash('flash_message', 'Company Successfully Registered');
    return redirect()->route('register_company');

}

   //      public function TokenConfirmation($confirmation) 
   //  {

         
           
   //        }
   //      // $User = User::where('verifyToken', '=', $confirmation)->first();
   //      // $Useremail = $User->email;
   //      // if ($User) 
   //      // {
   //      //     User::where('verifyToken',$confirmation )->update(array('verifyToken' => NULL));
   //      //     return view('SuperManager.SetPassword');
           
   //      // }
   //      else 
   //      {
   //          echo "You can only set your passwoed for the first time if you forget your password please resert your password through password reset";
   //          //return Redirect::to('/std_preset')->with('flash_message', 'Link Expired Enter Your Email again !' );
   //      }
   //  } 



   //  public function PasswordIsSet(Request $request, $Useremail )
   // {

   //       dd($Useremail);

   //    // $validatedData = $request->validate([          
   //    //  'password' => 'required',
   //    //   'confirm_password' => 'same:password'        
   //    //   ]);
   //    //       //$password =Input::get('password');
   //    //       $user =  User::where('email', $Useremail )->update(array('password' => Hash::make($password)));
   //    //       Session::flash('flash_message','Password Succesfully Updated.');
   //    //       return redirect()->route('S_main');         
   //  }


}
