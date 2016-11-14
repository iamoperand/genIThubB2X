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
Route::get('enquiry',function() {
  return view('enquiry');
});
Route::post('info',[
	'uses'=>'MainController@enquiry',
	'as'=> 'purpose'
  ]);

Route::get('info',function() {
	return view('info');
});


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

Route::post('designation',[
  'uses'=>'MainController@processInfo',
  'as'=>'processInfo'
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

Route::get('/admin/excel', 
[
  'as' => 'admin.info.excel',
  'uses' => 'MainController@infoExcel'
]);
});