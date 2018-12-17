<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $table = 'admin';
    protected $guarded = [];
    protected $primaryKey='admin_id';
    public $timestamps = true;

//    public static function common()
//    {
//        return self::select('order_info.*','admin.admin_id','admin.company_name','order_adress.shr_name','order_adress.shr_tel')
//            ->leftJoin('order_info','admin.admin_id','=','order_info.user_id')
//            ->leftJoin('order_adress','admin.admin_id','=','order_adress.user_id');
//    }
//    //依据订单表的状态字段查出为1的所有订单
//    public static function list()
//    {
//        return self::common()
//            ->where('order_info.status','=',1)
//            ->paginate(10);
//    }
//    //依据公司名称进行的商品的检索
//    public static function orderSearch($condition)
//    {
//        return self::common()
//            ->where('admin.company_name','like','%'.$condition)
//            ->paginate(10);
//    }
    public static function  common(){
        return self::select('company_info.company_address','company_info.company_email','company_info.province','company_info.city','admin.*','agent_apply_info.second_record','agent_apply_info.business_license','agent_apply_info.corporate_identity_card_info','agent_apply_info.network_sales_pic')
            ->rightJoin('company_info','company_info.user_id','=','admin.admin_id')
            ->rightJoin('agent_apply_info','agent_apply_info.admin_id','=','admin.admin_id');
    }
    public static function searchAuthorize($input_where)
    {
        return self::common()
            ->where('admin.company_name','=',$input_where)
            ->get();
    }
    public static function personalInfo($adminId)
    {
        return self::common()
            ->where('admin.admin_id','=',$adminId)
            ->first();
    }
    public function adminCompanyOrder($admin_id)
    {
        return self::select('admin.*')
            ->leftJoin()
            ->leftJoin();
    }
}
