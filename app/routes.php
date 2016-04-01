<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Route::get('/', function()
//{
//	return View::make('hello');
//});

//流程首页
Route::any('/',['as'=>'/','uses'=>'IndexController@index']);

//ajax后台请求数据库内容
Route::any('day_process_ajax',['as'=>'day_process_ajax','uses'=>'IndexController@day_process_ajax']);

//自动生成今日dayprocess
Route::any('create_day_process',['uses'=>'AutoController@create_day_process']);


//操作者登录
Route::group(['prefix'=>'login'],function(){
    Route::any('/',['as'=>'login','uses'=>'LoginController@login']);
    Route::any('do_login',['as'=>'login.do_login','uses'=>'LoginController@do_login']);
});

//操作点击页面
Route::group(['before'=>'front_login'],function(){
    Route::any('operate',['as'=>'operate','uses'=>'IndexController@operate']);
    Route::any('do_this_operate',['as'=>'do_this_operate','uses'=>'IndexController@do_this_operate']);
});


// 后台
Route::group(['prefix' => 'admin','before'=>'auth'], function(){
    Route::any('/',['as'=>'admin.dashboard','uses'=>'AdminController@index']);
    Route::any('system_list',['as'=>'admin.system_list','uses'=>'AdminController@system_list']);
    Route::any('operate_list',['as'=>'admin.operate_list','uses'=>'AdminController@operate_list']);
    Route::any('operate_user',['as'=>'admin.operate_user','uses'=>'AdminController@operate_user']);
    Route::any('add_user',['as'=>'admin.add_user','uses'=>'AdminController@add_user']);
    Route::any('do_register',['as'=>'admin.do_register','uses'=>'AdminController@do_register']);
    Route::any('day_process',['as'=>'admin.day_process','uses'=>'AdminController@day_process']);
});

//后台用户登录,退出
Route::group(['prefix' => 'admin'], function(){
    Route::any('login',['as'=>'admin.login','uses'=>'AdminController@login']);
    Route::any('do_login',['as'=>'admin.do_login','uses'=>'AdminController@do_login']);
    Route::any('logout',['as'=>'admin.logout','uses'=>'AdminController@logout']);
});


//微信
Route::group(['prefix'=>'wx'],function(){
    Route::any('create_menu',['as'=>'wx.menu','uses'=>'WxController@create_menu']);
    Route::any('responseMsg',['as'=>'wx.responseMsg','uses'=>'WxController@responseMsg']);
});

//test
Route::any('test',['uses'=>'TestController@test']);
Route::any('test_view',function(){
    return View::make('emails.test');
});
