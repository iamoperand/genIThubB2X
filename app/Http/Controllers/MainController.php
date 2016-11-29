<?php

namespace App\Http\Controllers;
use View;
use App\Models\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session; 
use DB;
use Carbon\Carbon;
use Excel;
use PDO;
use App\Models\Employee;
use Validator;
use Mail;


class MainController extends Controller
{
    
    //Logic for User Login
    public function login(Request $request)
    {
        $this->validate($request, array(
          'name' => 'required|max:255',
          'pass' => 'required|max:255'

        )); 


           $name=$request->input('name');
           $pass=$request->input('pass');
      

       if($name=='avionicuser@gmail.com' && $pass=='123')
       {
        Session::set('user_logged',true);
        Session::flash('success_user', 'You are successfully logged in!');
       	return view('enquiry');
       }
       else
       {  

         Session::flash('failure', 'Invalid username/password combination. Please try again!');
         return view('login');
       }
    }

    
    //Simple get view for enquiry.blade.php
    public function getEnquiry(Request $request){

      if(Session::has('user_logged'))
      {
        return view('enquiry');
      }
      else
      {
        Session::flash('failure', 'You are not logged in as a user. Please login to continue!');
        return view('login');
      }
    }


    //Logic for choice selection in enquiry.blade.php
    public function enquiry(Request $request)
    {
      $this->validate($request, array(
          'purpose' => 'required',
          

        )); 
        $purpose=$request->input('purpose');

        
        Session::set('purpose_key',$purpose); 
        return view('info')->with('purpose_of_visit', $purpose);


    }

    public function getInfo(Request $request){
        
        if(Session::has('user_logged'))
        {
                
          if(Session::has('purpose_key'))
          {
                
            $purpose = Session::get('purpose_key');
            return view('info')->with('purpose_of_visit', $purpose);
          }
        
          else
          {

          Session::flash('failure', 'Please choose the purpose of your visit, to continue!');
          return view('enquiry');

          }
        }          

      else
      {

      Session::flash('failure', 'You are not logged in as a user. Please login to continue!');
      return view('login');
      
      }
    }
        
        //Main logic for getting user info
    public function postInfo(Request $request){

      if(Session::has('user_logged')){
            
         
         $validator = Validator::make($request->all(), [
                   'name' => 'required|max:255',
                'num' => 'required|max:11|min:8',
              ]);

        if ($validator->fails()) {
          $purpose = Session::get('purpose_key');
            return view('info')->with('purpose_of_visit', $purpose);
        }else{
          
          $purpose=Session::get('purpose_key');
          $purpose_name=$request->input('name');
          $purpose_mobile=$request->input('num');
          $time=Carbon::now(); 
          $time_now=$time->toDateTimeString();
          DB::table('User')->insert(['purpose'=>$purpose,'name'=>$purpose_name,'phone_num'=>$purpose_mobile,'purpose'=>$purpose,'start_timestamp'=>$time_now]);
          $info_data = [];
          $info_data['purpose'] = $purpose;
          $info_data['name'] = $purpose_name;
          $info_data['mobile'] = $purpose_mobile;

          
          $data = DB::table('User')
                  ->where('name', '=', $purpose_name)
                  ->where('phone_num', '=', $purpose_mobile)
                  ->where('start_timestamp', '=', $time_now)
                  ->get();

          return view('infogen')->with('data', $data);}
      }
      else
      {

        Session::flash('failure', 'You are not logged in as a user. Please login to continue!');
        return view('login');
      }
                  
    }

    //Logic for office login
    public function loginAdmin(Request $request)
    {
        
      $this->validate($request, array(
          'name' => 'required|max:255',
          'pass' => 'required|max:255'

        )); 

       $name=$request->input('name');
       $pass=$request->input('pass');
    
       if($name=='avionicsolutions@gmail.com' && $pass=='123')
       {

        Session::flash('success_admin', 'You are successfully logged in!');

        $logged = true;
        Session::set('admin_logged',$logged);

        return view('admin');
       }
       else
       {  

         Session::flash('failure', 'Invalid username/password combination. Please try again!');
         
         return view('login');
       }
       
       
    }
    
    //Simple get view for admin.blade.php
    public function getAdmin(Request $request){

      if(Session::has('admin_logged'))
      {
        Session::flash('success_admin', ' You are successfully logged in!');

        return view('admin');
      }
      else{
        Session::flash('failure', 'You are not logged in as an office personnel. Please login to continue!');
        return view('login');

      }

    }     
    
    //Logic for the choice of employee and employer on admin.blade.php
    public function processInfo(Request $request){
      $this->validate($request, array(
      'choice' => 'required',
      )); 
      $choice = $request->input('choice');
      
      if($choice=='employer'){
        $users = DB::table('User')->paginate(7);  
        Session::set('designation',$choice);
        return redirect('erlogin');
      }
      else if($choice=='employee'){
        $users = DB::table('User')->where('e_flag','0')->paginate(7);
        Session::set('designation',$choice);
        return redirect('eelogin'); 
        /* redirect('eelogin'); */

      }



    }
    
    //Simple get view for employer form
    public function geterlogin(Request $request){


      if(Session::has('admin_logged'))
      {
        if(Session::get('designation')=='employer'){
         
          return view('erlogin');
        }
        else if(Session::get('designation')=='employee'){
          Session::flash('logged_as', 'You have choosen employee as your designation!');          
          return view('eelogin');

        }else{

          Session::flash('failure', 'Please choose your designation to continue!');
          return view('admin');

        }
      }
      else{
      Session::flash('failure', 'You are not logged in as an office personnel. Please login to continue!');
      return view('login');

      }



    }
    
    //Simple get view for employee login form
    public function geteelogin(Request $request){


      if(Session::has('admin_logged'))
      {
        if(Session::get('designation')=='employee'){
         
        return view('eelogin');
        }
        else if(Session::get('designation')=='employer'){
          Session::flash('logged_as', 'You have choosen employer as your designation!');          
          return view('erlogin');

        }else{

          Session::flash('failure', 'Please choose your designation to continue!');
          return view('admin');

        }
      }
      else{
      Session::flash('failure', 'You are not logged in as an office personnel. Please login to continue!');
      return view('login');

      }



    }
    

    //Logic for employer login
    public function erLogin(Request $request){
        $this->validate($request, array(
          'er_name' => 'required|max:255',
          'er_pass' => 'required|max:255'
        )); 
        
        $name=$request->input('er_name');
        $pass=$request->input('er_pass');
        

        $employer=DB::table('Employer')->where('username',$name)->where('password',$pass)->get();
        
       if(count($employer))
       {
        $employer_logged = true;
        Session::set('employer_logged',$employer_logged);
        Session::set('er_name',$name);
        
        $users = DB::table('User')->paginate(7);
        return redirect('employer')->with('users',$users)->with('info','You are successfully logged in!');
        
        
       }
       else
       {  
        Session::flash('failure_employer', 'Invalid username/password combination. Please try again!');
         
        return view('erlogin');
         
       }
       

    }
        
    //Return employer.blade.php
    public function showEmployer(Request $request)
    { 
       
       
      if(Session::has('admin_logged')){

        if(Session::has('employer_logged')){
          $users = DB::table('P_Users')->paginate(7);
         
          return view('employer')->with('users',$users);  
        }
        else
        {

        Session::flash('employer_notlogged', 'You are not logged in as an Employer. Please login to continue!');

        return view('erlogin');
        }
      }
      
      else
      {
          
        Session::flash('admin_notlogged', 'You are not logged in as an office personnel. Please login to continue!');
        return view('login');
      }

       
       
    }
      
    //Return employee.blade.php
    public function showEmployee(Request $request)
    {
       
       
      if(Session::has('admin_logged')){
          if(Session::has('employee_logged')){
            $users = DB::table('User')->where('e_flag','0')->paginate(7);
            return view('employee')->with('users',$users); 
            
          }else{
            Session::flash('employee_notlogged', 'You are not logged in as an Employee. Please login to continue!');

            return view('eelogin');
           }
          
        
      }
      else
      {
          Session::flash('admin_notlogged', 'You are not logged in as an office personnel. Please login to continue!');
          return view('login');
      }

       
       
    }
    
    //Logic for updating start time in database    
    public function startQuery(Request $request)
    {
         $e_name=$request->input('e_name');
         $token=$request->input('token');
         $time=Carbon::now(); 
         $time_now=$time->toDateTimeString();
         DB::table('User')->where('token_num',$token)->update(['e_name'=>$e_name,'a_flag'=>'1','start_timestamp'=>$time_now]);
         return redirect()->back();
    }

    //Logic for updating end time in database
    public function finishQuery(Request $request)
    {
         $token=$request->input('token');
         $time=Carbon::now(); 
         $time_now=$time->toDateTimeString();
         DB::table('User')->where('token_num',$token)->update(['e_flag'=>'1','end_timestamp'=>$time_now]);
         return redirect()->back();
    }
    
    
    
    //Logic fpr generating excel sheet within the specific timeframe
    public function infoExcel(Request $request) {

    if(Session::has('employer_logged')){
        // Execute the query used to retrieve the data. In this example
        // we're joining hypothetical users and payments tables, retrieving
        // the payments table's primary key, the user's first and last name, 
        // the user's e-mail address, the amount paid, and the payment
        // timestamp.

        $start= $request->input('start');
        $finish=$request->input('finish');
        $users=DB::table('P_Users')->where('start_timestamp', '>' , $start.'%')->orWhere('start_timestamp', 'like', $start.'%')->get();
        $users1=DB::table('P_Users')->where('start_timestamp', '<', $finish.'%')->orWhere('start_timestamp', 'like', $finish.'%')->get();

        
    
        $count=0;
        $totuser=[];
        foreach($users as $user)
        {
         foreach($users1 as $user1)
         {
           if($user==$user1)
             {
              $totuser[$count]=$user;
              $count++;
             }
             
            
         } 
        }
    
            // Initialize the array which will be passed into the Excel
            // generator.

            $infoArray = []; 

            // Define the Excel spreadsheet headers
            $infoArray[] = ['s_no', 'token_num', 'purpose','name','phone_num','start_timestamp','end_timestamp','e_name','a_flag','e_flag'];

            // Convert each member of the returned collection into an array,
            // and append it to the payments array.

            

             for($i=1;$i<=$count;$i++)
             {
              $infoArray[$i]=(array) $totuser[$i-1];
              
             }

            // Generate and return the spreadsheet
            Excel::create('info', function($excel) use ($infoArray) {

                // Set the spreadsheet title, creator, and description
                $excel->setTitle('Info');
                $excel->setCreator('Laravel')->setCompany('B2X Rohini');
                $excel->setDescription('Customer Information File');

                // Build the spreadsheet, passing in the payments array
                $excel->sheet('sheet1', function($sheet) use ($infoArray) {
                    $sheet->fromArray($infoArray, null, 'A1', false, false);
                });

            })->export('xls');
            
        }
      else if(Session::has('admin_logged'))
      {

      Session::flash('employer_notlogged', 'You are not logged in as an Employer. Please login to continue!');

      return view('erlogin');
      //Having problems with redirecting. Views not recovered when return view('erlogin') is used.
      }
      else{
        Session::flash('admin_notlogged', 'You are not logged in as an office personnel. Please login to continue!');
        
        return view('login');

       //Having problems with redirecting. Views not recovered when return view('login') is used.
       
      }
    } 
    //Simple get view for display.blade.php
    public function getDisplay(Request $request)
    {
      $users = DB::table('User')->where('e_flag','0')->where('a_flag','1')->get();
      return view('display')->with('users',$users); 
    }
    
    //Employee Login 
    public function eeLogin(Request $request)
    {
        $this->validate($request, array(
          'ee_name' => 'required|max:255',
          'ee_pass' => 'required|max:255'

        )); 
        $name=$request->input('ee_name');
        
        $password=$request->input('ee_pass');
         
        $employee=Employee::where('username',$name)->where('password',$password)->get();
        
       if(count($employee))
       {
        
      
          Session::flash('success_employee', 'You are successfully logged in!');
          $employee_logged = true;
          Session::set('employee_logged',$employee_logged);
          Session::set('ee_name',$name);
          
          $users = DB::table('User')->paginate(7);
          return redirect('employee')->with('users',$users);
          
          
       }
       else
       {  
         
         
         Session::flash('failure_employee', 'Invalid username/password combination. Please try again!');
         
         return view('eelogin');
         
       }
       
    }
    
     //Logout employee and redirect to employee login
     public function logoutEe()
     {
      Session::forget('ee_name');
      Session::forget('employee_logged');
      return redirect('eelogin');
     }
     
     //Logic for Employer logout
     public function logoutEr()
     {
      Session::forget('er_name');
      Session::forget('employer_logged');
      return redirect('erlogin');
     }
     
     // add new employee
     public function addEmployee(Request $request)
     {
       $this->validate($request,[
       'name' => 'required|max:255',
       'password' => 'required|max:255',
       ]);
       $password=$request->input('password');
       
       $name=$request->input('name');
       $time=Carbon::now(); 
       $time_now=$time->toDateTimeString();
       Employee::create(['username'=>$name,'password'=>$password]);
       return redirect('show-employee')->with('info','Account created successfully!!');
     
     }
     
     //Show Employee to Employer
     public function showEmployeeToEr()
     {

      
      if(Session::has('admin_logged')){

            if(Session::has('employer_logged')){
            
            $employees=Employee::get();
            return view('showtoer')->with('employees',$employees);
                
            }
            else
            {

            Session::flash('employer_notlogged', 'You are not logged in as an Employer. Please login to continue!');

            return view('erlogin');
                    }
      }
      else
      {
          
        Session::flash('admin_notlogged', 'You are not logged in as an office personnel. Please login to continue!');
        return view('login');
      }
      
     }

     //Delete Employee
     public function deleteEe(Request $request)
     {
      $name=$request->input('ename');
      Employee::where('username',$name)->delete();

      return redirect()->back()->with('info','Account deleted successfully!!');

     }

     //Change Employee Password
     public function chPassword(Request $request)
     {

        $this->validate($request,[
         'password' => 'required|max:255',
         'confirmpass' => 'required|max:255',
         
         ]);
          $name=$request->input('ename');
        $password=$request->input('password'); //verify new and confirm new password
        $confirmpass = $request->input('confirmpass'); 
       if($password===$confirmpass){
        
        Employee::where('username',$name)->update(['password'=>$password]);

        return redirect()->back()->with('info','Password changed successfully!!');
       }
       else
       {
        return redirect()->back()->with('info','Password does not match. Please try again!');
        
       }

       
     }
     
     //Logic for sending OTP TO EMPLOYER MAIL
     public function sendOtp()
      {
        $pass='';
        for($i=0;$i<6;$i++)
        {
          $passotp=rand(0,9);
          $pass=$pass.$passotp;
        }
        $data=array('pass'=>$pass);
        Mail::send('otprequest',$data,function($m) use($data){
          $m->to('narora200@gmail.com')->subject('OTP Request (Avionic Solutions)');
         });
        Session::set('otpsent',$pass);
        Session::flash('otp_sent', 'A One-Time Password has been sent to your E-Mail Successfully!');
        return view('chpasser');
      }

       //Logic for validating OTP 
       public function validateOtp(Request $request)
       {
        $this->validate($request,[
         'password' => 'required|max:255',
         'otp' => 'required|max:6|min:6',
         
         ]);
        $password=$request->input('password');
        $otporg=$request->input('orgotp');
        $name=$request->input('name');
        if($otporg==$request->input('otp')){
        
          DB::table('Employer')->where('username',$name)->update(['password'=>$password]);
          $data=array(
            'name' => $name,
            'password'=> $password);
           Mail::send('passwordch',$data,function($m) use($data){
            $m->to('narora200@gmail.com')->subject('Password Changed (Avionic Solutions)');
           });
           Session::forget('otpsent'); 
          $employees=Employee::get();
          
          return redirect('show-employee')->with('employees',$employees)->with('info','Password changed successfully!!');
        }
        else
        {
        return redirect()->back()->with('info','OTP does not match. Please try again!');
        
        }
       }
       
       //Logic for sending OTP Again
       public function sendOtpAgain()
       {
        Session::forget('otpsent');
        return app('App\Http\Controllers\MainController')->sendOtp();
       }
       

       //Logic for get view chpasser.blade.php
       public function getchPassEr(){

        if(Session::has('admin_logged')){

            if(Session::has('employer_logged')){
                
            return view('chpasser');


            }
            else
            {
             Session::flash('employer_notlogged', 'You are not logged in as an Employer. Please login to continue!');

            return view('erlogin');
            }

        }
        else
        {
            
          Session::flash('admin_notlogged', 'You are not logged in as an office personnel. Please login to continue!');
          return view('login');
        }



       }




}