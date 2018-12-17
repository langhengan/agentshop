<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //
    protected $table='goods';
    protected $guarded = [];
    public $timestamps = true;

    public  function  common()
    {
        return $this->select('goods.*','image.image1','image.image2','image.image3','image.image4','image.image5')
//            ->leftjoin('goods_info','goods.id','=','goods_info.goods_id');
              ->leftjoin('image','goods.id','=','image.goods_id');
    }
    public  function  commons()
    {
        return $this->select('goods.*','goods.id as goodsid','goods_info.*')
            ->leftjoin('goods_info','goods.id','=','goods_info.goods_id');
    }
    //商品的列表页展示
    public function  list()
    {
         return $this->common()->where('goods.del_status',1)->distinct('goods.id')->paginate(5);
    }
    //根据用户代理等级展示商品
    public function UserList($level)
    {
        return $this->commons()->where('goods_info.level','=',$level-1)->paginate(10);
    }
    //商品的检索
    public function goodsSearch($goods_name)
    {
        return $this->common()
            ->where('goods.title','=',$goods_name)
            ->paginate(10);
    }
    public  function goodsIdList($goods_id)
    {
        return $this->common()
            ->where('goods.id','=',$goods_id)
//            ->distinct()
            ->first();
    }
}
