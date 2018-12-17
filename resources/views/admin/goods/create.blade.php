@extends('admin.layouts.app')
@section('content')
    @include('vendor.ueditor.assets')
    {{--<link rel="stylesheet" type="text/css" href="{{asset('home/sign/css/login-1.css')}}">--}}
    {{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" >--}}
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet">
    <script src="{{asset('home/public/js/lib/jquery-1.12.3.js')}}"></script>
    <script src="{{asset('home/sign/js/login-1.js')}}"></script>
    {{--<script src="{{ asset('vendor/ueditor/ueditor.parse.js') }}"></script>--}}
    <link rel="stylesheet" type="text/css" href="{{asset('agentadmin/css/goods/create.css')}}">
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
                   <form action="{{url('admin/power/goods/store')}}" method="post" class="am-form tpl-form-line-form" enctype="multipart/form-data">
                       {{--<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">--}}
                       {{csrf_field()}}
                       {{--@csrf--}}
                       {{--@if($goodsIdList)--}}
                           {{--<input type="hidden"  name="id" value="{{$goodsIdList->id}}">--}}
                       {{--@endif--}}
                       <div class="am-form-group">
                           <label for="user-display_name" class="am-u-sm-3 am-form-label">商品的名称: <span class="tpl-form-line-small-title"> </span></label>
                           <div class="am-u-sm-9">
                               {{--@if($goodsIdList)--}}
                                   <input type="text" class="tpl-form-input" id="user-display_name" name="title" value="" placeholder="请输入商品名称">
                               {{--@else--}}
                                   {{--<input type="text" class="tpl-form-input" id="user-display_name" name="title" value="{{old('title')}}" placeholder="请输入商品名称">--}}
                               {{--@endif--}}
                           </div>
                       </div>
                       <div class="am-form-group">
                           <label for="user-name" class="am-u-sm-3 am-form-label">商品详情: <span class="tpl-form-line-small-title"></span></label>

                           <div class="am-u-sm-9">
                               <!-- 编辑器容器 -->
                               <script id="container" name="content" type="text/plain"></script>
                           </div>

                       </div>

                       {{--<div class="am-form-group">--}}
                           {{--<label for="user-description" class="am-u-sm-3 am-form-label">代理级别: <span class="tpl-form-line-small-title"></span></label>--}}
                           {{--<div class="am-u-sm-9">--}}
                               {{--@if($goodsIdList)--}}
                                {{--<input type="text" class="tpl-form-input" id="user-description" name="level" value="{{$goodsIdList->level}}" placeholder="">--}}
                               {{--@else--}}
                                {{--<input type="text" class="tpl-form-input" id="user-description" name="level" value="{{old('level')}}" placeholder="">--}}
                               {{--@endif--}}
                               {{--@if ($errors->has('level'))--}}
                                   {{--<small style="color:red;">{{$errors->first('level')}}</small>--}}
                               {{--@endif--}}
                           {{--</div>--}}
                       {{--</div>--}}

                       {{--<div class="am-form-group">--}}
                           {{--<label for="user-description" class="am-u-sm-3 am-form-label">商品的价格: <span class="tpl-form-line-small-title"></span></label>--}}
                           {{--<div class="am-u-sm-9">--}}
                               {{--@if($goodsIdList)--}}
                                       {{--<input type="text" class="tpl-form-input" id="user-description" name="price" value="{{$goodsIdList->price}}" placeholder="">--}}
                               {{--@else--}}
                                       {{--<input type="text" class="tpl-form-input" id="user-description" name="price" value="{{old('price')}}" placeholder="">--}}
                               {{--@endif--}}
                                       {{--<input type="checkbox" name="permission[]" value="{{$p->id}}" @if(in_array($p->id,$ower)) data-am-ucheck checked @else data-am-ucheck @endif> {{$p->display_name}}--}}
                           {{--</div>--}}
                               {{--@endforeach--}}
                       {{--</div>--}}
                       <div class="am-form-group">
                           <label for="user-description" class="am-u-sm-3 am-form-label">商品的数量: <span class="tpl-form-line-small-title"></span></label>
                           <div class="am-u-sm-9">
                               {{--@if($goodsIdList)--}}
                                   <input type="text" class="tpl-form-input" id="user-description" name="number" value="" placeholder="">
                               {{--@else--}}
                                   {{--<input type="text" class="tpl-form-input" id="user-description" name="number" value="{{old('number')}}" placeholder="">--}}
                               {{--@endif--}}
                               {{--<input type="checkbox" name="permission[]" value="{{$p->id}}" @if(in_array($p->id,$ower)) data-am-ucheck checked @else data-am-ucheck @endif> {{$p->display_name}}--}}
                           </div>
                           {{--@endforeach--}}
                       </div>
                       <div class="am-form-group">
                           <label for="user-description" class="am-u-sm-3 am-form-label">商品的图片1:</label>
                           <div class="addImages am-u-sm-9">
                               {{--<input type="file" class="file" accept = "image/*" required style="display: inline-block ;height: 100px;width: 100px;" >--}}
                               <div class="text-detail">
                                   <span class="span-jiahao">+</span>
                                   {{--<p>点击上传</p>--}}
                               </div>
                               <input type="file" class="file"  name="file1" accept = "image/*" required style="" >
                               {{--<img src="{{$goodsIdList->image1}}" alt=""><i class="far fa-times-circle"></i>--}}
                           </div>
                       </div>
                       <div class="am-form-group">
                           <label for="user-description" class="am-u-sm-3 am-form-label">商品的图片2:</label>
                           <div class="addImages am-u-sm-9">
                               {{--<input type="file" class="file" accept = "image/*" required style="display: inline-block ;height: 100px;width: 100px;" >--}}
                               <div class="text-detail">
                                   <span class="span-jiahao">+</span>
                                   {{--<p>点击上传</p>--}}
                               </div>
                               <input type="file" class="file"  name="file2" accept = "image/*" required style="" >
                               {{--<img src="{{$goodsIdList->image2}}" alt=""><i class="far fa-times-circle"></i>--}}
                           </div>
                       </div>
                       <div class="am-form-group">
                           <label for="user-description" class="am-u-sm-3 am-form-label">商品的图片3:</label>
                           <div class="addImages am-u-sm-9">
                               {{--<input type="file" class="file" accept = "image/*" required style="display: inline-block ;height: 100px;width: 100px;" >--}}
                               <div class="text-detail">
                                   <span  class="span-jiahao">+</span>
                                   {{--<p>点击上传</p>--}}
                               </div>
                               <input type="file" class="file"  name="file3" accept = "image/*" required style="" >
                               {{--<img src="{{$goodsIdList->image3}}" alt=""><i class="far fa-times-circle"></i>--}}
                           </div>
                       </div>
                       <div class="am-form-group">
                           <label for="user-description" class="am-u-sm-3 am-form-label">商品的图片4:</label>
                           <div class="addImages am-u-sm-9">
                               <div class="text-detail">
                                   <span class="span-jiahao">+</span>
                                   {{--<p>点击上传</p>--}}
                               </div>
                               <input type="file" class="file"  name="file4" accept = "image/*" required style="" >
                               {{--<img src="{{$goodsIdList->image4}}" alt=""><i class="far fa-times-circle"></i>--}}
                           </div>
                       </div>
                       <div class="am-form-group">
                           <label for="user-description" class="am-u-sm-3 am-form-label">商品的图片5:</label>
                           <div class="addImages am-u-sm-9">
                               {{--<input type="file" class="file" accept = "image/*" required style="display: inline-block ;height: 100px;width: 100px;" >--}}
                               <div class="text-detail">
                                   <span class="span-jiahao">+</span>
                                   {{--<p>点击上传</p>--}}
                               </div>
                               <input type="file" class="file"  name="file5" accept = "image/*" required style="" >
                               {{--<img src="{{$goodsIdList->image5}}" alt=""><i class="far fa-times-circle"></i>--}}
                           </div>
                       </div>



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
        <script>
            var thumbnailShow = function(){
                // 图片上传后缩略图预览效果
                var thumbnail = $('.file');
                thumbnail.on('change',function(){
                    var filePath = $(this).val(),
                        //获取到input的value，里面是文件的路径
                    fileFormat = filePath.substring(filePath.lastIndexOf(".")).toLowerCase(),
                    src = window.URL.createObjectURL(this.files[0]);
                    // console.log(src);
                    var picHtml = `<img src="${src}" alt=""><i class="far fa-times-circle close"></i> `;
                    //转成可以在本地预览的格式
                    // 检查是否是图片
                    if( !fileFormat.match(/.png|.jpg|.jpeg/) ) {
                        error_prompt_alert('上传错误,文件格式必须为：png/jpg/jpeg');
                        return;          }
                    // console.log($(this).context.files[0].size);
                    var maxSize = 1*1024*1024;
                    var fileSize = $(this).context.files[0].size;
                    // 上传图片大小不得大于2M
                    if(fileSize>maxSize){
                        alert('文件最大不能超过1M');
                        return false;
                    }
                    $(this).parent().append(picHtml);
                    $("i.close").on('click',function(){
                        // console.log($(this));
                        $(this).prev().remove();
                        $(this).remove();
                    });
                })
            }
            thumbnailShow();
        </script>

        <!-- 实例化编辑器 -->
        <script type="text/javascript">
            var ue = UE.getEditor('container');
            ue.ready(function() {
                var html=ue.getContent();
                // console.log(html);
                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
            });
        </script>

        <!-- 编辑器容器 -->
        {{--<script id="container" name="content" type="text/plain"></script>--}}
@endsection