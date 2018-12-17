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
                   <form action="{{url('admin/power/allModule/store')}}" method="post" class="am-form tpl-form-line-form" enctype="multipart/form-data">
                       {{csrf_field()}}
                       <input type="hidden" value="{{$module->id}}" name="id">
                       <div class="am-form-group">
                           <label for="user-description" class="am-u-sm-3 am-form-label">模板名:</label>
                           <div class="addImages am-u-sm-9">
                               @if($module)
                                     <input type="text" class="file"  name="module_name"  required style="" value="{{$module->module_name}}">
                                   @else
                                   <input type="text" class="file"  name="module_name"  required style="" value="{{old('module_name')}}">
                               @endif
                           </div>
                       </div>
                       <div class="am-form-group">
                           <label for="user-description" class="am-u-sm-3 am-form-label">模板合同:</label>
                           <div class="addImages am-u-sm-9">
                               <input type="file" class="file"  name="module_url"  required style="" >
                           </div>
                       </div>
                       {{--<div class="am-form-group">--}}
                           {{--<label for="user-description" class="am-u-sm-3 am-form-label">商品的图片4:</label>--}}
                           {{--<div class="addImages am-u-sm-9">--}}
                               {{--<input type="file" class="file"  name="file4" accept = "image/*" required style="" >--}}{{--<img src="{{$goodsIdList->image4}}" alt=""><i class="far fa-times-circle"></i>--}}
                           {{--</div>--}}
                       {{--</div>--}}
                       {{--<div class="am-form-group">--}}
                           {{--<label for="user-description" class="am-u-sm-3 am-form-label">商品的图片5:</label>--}}
                           {{--<div class="addImages am-u-sm-9">--}}
                               {{--<input type="file" class="file"  name="file5" accept = "image/*" required style="" >--}}{{--<img src="{{$goodsIdList->image5}}" alt=""><i class="far fa-times-circle"></i>--}}
                           {{--</div>--}}
                       {{--</div>--}}



                       <div class="am-form-group">
                           <div class="am-u-sm-9 am-u-sm-push-3" style="margin-left: 180px;">
                               <button class="am-btn am-btn-primary tpl-btn-bg-color-success " style="width: 100px;">提交</button>
                           </div>
                       </div>
                   </form>

               </div>
           </div>
       </div>
       <div class="tpl-alert"></div>
   </div>

@endsection