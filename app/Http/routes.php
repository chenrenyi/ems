<?php

Route::get('/', 'HomeController@index');

Route::get('weixin/bindinfo', ['middleware' => 'wxauth', 'uses' => 'WeChatController@getBindinfo']);
Route::controller('weixin', 'WeChatController');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function(){
    Route::get('/', function(){
		return redirect('admin/messages');
	});
    Route::controller('notices', 'NoticesController');
	Route::controller('messages', 'MessageController');
	Route::controller('students', 'StudentController');
	Route::controller('classes', 'ClassesController');
	Route::controller('score', 'ScoreController');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
