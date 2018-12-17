<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompanyInfo;
use App\Models\Admin;
use DB;

class AdminController extends Controller
{
    /**
     * 代理授权 普通用户的展示和检索
     * @author:yjy
     */
    public function  index(Request $request)
    {
        $request->flash();
        $condition=$request->input('company_name');
        if ($condition) {
            $list=CompanyInfo::search($condition);
        }else{
            $list=CompanyInfo::list();
        }
        return view('admin.admin.index',compact('list'));
    }

    /**
     * 授权页的展示
     * @author yjy
     */
    public function authorizat(Admin $admin)
    {
        $arr=Admin::searchAuthorize($admin->company_name)->toArray();
        $common_url='http://'.$_SERVER["HTTP_HOST"].'/';
        $arr[0]['second_record']=$common_url.$arr[0]['second_record'];
        $arr[0]['business_license']=$common_url.$arr[0]['business_license'];
        $arr[0]['corporate_identity_card_info']=$common_url.$arr[0]['corporate_identity_card_info'];
        $arr[0]['network_sales_pic']=$common_url.$arr[0]['network_sales_pic'];
        return view('admin.admin.authorizate',compact('arr'));
    }
    /**
     * 授权失败视图
     * @author yjy
     */
    public function checkFail($adminId){
        return view('admin.admin.failReason',['id'=>$adminId]);
    }

    /**
     * 授权失败原因提交操作
     * @author yjy
     */
    public function failReason(Request $request)
    {
//        dd($request->all()); //获取表单传过来的值
        $description=$request->input('description');
        $id=$request->input('id');
        if ($description && $id){
            $admin=Admin::find($id);
            $admin->fail_desc=$description;
            //同时改变审核状态
            $admin->check_status = 3;
            $admin->save();
            return redirect('admin/power/admin/index');
        }else{
            return redirect('admin/power/admin/checkFail');
        }
    }
    /**
     * @author yjy
     * 审核通过修改数据库的审核状态字段
     * 修改admin表的审核状态 默认为0 0为未提交审核资料 1为未审核 2为审核成功 3为审核失败
     */
    public function checkSuccess(admin $admin)
    {
        $admin->check_status = 2 ;
        $admin->save();
        return redirect('admin/power/admin/index');
    }
}
