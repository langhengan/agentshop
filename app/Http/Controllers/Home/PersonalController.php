<?php

namespace App\Http\Controllers\Home;

use App\Models\Admin;
use App\Models\CompanyInfo;
use App\Models\ModuleCategry;
use App\Models\OrderInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Common\SmsRest;

class PersonalController extends Controller
{
    /*
     * @author yjy
     * 个人中心首页 视图
     * */
    public function index()
    {
        $where_id=session('user.id');
        if ($where_id){
            $personalArr=Admin::personalInfo($where_id);
            return view('home.personal.index',compact('personalArr'));
        }else{
            return redirect('/');
        }
    }



    /*
     * @author yjy
     * 个人中心里面公司信息的修改
     * realname phone referee 公司地址在另一张表
     * */
    public function personalUpdate(Request $request)
    {
        $id = session('user.id');
        $adminId=$request->input('id');
        if ($id && $adminId){
            $adminModel=new Admin();
            $adminOne=$adminModel->where('admin_id',$id)->first();
            $adminOne->realname=$request->input('realname');
            $adminOne->phone=$request->input('phone');
            $adminOne->referee=$request->input('referee');
            $adminOne->save();
            //修改公司地址
            $componyModel=new CompanyInfo();
            $componyUpdate=$componyModel->where('user_id',$id)->first();
            $componyUpdate->company_address = $request->input('company_address');
            $componyUpdate->save();
            return redirect('/personal');
        }else{
            return redirect('/personal-update');
        }
    }


    //密码修改
    /*
     * @author yjy
     * 用session存的数据取出当前用户对应的手机号
     * */
    public function changePass()
    {
        $where_id=session('user.id');
        $adminModel=Admin::find($where_id);
        return view('home.personal.change-pass',compact('adminModel'));
    }

    /*
     * 密码的修改操作
     * */
    public function personalPassEdit(Request $request)
    {

        $oldPass=$request->input('password');
        $newPass1=$request->input('passwordnew1');
        $newPass2=$request->input('passwordnew2');
        if (!empty($oldPass)){
            $oldPassAfter=md5(md5($oldPass));
            $whereId=session('user.id');
            $password=Admin::where('admin_id',$whereId)->value('password');
            if ($oldPassAfter==$password && $newPass1==$newPass2){
                $bool=Admin::where('admin_id',$whereId)->update(['password'=>md5(md5($newPass1))]);
                if ($bool==true){
                    session()->flush();
                    return redirect('/');
                }else{
                    return redirect('/update-pass');
                }
            }
        }
    }

    /*
     * @author yjy
     * 我的订单
     * 根据用户的id获取订单表此人的订单信息
     * */
    public function personalOrderRecord(Request $request)
    {
        $where_id=session('user.id');
        $orderNumber=$request->input('order_number');
//        dd($orderNumber);
        if ($where_id && $orderNumber==null){
           $order=OrderInfo::order($where_id);
           return view('home.personal.order-record',compact('order'));
        }elseif ($where_id && $orderNumber){
            $order=OrderInfo::where('order_num',$orderNumber)->get();
//            dd($order);
            return view('home.personal.order-record',compact('order'));
        } else{
            return redirect('/');
        }
    }

    /*
     * @author yjy
     * 合同模板下载試圖
     * 檢索出模板信息
     * */
    public function contractModuleDown()
    {
        $moduleList=ModuleCategry::get();
        return view('home.personal.download',compact('moduleList'));
    }

    /*
     * @author yjy
     * 下载文件的操作
     * $extension 获取文件的扩展名
     * */
    public function down(ModuleCategry $downs)
    {
        if ($downs->module_url){
            $extension= substr($downs->module_url,strrpos($downs->module_url,'.')+1);
    //        $extension=preg_replace("/.*\.(\w+)/" , "\\1" ,$downs->module_url);
            return response()->download($downs->module_url, $downs->module_name.$extension);
        }else{
            return redirect('/downs')->with('文件不存在');
        }
    }

    /*
     * @author yjy
    * 用户密码的修改
    * 发送模板短信
    * @param to 短信接收彿手机号码集合,用英文逗号分开
    * @param datas 内容数据
    * @param $tempId 模板Id
    */
    public function checkCode()
    {
        $phone = $_POST['phone'];
        $whereid=session('user.id');
        $tel=Admin::select('phone')->where('admin_id',$whereid)->first();
        $telephone=$tel->phone;
        if ($phone==$telephone){
            $smsPhone =new SmsRest();
            $randCode=$this->CodeRandom();
            $data = $smsPhone->sendTemplateSMS($phone,array($randCode,'15'),"1");
            return Response([
               'code' =>'1' ,
                'message' =>'message' ,
                'data' => $data
            ]);
        }
    }

    /*
     * @author yjy
     * */
    //产生六位随机数
    public function CodeRandom()
    {
        $ranString='';
        for ($i=0;$i<=5;$i++){
            $ranString.=rand(0,9);
        }
        return $ranString;
    }

    /*
     * @author yjy
     * 客户端邮寄纸质的合同 在此往数据库记录一下
     * */
    public function postContract(Request $request)
    {
        if ($id=$request->input('orderId')){
            $courierNumber=$request->input('courier_number');
            $courierNumberUpdate=OrderInfo::where('id',$id)->update(['courier_number'=>$courierNumber]);
            if ($courierNumberUpdate == true){
                return redirect('/order-record');
            }else{
                return redirect('/order-record')->with('添加合同订单号失败！！');
            }
        }
    }

}
