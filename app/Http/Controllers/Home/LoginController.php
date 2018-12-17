<?php

namespace App\Http\Controllers\Home;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //登陆视图
    public function login()
    {
        
	return view('home.login.login');
    }

    //验证码
    public function code()
    {
        imgCode();
    }

    //登陆操作
    public function store(Request $request)
    {
        $user = $request->except('_token');
        if (strtoupper($user['code']) != strtoupper(session('code')))
            return back()->withErrors('验证码错误');
        if ($user['username'] == '' || $user['pwd'] == '') return back()->withErrors('账号或密码错误');
        //exit(md5(md5('12345678')));
        //exit(bcrypt('12345678'));

//        $userinfo = DB::table('company_info')->get();
        //dd($userinfo);
        $userinfo = DB::table('admin')->where(['company_name'=> $user['username'], 'password'=>md5(md5($user['pwd']))])->first();
        if (!$userinfo) {
            return back()->withErrors( '账号或密码错误');
        }else{
            Session::put('user.id',$userinfo->admin_id);
            Session::put('user.name',$userinfo->company_name);
            if ($userinfo->check_status == 0) return Redirect::to('/sign/register');
            if ($userinfo->check_status == 1) return Redirect::to('/sign/register/SignAuditing');
            return Redirect::to('/index');
        }
    }

    //退出登录
    public function outlogin()
    {
        Session::forget('user');
        return Redirect::to('admin/index');
    }

}
