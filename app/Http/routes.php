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

Route::get('/', 'HomeController@index');

Route::get('weixin/bindinfo', ['middleware' => 'wxauth', 'uses' => 'WeChatController@getBindinfo']);
Route::controller('weixin', 'WeChatController');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function(){
    Route::get('/', function(){
		return redirect('admin/messages');
	});
    Route::resource('notices', 'NoticesController');
	Route::controller('messages', 'MessageController');
	Route::controller('students', 'StudentController');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
