<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    protected $table = 'company_info';
    protected $guarded = [];
    public $timestamps = true;

    //search和list的公共部分
    public static function  common(){
        return self::select('company_info.company_address','company_info.company_email','company_info.province','company_info.city','admin.*')
            ->leftJoin('admin','company_info.user_id','=','admin.admin_id');
    }
    //代理商详细信息列表页的显示
    public static function search($input)
    {
        return self::common()
            ->where('admin.company_name','like','%'.$input)
//            ->where('admin.check_status','>',0)
            //            ->where('admin.register','=',1)
//            ->orderBy('admin_id desc')
            ->paginate(10);
    }
    //代理商列表页的检索
    public static function list()
    {
        return self::common()
            ->where('admin.status','=',1)
//            ->where('admin.check_status','>',0)
//            ->orderBy('admin_id desc')
//                ->groupby('')
            ->paginate(10);
//              ->tosql();
    }
    //审核页
//    public static function search_authorize($input_where)
//    {
//        return self::common()
//            ->where('admin.company_name','=',$input_where)
//            ->get();
//    }
}
