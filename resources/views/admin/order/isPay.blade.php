@extends('admin.layouts.app')

@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">

        </div>
        <ol class="am-breadcrumb">
            <li><a href="#" class="am-icon-home">首页</a></li>
            <li><a href="#">分类</a></li>
            <li class="am-active">内容</li>
        </ol>

        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    <span class="am-icon-code"></span>
                </div>
            </div>
            <div class="tpl-block">
                <div class="am-g">
                    <div class="tpl-form-body tpl-form-line">
                        <form action="{{url('admin/power/order/pay_edit')}}" method="post" class="am-form tpl-form-line-form">
                            @csrf
                            @if($order)
                                <input type="hidden"  name="id" value="{{$order->id}}">
                            @endif
                            <div class="am-form-group">
                                <label for="user-account" class="am-u-sm-3 am-form-label">商品价格的支付： <span class="tpl-form-line-small-title"></span></label>
                                <div class="am-u-sm-9">
                                    {{--@if($update_arr)--}}
                                        {{--<input type="text" class="tpl-form-input" id="user-account" name="pay_status" value="" placeholder="请输入">--}}
                                    {{--@endif--}}
                                    <select name="pay_status">
                                        <option value="0">未支付</option>
                                        <option value="1" selected>已支付</option>
                                    </select>

                                    {{--@if ($errors->has('email'))--}}
                                        {{--<small style="color:red;">{{$errors->first('email')}}</small>--}}
                                    {{--@endif--}}
                                </div>
                            </div>
                            {{--<div class="am-form-group">--}}
                                {{--<label for="user-name" class="am-u-sm-3 am-form-label">收货人的电话 <span class="tpl-form-line-small-title"></span></label>--}}
                                {{--<div class="am-u-sm-9">--}}
                                    {{--@if($update_arr)--}}
                                        {{--<input type="text" class="tpl-form-input" id="user-name" name="shr_tel" value="{{$update_arr->shr_tel}}" placeholder="请重新输入收货人的电话">--}}
                                    {{--@endif--}}

                                    {{--@if ($errors->has('name'))--}}
                                        {{--<small style="color:red;">{{$errors->first('name')}}</small>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <button class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="tpl-alert"></div>
        </div>


@endsection