<!DOCTYPE html>
<!--[if IE 9 ]> <html class="ie9" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="zh-cn"> <!--<![endif]-->
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta name="keywords" content="肺笛、排痰器、振动排痰器、便携排痰器、雾霾、呼吸困难、排痰、吸烟、朗恒安、朗弗罗、肺癌、肺结核、COPD、慢性肺部疾病、痰液标本">
    <meta name="description" content="北京朗恒安生物科技有限公司是一家专业从事进口医疗健康器械的销售与服务，并已建立了完善销售网络的医疗健康公司">
    <meta name="360-site-verification" content="9892d8d80d31418eeb519dd000bc2630" />
    <link rel="shortcut icon" href="{{asset('/favicon.ico')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/home/public/css/amazeui-c24a1a723c.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/home/public/css/reset-2be4611e36.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/home/public/css/animate-ebbc4d2531.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/home/public/css/base.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/home/public/css/icomoon-d0baa465fd.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/home/public/css/sprite.css')}}">
    @yield('style')

    <title>朗恒安</title>
</head>

<body>
<div style="display:none" class="loading"></div>
<div id="navigation">
    <nav role="navigation" class="page__title">
        <div class="page__title--warp">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <p class="num">欢迎进入美国朗弗罗<span class="super">®</span><span>肺笛中国官网</span></p>
                    </div>
                    <div class="col-md-7 text-right">
                        @if(!session('user.id'))
                        <div class="social">
                            <a href="#">个人登录 </a>
                            <a>|</a>
                            <a href="{{url('/')}}">代理商登录</a>
                            <a>|</a>
                            <a href="http://www.lungflute.com/" style="color:#35d4a0;">美国官网 </a>
                        </div>
                        @else
                        <div class="social">
                            <a href="">{{session('user.name')}}</a>
                            <a>|</a>
                            <a href="{{url('/outlogin')}}">退出</a>
                            <a>|</a>
                            <a href="http://www.lungflute.com/" style="color:#35d4a0;">美国官网 </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="page__title--menu">--}}
            {{--<div class="container">--}}
                {{--<nav role="navigation" class="navbar">--}}
                    {{--<div class="navbar-header">--}}
                        {{--<a href="../index.html" class="navbar-brand">--}}
                            {{--<img src="{{asset('/home/images/logo.png')}}">--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class=" navbar-collapse">--}}
                        {{--<ul class="nav navbar-nav text-left">--}}
                            {{--<li class='item product_details active'><a href="{{url('/index')}}">产品详情</a></li>--}}
                            {{--<li class='item personal_center'><a href="{{url('/personal')}}">个人中心</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</nav>--}}
            {{--</div>--}}
        {{--</div>--}}
        @yield('nav')
    </nav>
</div>

<link rel="stylesheet" type="text/css" href="{{asset('/home/sign/css/index.css')}}">
@yield('content')

<section id="footer" class="text-center" style="height:165px">
    <ul class="footer-title">
        <li><a href="../index.html" class="logo icon-77"></a></li>
        <li><a href="{{url('index')}}">首页</a></li>
        <li><a href="../goods/index.html">产品购买</a></li>
        <li><a href="../agent/index.html" >独家代理</a></li>
        <li><a href="../concat/index-1.html">联系我们</a></li>
        <li><a href="http://www.lungflute.com/" target="_blank">美国官网</a></li>
    </ul>
    <ul class="footer-icons">
        <li>
            <i data-am-popover="{content: '+86 10-5102 9797', trigger: 'hover focus'}"  href="javascript:void(0)" class="icon-tel">
            </i>
        </li>
        <li>
            <i data-am-popover="{content: 'feidi@lunghealthbiotech.com', trigger: 'hover focus'}" href="javascript:void(0)" class="icon-email">
            </i>
        </li>
        <li>
            <i data-am-popover="{content: '请点击图像', trigger: 'hover focus'}"  href="javascript:void(0)" class="icon-myqq"><span class="path1"></span><span class="path2"></span>
            </i>
        </li>
        <li>
            <i title="公众号：肺笛feidi" href="javascript:void(0)" class="icon-wechats">
                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><img src="{{asset('home/public/images/lha.jpg')}}" width='100' height="100">
            </i>
        </li>
    </ul>
    <div style="color:#fff;margin-top:30px;font-size:12px;" class="text-center">
        京ICP证17037886号
        <a href="http://qyxy.baic.gov.cn/" style="color:#fff">
            <img src="{{asset('/home/public/images/webwxgetmsgimg.png')}}" width="16" height="16">
            备案编号: 京经食药监械经营备20170029  网站声明  互联网药品信息服务资格证书(京)-非经营性-2018-0025
        </a>
    </div>
</section>
<script src="{{asset('/home/public/js/lib/jquery-1.12.3.js')}}"></script>
<script src="{{asset('/home/public/js/lib/amazeui.js')}}"></script>
<script src="{{asset('/home/public/js/lib/amazeui.min.js')}}"></script>
@yield('script')

</body>
</html>