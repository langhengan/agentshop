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
                        <form action="{{url('admin/power/order/order_ed')}}" method="post" class="am-form tpl-form-line-form">
                            @csrf
                            @if($update_arr)
                                <input type="hidden"  name="id" value="{{$update_arr->id}}">
                            @endif
                            <div class="am-form-group">
                                <label for="user-account" class="am-u-sm-3 am-form-label">收货人的地址 <span class="tpl-form-line-small-title"></span></label>
                                <div class="am-u-sm-9">
                                    @if($update_arr)
                                        <input type="text" class="tpl-form-input" id="user-account" name="shr_address" value="{{$update_arr->shr_address}}" placeholder="请重新输入地址">
                                    @endif

                                    {{--@if ($errors->has('email'))--}}
                                        {{--<small style="color:red;">{{$errors->first('email')}}</small>--}}
                                    {{--@endif--}}
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">收货人的电话 <span class="tpl-form-line-small-title"></span></label>
                                <div class="am-u-sm-9">
                                    @if($update_arr)
                                        <input type="text" class="tpl-form-input" id="user-name" name="shr_tel" value="{{$update_arr->shr_tel}}" placeholder="请重新输入收货人的电话">
                                    @endif

                                    {{--@if ($errors->has('name'))--}}
                                        {{--<small style="color:red;">{{$errors->first('name')}}</small>--}}
                                    {{--@endif--}}
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">订单的进度 <span class="tpl-form-line-small-title"></span></label>
                                <div class="am-u-sm-9">
                                    <select name="pay_status">
                                        <option value="0" @if($update_arr->pay_status=='0') selected @endif>未付款</option>
                                        <option value="1" @if($update_arr->pay_status=='1') selected @endif>已付款</option>
                                    </select>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">订单的状态<span class="tpl-form-line-small-title"></span></label>
                                <div class="am-u-sm-9">
                                    <select name="order_status">
                                        <option value="0" @if($update_arr->order_status=='0') selected @endif>未发货</option>
                                        <option value="1" @if($update_arr->order_status=='1') selected @endif>已发货</option>
                                    </select>
                                </div>
                            </div>
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