<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login','AuthController@login');
Route::post('/login/post','AuthController@loginPost');

Route::middleware('admin.auth')->group(function(){
    Route::get('/','HomeController@home');
    Route::get('/home','HomeController@home');
    Route::get('/logout','AuthController@logout');
    Route::prefix('/power')->group(function(){
        //用户的路由
        Route::group(['prefix' => 'user','middleware' => ['permission:adminAccount']],function () {
            Route::any('/index','UserController@index');
            Route::get('/create/{user?}','UserController@create');
            Route::post('/store','UserController@store');
            Route::get('/delete/{user?}','UserController@userDelete');
        });
        //角色路由
        Route::group(['prefix' => 'role','middleware' => ['permission:roleAdmin']],function () {
            Route::any('/index','RoleController@index');
            Route::get('/create/{role?}','RoleController@create');
            Route::post('/store','RoleController@store');
            Route::get('/delete/{role?}','RoleController@roleDelete');
        });
        //权限路由
        Route::group(['prefix' => 'permission','middleware' => ['permission:permissions']],function () {
            Route::any('/index','PermissionController@index');
            Route::get('/create/{permission?}','PermissionController@create');
            Route::post('/store','PermissionController@store');
            Route::get('/delete/{permission?}','PermissionController@permissionDelete');
        });
        Route::group(['prefix' => 'admin','middleware' => ['permission:ordinaryUser']],function (){
            Route::any('/index','AdminController@index');
            Route::get('/authorizat/{admin?}','AdminController@authorizat');
            Route::get('/checkFail/{admin?}','AdminController@checkFail');//审核失败的视图
            Route::post('/store','AdminController@failReason'); //审核失败的提交操作
            Route::get('/success/{admin}','AdminController@checkSuccess');//审核成功的操作
        });
        Route::group(['prefix' => 'order','middleware'=>['permission:order']],function (){
            Route::any('/index','OrderController@index');
            Route::get('/edit/{order?}','OrderController@editView');
            Route::post('/order_ed','OrderController@editAction');
            Route::get('/delete/{order_info?}','OrderController@del');
            Route::get('/orderPay/{order?}','OrderController@orderIsPay');
            Route::post('/pay_edit','OrderController@orderPayed');
        });
        Route::group(['prefix'=>'boill','middleware'=>['permission:boill']],function (){
            Route::any('/index','BoillController@index');
        });
        Route::group(['prefix'=>'goods','middleware' =>['permission:goods']],function (){
            Route::any('/index','GoodsController@index');
            Route::get('/create/{goods?}','GoodsController@create');
            Route::post('/store','GoodsController@storeAction');
            Route::get('/del/{goods?}','GoodsController@delGoods');
            Route::get('/levelPrice','GoodsController@levelPrice');
        });
        Route::group(['prefix'=>'allModule','middleware'=>['permission:allModule']],function (){
            Route::any('/index','ModuleController@index');
            Route::get('/proto-module-common/{module?}','ModuleController@moduleCommon');
            Route::get('/proto-module/{module?}','ModuleController@moduleContrate');
            Route::get('/add/{module?}','ModuleController@addModule');
            Route::post('/store','ModuleController@addAction');
            Route::get('/del/{module?}','ModuleController@delModule');


       });
    });

    Route::group(['prefix' => 'log','middleware' => ['permission:adminLoginLog']],function () {
        Route::get('/back/login','LogController@backLogin');
    });

});
