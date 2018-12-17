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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::group(['namespace'=>'Home','middleware' => ['web']],function () {
//登陆
    Route::get('/', 'LoginController@login');
    Route::post('/login/post', 'LoginController@store');
    Route::get('/code', 'LoginController@code');
    //用户注册
    Route::get('/sign','SignController@index');
    Route::post('/sign/store','SignController@store');
    Route::get('/sign/register','SignController@register');
    Route::get('/sign/smscode','SignController@SmsCode');
    Route::post('/sign/register/store','SignController@registerStore');
    Route::get('/sign/register/SignAuditing','SignController@SignAuditing');
});
Route::group(['namespace'=>'Home','middleware' => ['web','Check.login']],function (){

    //商品页
    Route::get('/index','IndexController@index');
    Route::post('/cart/store','IndexController@cart');
    Route::post('/cart/index','IndexController@cartIndex');

    Route::get('/cart/{goodsPrice?}','IndexController@cartView');
    Route::post('/cart','IndexController@cartAction');
    Route::get('/order-sub','IndexController@orderCommitView');


    //个人中心
    Route::any('/personal','PersonalController@index');
    Route::post('/personal-update','PersonalController@personalUpdate');
    Route::post('/passEdit','PersonalController@personalPassEdit');
    Route::get('/update-pass','PersonalController@changePass');
    Route::any('/order-record','PersonalController@personalOrderRecord');
    Route::get('/download','PersonalController@contractModuleDown');
    Route::get('/downs/{downs?}','PersonalController@down');
    Route::post('/classifyCode','PersonalController@checkCode');
    Route::post('/postCon','PersonalController@postContract');
//    Route::get('/sms/{phone}','PersonalController@sms');


    //退出登录
    Route::post('/outlogin', 'LoginController@outLogin');

});


