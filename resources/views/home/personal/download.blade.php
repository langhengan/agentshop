@extends('home.layout.home')
@section('nav')
    <div class="page__title--menu">
        <div class="container">
            <nav role="navigation" class="navbar">
                <div class="navbar-header">
                    <a href="../index.html" class="navbar-brand">
                        <img src="{{asset('/home/images/logo.png')}}">
                    </a>
                </div>
                <div class=" navbar-collapse">
                    <ul class="nav navbar-nav text-left">
                        <li class='item product_details '><a href="{{url('/index')}}">产品详情</a></li>
                        <li class='item personal_center active'><a href="{{url('/personal')}}">个人中心</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('home/public/css/font-awesome.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('home/public/css/personal_left.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/personal/css/download.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/public/css/breadcrumbs.css')}}">
@endsection
@section('content')
    <section class="breadcrumbs">
        <div>
            <span> 首页 > </span><span> 个人中心 </span>
        </div>
    </section>

    <section id="download">
        <div class="personal">
            @include('home.layout.personal')
            {{--<div class="personal_left">--}}
                {{--<div>--}}
                    {{--<img src="{{asset('home/images/user.png')}}" alt="">--}}
                    {{--<p>北京中科生仪</p>--}}
                {{--</div>--}}
                {{--<div>--}}
                    {{--<ul id="menu">--}}
                        {{--<li>--}}
                            {{--<i class="icon-data"></i>--}}
                            {{--<a href="{{url('/personal')}}">个人资料</a>--}}
                            {{--@php echo $url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];@endphp--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<i class="icon-password"></i>--}}
                            {{--<a href="{{url('/update-pass')}}">修改密码</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<i class="icon-sign"></i>--}}
                            {{--<a href="{{url('/order-record')}}">我的订单</a>--}}
                        {{--</li>--}}
                        {{--<li class="active">--}}
                            {{--<i class="fa fa-cloud-download"></i>--}}
                            {{--<a href="{{url('/download')}}">模板下载</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="personal_right">
                <div class="personal_bar">
                    <span>模板下载</span>
                </div>
                <div class="template">
                    @foreach($moduleList as $item)
                    <div class="template_title">
                        <a href="{{url('downs',['id'=>$item->id])}}" >
                            <span>{{$item->module_name}}</span><span class="template_down">下载</span>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>   
    </section>


@section('script')
    <script src="{{asset('home/public/js/common/common.js')}}"></script>
@endsection
@endsection