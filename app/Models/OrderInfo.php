<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderInfo extends Model
{
    //
    protected $table='order_info';
    protected $guarded = [];
    public $timestamps = true;
    //公共的方法
    public static function common()
    {
        return self::select('order_info.*','admin.admin_id','admin.company_name','order_adress.shr_name','order_adress.shr_tel','order_adress.shr_address')
            ->leftJoin('admin','order_info.user_id','=','admin.admin_id')
            ->leftJoin('order_adress','order_info.address_id','=','order_adress.adress_id');
    }
    //依据订单表的状态字段查出为1的所有订单
    public static function list()
    {
        return self::common()
            ->where('order_info.status','=',1)
            ->paginate(10);
    }
    //前台订单的显示
    public static function order($admin_id)
    {
        return self::common()
            ->where('order_info.status','=',1)
            ->where('admin.admin_id','=',$admin_id)
            ->paginate(10);
    }
    //依据公司名称进行的商品的检索
    public static function orderSearch($condition)
    {
        return self::common()
            ->where('admin.company_name','like','%'.$condition)
            ->paginate(10);
    }
    public  function updateOrder($order_id)
    {
        return self::select('order_info.pay_status','order_info.order_status','order_info.id','order_adress.shr_tel','order_adress.shr_address')
            ->leftJoin('order_adress','order_info.address_id','=','order_adress.adress_id')
            ->where('order_info.id','=',$order_id)
            ->first();
    }

//关联模型
//    public function order_boill()
//    {
//        return $this->belongsTo('App\OrderBoill','order_info_id','id');
//    }



//发票的查询检索操作
     public function boill_common(){
         return self::select('order_boill.*','admin.admin_id','admin.company_name','order_info.order_num','order_info.number','order_info.sum_money')
             ->leftJoin('admin','order_info.user_id','=','admin.admin_id')
             ->rightJoin('order_boill','order_boill.order_info_id','=','order_info.id');
     }
     public  function boillList(){
        return self::boill_common()
            ->where('order_info.status','=',1)
//            ->orderBy('order_boill.id','desc')
            ->paginate(10);
     }
     //以订单号检索
     public  function searchBoill($condition){
        return self::boill_common()
            ->where('order_info.order_num','like','%'.$condition)
            ->paginate(10);
     }

}
