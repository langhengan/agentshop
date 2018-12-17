<?php

namespace App\Http\Controllers\Home;

use App\Models\Admin;
use App\Models\Goods;
use App\Models\GoodsInfo;
use App\Models\image;
use App\Models\OrderAdress;
use App\Models\OrderInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Exceptions\HomeWebException;

class IndexController extends Controller
{
    private $orderInfo;
    public function __construct()
    {
        $this->orderInfo = new OrderInfo();
    }
    /**
     * Notes:商品展示视图
     * Author:sjzlai
     */
    public function index()
    {
        //查询判断登陆用户代理等级
        $userId = session('user.id');
        $level = Admin::select('admin.level')->find($userId);
        $goods = new Goods();
        $goodsList= $goods->UserList($level->level);
        return view('home.index.index',compact('goodsList'));
    }


    /*
     * 加入订购单的视图展示
     * return goodsPrice
     * */
    public function cartView($goodsPrice)
    {
        $goodsId=GoodsInfo::select('id')->where('price',$goodsPrice)->first();
        $img=image::where('goods_id',$goodsId->id)->first();
        if ($img){
            $image=$img->image1;
        }else{
            $image='';
        }
        return view('home.index.order-submission',compact('goodsPrice','image'));
    }

    /*
     *加入订单的操作
     * 将admin表的id存入库  orderadress的id存入库
     * cartAction
     *  优惠的价格deleazePrice   实际总价格sum_money
     * */
    public function cartAction(Request $request)
    {
        $adminId = session('user.id');
        if (!empty($adminId)){
            $orderInfoAll=$request->except('_token');
            Session()->put('order',$orderInfoAll);
            $value=Session::get('order',$orderInfoAll);
            $orderAddress=$request->except('_token','order_num','number','collect_goods_date','company_name','order_requirement','deleazePrice','price','sum_money');
            if (is_array($orderAddress) && !empty($orderAddress)){
                $orderAddressModel=new OrderAdress();
            }

            //添加到代理的数据库
            $orderAddressBool=$orderAddressModel->insert($orderAddress);
            $addressId = DB::getPdo()->lastInsertId();

            //添加到生产的数据库
            $arr=[];
            $arr['consignee_name']=$orderAddress['shr_name'];
            $arr['phone']=$orderAddress['shr_tel'];
            $arr['province']=$orderAddress['shr_province'];
            $arr['city']=$orderAddress['shr_city'];
            $arr['address']=$orderAddress['shr_address'];
            DB::connection('mysql_center')->table('harvest_info')->insert($arr);
            //获取最新添加的数据的id 模板后面的字段为此表的主键
            $harvestInfoId = DB::connection('mysql_center')->table('harvest_info')->insertGetId($arr);

            $orderNumber=$this->orderInfo->order_num=$this->OrderCode();
            Session()->put('order_num',$orderNumber);
            $randNumber=Session::get('order_num');
            $goodsPrice=$request->input('price');

            $datas=$this->orderInfoInput($request);
            //向数组中加入收货信息表的外键
            $datas['harvest_info_id'] =$harvestInfoId;
            DB::connection('mysql_center')->table('purchasing_order')->insert($datas);
            
            $this->orderInfo->user_id = $adminId;
            if (!empty($addressId)){
                $this->orderInfo->address_id = $addressId;
            }
            $this->orderInfo->order_date=date('Y-m-d H:i:s');
            $this->orderInfo->collect_goods_date=date('Y-m-d H:i:s');
            $orderInfoBool=$this->orderInfo->save();
            if ($orderAddressBool==true && $orderInfoBool==true){
                return view('home.index.order-success',compact('value','randNumber'));
            }else{
                return redirect('/cart/'.$goodsPrice)->with('添加失败请重新输入！！！');
            }
        }else{
            return redirect('/')->with('您尚未登录！！');
        }
    }
    /*
     * 添加订单的订单传过来的内容
     * */
    public function orderInfoInput(Request $request)
    {
          if ($collectGoodsDate= $request->input('collect_goods_date')){
              $this->orderInfo->collect_goods_date = $collectGoodsDate;
              $data['harvest_date']=$collectGoodsDate;
          }
          if ($orderRequirement = $request->input('order_requirement')){
              $this->orderInfo->order_requirement = $orderRequirement;
              $data['remark']=$orderRequirement;
          }
          if ($numberInput=$request->input('number')){
              //订单中的用户购买的总数
              $goodsSumNumber=$this->orderInfo->sum('number');
              //查出商品表中的商品的总数量
              $number=Goods::select('number')->first();
              //视图传过来的数量加订单表的商品的数量
              $OrderSumGoods = $numberInput + $goodsSumNumber;
              $num=$number->number;
              if($OrderSumGoods > $num){
                  throw new HomeWebException(['errors' => trans('home.number')]);
              }else{
                  $this->orderInfo->number = $numberInput;
                  $data['goods_number'] = $numberInput;
              }
          }
          if ($companyName = $request->input('company_name')){
              $this->orderInfo->company_name = $companyName;
          }
          if ($request->input('deleazePrice')){
              $deleazePrice =  $request->input('deleazePrice');
              $this->orderInfo->deleazePrice = $deleazePrice;
          }
          if ($request->input('sum_money')){
              $sumMoney =  $request->input('sum_money');
          }
          if ($deleazePrice && $sumMoney){
              $this->orderInfo->sum_money = $sumMoney-$deleazePrice;
          }
          return $data;
    }

    /*
   *订单号的生成
   * return $orderCode
   * */
    public function OrderCode()
    {
        $key='';
        $dateTime=date('His');
        $strs='0123456789abcdefghijklmnopqrstuvwxyz';
        $strss=strtoupper($strs);
        $str=$strs.$strss;
        for ($i=0;$i<7;$i++){
            $key .= $str{mt_rand(0,35)};
        }
        $orderCode=$dateTime.$key;
        return $orderCode;
    }

    /*
     * 订单的提交视图
     * */
    public function orderCommitView()
    {
        return view('home.index.order-success');
    }


}
