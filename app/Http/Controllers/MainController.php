<?php

namespace App\Http\Controllers;
use View;
use App\Models\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Http\Request;
use Session; 
use DB;
use Carbon\Carbon;
class MainController extends BaseController
{
    public function login(Request $request)
    {
           $name=$request->input('name');
           $pass=$request->input('pass');
    
       if($name=='dalip' && $pass=='123')
       {

        Session::flash('success', 'You are successfully logged in');
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

        $purpose=$request->input('purpose');

        
        Session::set('purpose_key',$purpose); 
        return view('info')->with('purpose_of_visit', $purpose);


    }
    public function postInfo(Request $request)
    {

    $purpose=Session::get('purpose_key');
    $purpose_name=$request->input('name');
    $purpose_mobile=$request->input('num');
    $time=Carbon::now(); 
    $time_now=$time->toDateTimeString();
    DB::table('user')->insert(['purpose'=>$purpose,'name'=>$purpose_name,'phone_num'=>$purpose_mobile,'purpose'=>$purpose,'start_timestamp'=>$time_now]);
    $info_data = [];
    $info_data['purpose'] = $purpose;
    $info_data['name'] = $purpose_name;
    $info_data['mobile'] = $purpose_mobile;

    
    $data = DB::table('user')
            ->where('name', '=', $purpose_name)
            ->where('phone_num', '=', $purpose_mobile)
            ->get();

    return view('infogen')->with('data', $data);
            
    }
            
    public function loginAdmin(Request $request)
    {
       $name=$request->input('name');
       $pass=$request->input('pass');
    
       if($name=='dalip' && $pass=='123')
       {

        Session::flash('success', 'You are successfully logged in');

        $logged = true;
        Session::set('admin_logged',$logged);
        $users = DB::table('user')->paginate(5);
        
        return view('admin', ['users' => $users]);

       }
       else
       {  

         Session::flash('failure', 'Invalid username/password combination. Please try again!');
         
         return view('login');
       }
       
       
        }
        public function showAdmin(Request $request)
       {
       
       
        if(Session::has('admin_logged')){
        $users = DB::table('user')->paginate(5);
        if(Route::has('admin'))
        {
        return view('admin')->with('users',$users);  
        }
        else if(Route::has('employee'))
        {
        return view('employee')->with('users',$users);
        }
        
        }else{
          
          return view('login');
        }
       
       
        }
}