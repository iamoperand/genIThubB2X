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
Route::get('infogen',function() {
	return view('infogen');
})


});