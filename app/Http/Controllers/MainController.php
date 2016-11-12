<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Http\Request;
class MainController extends BaseController
{
    public function login(Request $request)
    {
           $name=$request->input('name');
           $pass=$request->input('pass');
    
       if($name=='dalip' && $pass=='123')
       {
       	return view('enquiry');
       }
       else
       {
         return view('login');
       }
    }
}
