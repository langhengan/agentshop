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
                        <form action="{{url('admin/power/user/store')}}" method="post" class="am-form tpl-form-line-form">
                            @csrf
                            @if($user)
                                <input type="hidden"  name="id" value="{{$user->id}}">
                            @endif
                            <div class="am-form-group">
                                <label for="user-account" class="am-u-sm-3 am-form-label">账号 <span class="tpl-form-line-small-title">email </span></label>
                                <div class="am-u-sm-9">
                                    @if($user)
                                        <input type="text" class="tpl-form-input" id="user-account" name="email" value="{{$user->email}}" placeholder="请输入邮箱号">
                                    @else
                                        <input type="text" class="tpl-form-input" id="user-account" name="email" value="{{old('email')}}" placeholder="请输入邮箱号">
                                    @endif

                                    @if ($errors->has('email'))
                                        <small style="color:red;">{{$errors->first('email')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">用户名称 <span class="tpl-form-line-small-title">name </span></label>
                                <div class="am-u-sm-9">
                                    @if($user)
                                        <input type="text" class="tpl-form-input" id="user-name" name="name" value="{{$user->name}}" placeholder="请输入用户名称">
                                    @else
                                        <input type="text" class="tpl-form-input" id="user-name" name="name" value="{{old('name')}}" placeholder="请输入用户名称">
                                    @endif

                                    @if ($errors->has('name'))
                                        <small style="color:red;">{{$errors->first('name')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">密码 <span class="tpl-form-line-small-title">password </span></label>
                                <div class="am-u-sm-9">
                                    @if($user)
                                        <input type="password" class="tpl-form-input" id="user-password" name="password" value="{{old('name')}}" placeholder="请输入密码">
                                    @else
                                        <input type="password" class="tpl-form-input" id="user-password" name="password" value="{{old('name')}}" placeholder="请输入密码">
                                    @endif

                                    @if ($errors->has('password'))
                                        <small style="color:red;">{{$errors->first('password')}}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-description" class="am-u-sm-3 am-form-label">角色 <span class="tpl-form-line-small-title">permission</span></label>
                                <div class="am-u-sm-9">
                                    @foreach($role as $r)
                                        <div class="tpl-switch" style="width: 140px;float:left;">
                                            <label class="am-checkbox am-secondary">
                                                <input type="checkbox" name="roles[]" value="{{$r->id}}" @if(in_array($r->id,$ower)) data-am-ucheck checked @else data-am-ucheck @endif> {{$r->display_name}}
                                            </label>
                                        </div>
                                    @endforeach

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