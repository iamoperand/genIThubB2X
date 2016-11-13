<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Http\Request;
use Session; 
use DB;
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

        $request->session()->put('purpose_key','purpose');
        Session::set('purpose_key',$purpose);
        return view('info')->with('purpose_of_visit', $purpose);


    }
    public function postInfo(Request $request)
    {
    $purpose=$request->session()->get('purpose_key');
    $purpose_name=$request->input('name');
    $purpose_mobile=$request->input('num');
    DB::table('user')->insert(['purpose'=>$purpose,'name'=>$purpose_name,'phone_num'=>$purpose_mobile,'purpose'=>$purpose]);
    return view('enquiry'); 
        }
}
