<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderInfo;
use App\Models\OrderAdress;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * 订单的查询和列表显示
     * @author yjy
     */
    public function index(Request $request)
    {
        $request->flash();
        $where_condition=$request->input('company_name');
        if ($where_condition)
        {
             $list=OrderInfo::orderSearch($where_condition);
        }else{
             $list=OrderInfo::list();
//             dd($list);
        }
        return view('admin.order.index',compact('list'));
    }
    /**
     * 编辑视图的显示
     * @author yjy
     */
    public function editView(OrderInfo $order)
    {
         $OrderInfo=new OrderInfo();
         $update_arr=$OrderInfo->updateOrder($order->id);

         return view('admin.order.edit',compact('update_arr'));
    }
    /**
     * 编辑操作
     * @author yjy
     */
    public function editAction(Request $request)
    {
        DB::beginTransaction();
        try {
            if ($request->input('id')) {
                $order_info = OrderInfo::find($request->input('id'));
            }
            $order_info->pay_status = $request->input('pay_status');
            $order_info->order_status = $request->input('order_status');
            $order_info->save();

            $OrderAdress = new OrderAdress();
            $OrderAdresss = $OrderAdress->find($order_info->address_id);
            $OrderAdresss->shr_address = $request->input('shr_address');
            $OrderAdresss->shr_tel = $request->input('shr_tel');
            $OrderAdresss->save();
            DB::commit();
            return redirect('admin/power/order/index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect('admin/power/order/edit/' . $request->input('id'));
        }
    }
    /**
     * @author yjy
     */
    public function del(OrderInfo $orderInfo)
    {
        dd($orderInfo);
        if ($orderInfo){
            $orderInfo->status= 0;
            $orderInfo->save();
            return redirect('admin/power/order/index');
        }
    }
    /*
     * 订单是否支付操作
     *
     **/
    public function orderIsPay(OrderInfo $order)
    {
        return view('admin.order.isPay',compact('order'));
    }
    /*
     * 后台编辑订单是否支付操作
     * */
    public function orderPayed(Request $request)
    {
        $orderId=$request->input('id');
        if ($orderId) {
            $orderModel=OrderInfo::find($orderId);
        }
        $orderModel->pay_status = $request->input('pay_status');
        $orderModel->save();
        return redirect('admin/power/order/index');
    }
}
