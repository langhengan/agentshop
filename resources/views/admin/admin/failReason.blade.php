@extends('admin.layouts.app')

@section('content')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
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
                    <span class="am-icon-code">返回上一页</span>

                </div>
            </div>
            <div class="tpl-block">
                {{--<i class="fal fa-arrow-alt-circle-left"></i>--}}
                <div class="am-g">
                    <div class="tpl-form-body tpl-form-line">
                        <i class="fal fa-chevron-circle-left am-icon-md">  <a href="javascript:history.back(-1)"></a></i>
                        <form action="{{url('admin/power/admin/store')}}" method="post" class="am-form tpl-form-line-form">
                            @csrf
                            @if($id)
                                <input type="hidden"  name="id" value="{{$id}}">
                            @endif

                            <div class="am-form-group">
                                <label style="margin-left: -10px" for="user-description" class="am-u-sm-3 am-form-label">未通过的原因 <span class="tpl-form-line-small-title">description</span></label>
                                <div class="am-u-sm-12 "style="border:1px solid #c2cad8;">

                                    <textarea rows="10" name="description" cols="20"></textarea>
                                    {{--@if($role)--}}
                                        {{--<input type="text" class="tpl-form-input" id="user-description" name="description" value="" placeholder="请输入权限描述">--}}
                                    {{--@else--}}
                                        {{--<input type="text" class="tpl-form-input" id="user-description" name="description" value="" placeholder="请输入权限描述">--}}
                                    {{--@endif--}}
                                    {{--@if ($errors->has('description'))--}}
                                        {{--<small style="color:red;">{{$errors->first('description')}}</small>--}}
                                    {{--@endif--}}
                                </div>
                            </div>

                            <div class="am-form-group" style="text-align: center">
                                <div class="am-u-sm-9 am-u-sm-push-3" >
                                    {{--<button class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>--}}
                                </div>
                                <button class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tpl-alert"></div>
        </div>


@endsection