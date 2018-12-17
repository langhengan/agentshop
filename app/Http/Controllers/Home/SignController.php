<?php

namespace App\Http\Controllers\Home;

use App\Http\Common\SmsRest;
use App\Models\Admin;
use App\Models\ApplyInfo;
use App\Models\CompanyInfo;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class SignController extends Controller
{
    /**
     * Notes:用户注册
     * Author:sjzlai
     */
    public function index()
    {
        return view('home.sign.sign-index');
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = $this->validateRegister($request->input());
            if ($validator->fails()) {
                return back()->withErrors('message',$validator)->withInput();
            }
             $user = new Admin();
             $user->company_name = $request->company_name;
             $user->password = md5(md5($request->password));
             $user->realname = $request->realname;
             $user->phone   = $request->phone;
             $user->created_at = time();
             $user->updated_at = time();
             $user->level = 0;
             $user->register = 0;
             if($user->save()){
                 return redirect('/sign/register')->with('success', '注册成功！');
             }else{
                 return back()->with('error', '注册失败！')->withInput();
             }
         }
         return view('home.sign.sign-index');

    }

    /**
     * Notes:账号验证
     * Author:sjzlai
     */
    protected function validateRegister(array $data)
    {
        return Validator::make($data, [
            'company_name' => 'required|alpha_num|max:255',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8|'
        ], [
            'required' => ':attribute 为必填项',
            'min' => ':attribute 长度不符合要求',
            'confirmed' => '两次输入的密码不一致',
            'alpha_num' => ':attribute 必须为公司名称'
        ], [
            'company_name' => '用户名',
            'password' => '密码',
            'password_confirmation' => '确认密码'
        ]);
    }

    public function SmsCode()
    {
        $phone = $_POST['phone'];
        $smsCode =new SmsRest();
        $data = $smsCode->sendTemplateSMS($phone,array(),1);
        return Response([
            'code' =>'1' ,
            'message' =>'message' ,
            'data' => $data
        ]);
    }
    /**
     * Notes:资料审核视图
     * Author:sjzlai
     */
    public function register()
    {
        return view('home.sign.sign-one');
    }

    public function registerStore(Request $request)
    {
        $data = $request->except('_token','erlei','wangluo','yingye','faren');

        $adminId = session('user.id');
        $erlei = $request->file('erlei');
        $wangluo = $request->file('wangluo');
        $yingye = $request->file('yingye');
        $faren = $request->file('faren');
        $apply['second_record'] = pic($erlei,'uploads/erlei');
        $apply['network_sales_pic'] = pic($wangluo,'uploads/wangluo');
        $apply['business_license'] = pic($yingye,'uploads/yingye');
        $apply['corporate_identity_card_info'] = pic($faren,'uploads/faren');
        $apply['admin_id'] = $adminId;
        $apply['status'] = 1;
        $applyRes = ApplyInfo::insertGetId($apply);  //添加公司资质信息
        $admininfo = Admin::find($adminId); //更新用户信息审核状态,代理级别,推荐人
        $admininfo->level = $data['level'];
        $admininfo->referee = $data['referee'];
        $admininfo->check_status =0;
        $admininfo->save();
        //添加公司地址等信息

        $companyinfo = array(
            'company_address' =>$data ['company_area'],
            'province'  => $data['province'],
            'city'      => $data['city'],
            'status'    => 1,
            'user_id'   => $adminId,
            'agent_apply_info_id' => $applyRes
        );
        $company_info = CompanyInfo::insert($companyinfo);
        if ($company_info){
            return Redirect::to('/sign/register/SignAuditing');
        }else{
            return Redirect::to('/sign/register');
        }

    }

    public function SignAuditing()
    {
        return view('home.sign.sign-two');
    }


}
