<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\image;
use DB;

class GoodsController extends Controller
{
    //以商品名进行检索 商品列表页的展示
    public function index(Request $request)
    {
        $request->flash();
        $condition=$request->input('title');
        $goodsModel=new Goods();
        if ($condition)
        {
            $goods_list=$goodsModel->goodsSearch($condition);
        }else{
            $goods_list=$goodsModel->list();
        }
        return view('admin.goods.index',compact('goods_list'));
    }
    //添加的视图展示
    public function create(Goods $goods)
    {   $GoodsModel=new Goods();
        $goods=$goods->id;
        if ($goods){
            $goodsIdList=$GoodsModel->goodsIdList($goods);//修改视图的数据查出 重写图片的路径
            $url_path='http://'.$_SERVER["HTTP_HOST"].'/';
            $goodsIdList->image1=$url_path.$goodsIdList->image1;
            $goodsIdList->image2=$url_path.$goodsIdList->image2;
            $goodsIdList->image3=$url_path.$goodsIdList->image3;
            $goodsIdList->image4=$url_path.$goodsIdList->image4;
            $goodsIdList->image5=$url_path.$goodsIdList->image5;
            return view('admin.goods.edit',compact('goodsIdList'));
        }else{
            $goodsIdList=$GoodsModel;
            return view('admin.goods.create',compact('goodsIdList'));
        }
    }
    //添加操作
    public function storeAction(Request $request)
    {
        $realpath="agentadmin/upload/goods";
        if ($request->input('id')){
            $goodsModel=Goods::find($request->input('id'));
        }else{
            $goodsModel=new Goods();
        }
        DB::beginTransaction();
        try{
            $restRequest =$request->except('_token','title','number','id','content');
            if ($request->input('title')){
                $goodsModel->title=$request->input('title');
            }
            if ($request->input('number')) {
                $goodsModel->number = $request->input('number');
            }
            if ($request->input('content')){
                $goodsModel->content = $request->input('content');
            }
            $goods_save=$goodsModel->save(); //添加更新goods模型
            $id = DB::getPdo()->lastInsertId();//获取最新添加的数据的id
            $pic_up = picArray($restRequest,$realpath);//图片的上传
            $img_insert=$this->replaceKey($pic_up);//替换数组中的key值

            //判断视图有没有id传过来 如果有说明是修改 没有是添加
            if ($request->input('id')){
                $goods_id=$request->input('id');
                $img_arr=DB::table('image')->where('goods_id',$goods_id)->update($img_insert);
            }else{
                $img_insert['goods_id']=$id;
                $img_arr=DB::table('image')->insert($img_insert);
            }
            //判断添加或者修改的数据库返回结果是否是true
            if ($img_arr==true  && $goods_save==true){
                DB::commit();
            }
            return redirect('admin/power/goods/index');
        }catch(\Exception $exception){
            DB::rollBack();
            return response($exception->getMessage());
        }

    }
    //将数组中的key：0、1 、2、3等替换为你想要的key值
    public function replaceKey($arr)
    {
        $image="image";
        for ($i=0;$i<count($arr);$i++){
            $j=$i+1;
            $key=$image.$j;
            $arr_replace_end[$key] =$arr[$i];
        }
        return $arr_replace_end;
    }

    //删除商品
    public function delGoods(Goods $goods)
    {
        if ($goods){
            $goods->del_status= 0;
            $goods->save();
            return redirect('admin/power/goods/index');
        }
    }
    //修改商品的等级和价格
    public function levelPrice()
    {
        return view('admin.goods.levelPrice');
    }
}
