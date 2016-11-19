<?php

namespace App\Http\Controllers;
use View;
use App\Models\User;
use Illuminate\Foundation\Bus\DispatchesJobs;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Http\Request;
use Session; 
use DB;
use Carbon\Carbon;
use Excel;
use PDO;
use Validator;


class MainController extends Controller
{
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

        Session::flash('success_user', 'You are successfully logged in');
       	return view('enquiry');
       }
       else
       {  

         Session::flash('failure', 'Invalid username/password combination. Please try again!');
         return view('login');
       }
    }

    public function enquiry(Request $request)
    {
      $this->validate($request, array(
          'purpose' => 'required',
          

        )); 
        $purpose=$request->input('purpose');

        
        Session::set('purpose_key',$purpose); 
        return view('info')->with('purpose_of_visit', $purpose);


    }
    public function postInfo(Request $request)
    {

   
   $validator = Validator::make($request->all(), [
             'name' => 'required|max:255',
          'num' => 'required|max:11|min:8',
        ]);

        if ($validator->fails()) {
          $purpose = Session::get('purpose_key');
            return view('info')->with('purpose_of_visit', $purpose);
        }else{



        }

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

    return view('infogen')->with('data', $data);
            
    }
            
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

        Session::flash('success_admin', 'You are successfully logged in');

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

        public function processInfo(Request $request)
        {
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
            return redirect('eelogin')->with('users',$users); 
            /* redirect('eelogin'); */

          }



        }

        public function erLogin(Request $request)
        {
        $this->validate($request, array(
          'er_name' => 'required|max:255',
          'er_pass' => 'required|max:255'

        )); 
        $name=$request->input('er_name');
        $pass=$request->input('er_pass');
    
       if($name=='del5.smartbar@b2x.com' && $pass=='123')
       {

        Session::flash('success_employer', 'You are successfully logged in');
        $employer_logged = true;
        Session::set('employer_logged',$employer_logged);

        $users = DB::table('User')->paginate(7);
        return redirect('employer')->with('users',$users);
        
        
       }
       else
       {  

         Session::flash('failure_employer', 'Invalid username/password combination. Please try again!');
         
         return view('erlogin');
       }
       


        }
        public function showEmployer(Request $request)
       {
       
       
        if(Session::has('admin_logged')){

        
          $users = DB::table('User')->paginate(7);
         
          return view('employer')->with('users',$users);  
                
        }else{
          
          return view('login');
        }

       
       
        }
        public function showEmployee(Request $request)
       {
       
       
        if(Session::has('admin_logged')){

          $users = DB::table('User')->where('e_flag','0')->paginate(7);
          return view('employee')->with('users',$users); 
        
        
        }else{
          
          return view('login');
        }

       
       
        }
        public function startQuery(Request $request)
        {
         $token=$request->input('token');
         $time=Carbon::now(); 
         $time_now=$time->toDateTimeString();
         DB::table('User')->where('token_num',$token)->update(['a_flag'=>'1','start_timestamp'=>$time_now]);
         return redirect()->back();
        }
        public function finishQuery(Request $request)
        {
         $token=$request->input('token');
          $time=Carbon::now(); 
         $time_now=$time->toDateTimeString();
         DB::table('user')->where('token_num',$token)->update(['e_flag'=>'1','end_timestamp'=>$time_now]);
         return redirect()->back();
        }
        public function infoExcel() {

if(Session::has('employer_logged')){
    // Execute the query used to retrieve the data. In this example
    // we're joining hypothetical users and payments tables, retrieving
    // the payments table's primary key, the user's first and last name, 
    // the user's e-mail address, the amount paid, and the payment
    // timestamp.
    
    $info = DB::table('User')->get();

    

    // Initialize the array which will be passed into the Excel
    // generator.

    $infoArray = []; 

    // Define the Excel spreadsheet headers
    $infoArray[] = ['token_num', 'purpose','name','phone_num','start_timestamp','end_timestamp','a_flag','e_flag'];

    // Convert each member of the returned collection into an array,
    // and append it to the payments array.

    foreach($info as $data){
    $infoArray[] = (array) $data;
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
/* Having problems with redirecting. Views not recovered when return view('erlogin') is used.*/
}
else{
  Session::flash('admin_notlogged', 'You are not logged in as an office personnel. Please login to continue!');
  
  return view('login');
/* Having problems with redirecting. Views not recovered when return view('login') is used.*/
}
}

public function getDisplay(Request $request)
{
$users = DB::table('User')->where('e_flag','0')->where('a_flag','1')->get();
return view('display')->with('users',$users); 
}
//employee login 
public function eeLogin(Request $request)
{

        $name=$request->input('ee_name');
        Session::set('ee_name',$name);
        $pass=$request->input('ee_pass');
    
       if($name=='admin' && $pass=='123')
       {

        Session::flash('success_employee', 'You are successfully logged in');
        $employee_logged = true;
        Session::set('employee_logged',$employee_logged);

        $users = DB::table('User')->paginate(7);
        return redirect('employee')->with('users',$users);
        
        
       }
       else
       {  

         Session::flash('failure_employee', 'Invalid username/password combination. Please try again!');
         
         return view('eelogin');
       }
}
//logout employee and redirect to employee login
 public function logoutEe()
 {
  Session::forget('ee_name');
  return redirect('eelogin');
 }

}