<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderInfo;
use App\Models\OrderBoill;

class BoillController extends Controller
{
    /**
     * 根据订单号检索
     * @author yjy
     */
    public function index(Request $request)
    {
        $orderInfo=new OrderInfo();
        $request->flash();
        $condition=$request->input('order_num');
        if ($condition){
            $list=$orderInfo->searchBoill($condition);
        }else{
            $list=$orderInfo->boillList();
        }
        return view('admin.boill.index',compact('list'));
    }
}
