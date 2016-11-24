<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::group(['middleware' => ['web']], function(){

Route::get('/', function () {
    return view('login');
});
Route::post('enquiry',[
	'uses'=>'MainController@login',
	'as'=> 'submit'
  ]);
Route::get('enquiry','MainController@getEnquiry');
Route::post('info',[
	'uses'=>'MainController@enquiry',
	'as'=> 'purpose'
  ]);

Route::get('info','MainController@getInfo');


Route::get('infogen', function(){
	return view('infogen');
});

Route::post('infogen',[
     'uses'=>'MainController@postInfo',
     'as'=> 'infoSubmit'
	]);
Route::post('admin',[
  'uses'=>'MainController@loginAdmin',
   'as'=>'adminLogin'
	]);
Route::get('admin', 'MainController@getAdmin');
Route::post('designation',[
  'uses'=>'MainController@processInfo',
  'as'=>'processInfo'
  ]);
Route::get('erlogin','MainController@geterlogin');
Route::get('eelogin','MainController@geteelogin');
Route::get('eelogin',function(){
  return view('eelogin');
});
Route::post('employer',[
  'uses'=>'MainController@erLogin',
  'as'=>'erLogin'
  ]);
Route::get('employer','MainController@showEmployer');

Route::get('employee','MainController@showEmployee');

Route::post('start-query',[
 'uses' =>'MainController@startQuery',
  'as' => 'startQuery'
 ]);
Route::post('complete-query',[
 'uses' =>'MainController@finishQuery',
  'as' => 'finishQuery'
	]);

Route::get('export', function(){
  return view('export');
});

Route::post('excel', [
 'uses' =>'MainController@infoExcel',
  'as' => 'admin.info.excel'
  ]);
 //get date range for excel sheet
Route::post('excelsheet-date',[
   'uses' => 'MainController@getDate',
   'as'=> 'excelDate'
  ]);

Route::get('display','MainController@getDisplay');

 //Employee login 
Route::post('employee',[
  'uses'=>'MainController@eeLogin',
  'as'=>'eeLogin'
  ]);
 //employee logout
Route::get('logoutEe',[
  'uses'=>'MainController@logoutEe',
  'as'=> 'eeLogout'
  ]);
 //employer logout
Route::get('logoutEr',[
   'uses'=>'MainController@logoutEr',
   'as' => 'erLogout'
  ]);
  //add new employee
 Route::post('add-employee',[
  'uses'=>'MainController@addEmployee',
  'as'=> 'addEmployee'
  ]);
  //show employee to employeer
 Route::get('show-employee',[
 'uses'=> 'MainController@showEmployeeToEr',
 'as' =>'showEmployee'
  ]);
 //delete employee
 Route::post('delete-employee',[
  'uses'=>'MainController@deleteEe',
  'as'=>'deleteEe'
  ]);
 //changes password
 Route::post('change-pass',[
  'uses'=>'MainController@chPassword',
  'as'=>'chPassword'
  ]);
 //change employer password
 Route::post('change-employer-pass',[
  'uses' => 'MainController@chErPassword',
  'as' => 'changeErPassword'
  ]);


Route::get('chpasser',function() {
  return view('chpasser');
});
//send otp for change employer pass
Route::post('send-otp',[
 'uses'=>'MainController@sendOtp',
  'as'=>'sendOtp'
  ]);
Route::post('validate-otp',[
  'uses'=>'MainController@validateOtp',
  'as' => 'verifyOtp'
  ]);
Route::get('sendotpagain','MainController@sendOtpAgain');

});