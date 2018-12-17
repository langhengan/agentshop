@extends('admin.layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{asset('agentadmin/css/admin/authorizate.css')}}">
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
                    <div class="tpl-form-body tpl-form-line" style="margin-left: 100px;">
                        @if(empty($arr)) 未提交审核资料
                        @else
                            <div class="am-form-group" >
                                <input type="hidden" value="{{$arr[0]['admin_id']}}">
                                <label style="left: 700px" for="">公司地址:</label><span>{{$arr[0]['company_address']}}</span>
                            </div>
                            <div class="am-form-group">
                                <label for="" style="left: 700px;">代理级别:</label>{{$arr[0]['level']}}<span></span>
                            </div>
                            <div class="am-form-group">
                                <label for="">联系人：</label><span>{{$arr[0]['realname']}}</span>
                            </div>
                            <div class="am-form-group">
                                <label for="" style="">代理区域：</label><span>{{$arr[0]['province']}}</span>
                            </div>
                            <div class="am-form-group">
                                <label for="">联系电话：</label><spam>{{$arr[0]['phone']}}</spam>
                            </div>
                            <div class="am-form-group">
                                <label for="" style="">上级代理人：</label><span>{{$arr[0]['referee']}}</span>
                            </div>
                            <div class="am-form-group">
                                <label for="">资质资料</label><spam></spam>
                                <div>
                                    <label for="">二类备案：</label><spam></spam>
                                    <img  class="img1" src="{{$arr[0]['second_record']}}">
                                </div>
                                &nbsp;
                                <div>
                                    <label for="">网络销售备案：</label><spam></spam>
                                    <img  class="img1" src="{{$arr[0]['network_sales_pic']}}">
                                </div>
                                &nbsp;
                                <div>
                                    <label for="">营业执照：</label><spam></spam>
                                    <img class="img1" src="{{$arr[0]['business_license']}}" style="width: 100px;height: 100px;">
                                </div>
                                &nbsp;
                                <div>
                                    <label for="">法人身份证：</label><spam></spam>
                                    <img class="img1" src="{{$arr[0]['corporate_identity_card_info']}}">
                                </div>
                                &nbsp;
                                <div>
                                    {{--<input type="button"  style="margin-left:200px;background-color: #4db14d;color: #fff;" name="checkFail" value="审核未通过" class="check-fail"/>--}}
                                    {{--<input type="button" style="margin-left:50px;background-color: #4db14d;color: #fff;" name="checkSuccess" class="check-success" value="审核通过"/>--}}
                                    <a href="{{url('admin/power/admin/checkFail',['id'=>$arr[0]['admin_id']])}}" style="margin-left: 200px;background-color:#4db14d ;color:#fff;padding: 5px;">审核未通过</a>
                                    <a href="{{url('admin/power/admin/success',['id'=>$arr[0]['admin_id']])}}" style="margin-left: 70px;background-color:#4db14d ;color:#fff;padding: 5px;">审核通过</a>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="tpl-alert"></div>
        </div>


@endsection