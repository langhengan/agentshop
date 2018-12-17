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
                   <form action="{{url('admin/power/role/store')}}" method="post" class="am-form tpl-form-line-form">
                       @csrf
                       @if($role)
                           <input type="hidden"  name="id" value="{{$role->id}}">
                       @endif
                       <div class="am-form-group">
                           <label for="user-display_name" class="am-u-sm-3 am-form-label">角色名称 <span class="tpl-form-line-small-title">display_name </span></label>
                           <div class="am-u-sm-9">
                               @if($role)
                                   <input type="text" class="tpl-form-input" id="user-display_name" name="display_name" value="{{$role->display_name}}" placeholder="请输入角色名称">
                                   @else
                                   <input type="text" class="tpl-form-input" id="user-display_name" name="display_name" value="{{old('display_name')}}" placeholder="请输入角色名称">
                               @endif

                               @if ($errors->has('display_name'))
                                   <small style="color:red;">{{$errors->first('display_name')}}</small>
                               @endif
                           </div>
                       </div>
                       <div class="am-form-group">
                           <label for="user-name" class="am-u-sm-3 am-form-label">映射 <span class="tpl-form-line-small-title">name</span></label>
                           <div class="am-u-sm-9">
                               @if($role)
                                <input type="text" class="tpl-form-input" id="user-name" name="name" value="{{$role->name}}" placeholder="请输入映射(角色的唯一标识)">
                               @else
                                <input type="text" class="tpl-form-input" id="user-name" name="name" value="{{old('name')}}" placeholder="请输入映射(角色的唯一标识)">
                               @endif
                               @if ($errors->has('name'))
                                   <small style="color:red;">{{$errors->first('name')}}</small>
                               @endif
                           </div>
                       </div>

                       <div class="am-form-group">
                           <label for="user-description" class="am-u-sm-3 am-form-label">角色描述 <span class="tpl-form-line-small-title">description</span></label>
                           <div class="am-u-sm-9">
                               @if($role)
                                <input type="text" class="tpl-form-input" id="user-description" name="description" value="{{$role->description}}" placeholder="请输入角色描述">
                               @else
                                <input type="text" class="tpl-form-input" id="user-description" name="description" value="{{old('description')}}" placeholder="请输入角色描述">
                               @endif
                               @if ($errors->has('description'))
                                   <small style="color:red;">{{$errors->first('description')}}</small>
                               @endif
                           </div>
                       </div>

                       <div class="am-form-group">
                           <label for="user-description" class="am-u-sm-3 am-form-label">赋予权限 <span class="tpl-form-line-small-title">permission</span></label>
                           <div class="am-u-sm-9">
                               @foreach($permission as $p)
                               <div class="tpl-switch" style="width: 140px;float:left;">
                                   <label class="am-checkbox am-secondary">
                                       <input type="checkbox" name="permission[]" value="{{$p->id}}" @if(in_array($p->id,$ower)) data-am-ucheck checked @else data-am-ucheck @endif> {{$p->display_name}}
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