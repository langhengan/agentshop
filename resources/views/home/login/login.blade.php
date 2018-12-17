<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta name="keywords" content="朗恒安、肺笛、排痰器、振动排痰器、便携排痰器、雾霾、呼吸困难、排痰、吸烟、朗弗罗、肺癌、肺结核、COPD、慢性肺部疾病、痰液标本">
    <meta name="description" content="北京朗恒安生物科技有限公司是一家专业从事进口医疗健康器械的销售与服务，并已建立了完善销售网络的医疗健康公司">
    <link rel="shortcut icon" href="{{asset('/favicon.ico')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/home/public/css/amazeui-c24a1a723c.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/home/public/css/reset-2be4611e36.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/home/public/css/animate-ebbc4d2531.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/home/public/css/base.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/home/public/css/icomoon-d0baa465fd.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/home/public/css/sprite.css')}}">
    <title>朗恒安</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/home/sign/css/reged.css')}}">
</head>
<body>
<div style="display: none" class="loading"></div>
<div id="navigation">
    <nav role="navigation" class="page__title">
        <div class="page__title--warp">
            <div class="container">
                <div class="row">
                    <div class="col-md-5"><a href="https://www.lunghealthbiotech.com"><p class="num">欢迎进入美国朗弗罗<span
                                        class="super">®</span><span>肺笛中国官网</span></p></a>
                    </div>

                </div>
            </div>
        </div>
        <div class="page__title--menu">
            <div class="container" style="width: 100%;height: 110px;background: #35d4a0; margin: 0; max-width: 100%;">

            </div>
            <section class="login--bg"></section>
            <section class="supplier-img">
                <div class="supplier-img-container"><img
                            src="{{asset('/home/images/supplier.png')}}"></div>
            </section>
            <section class="login--input">
                <div class="login--wap text-left"><h3 class="login--title">会员登录</h3>
                    <form id="jsForm" class="bl-form bl-formhor" method="post" action="{{url('/login/post')}}">
                    {!! csrf_field() !!}
                        <ul>
                            <li class="bl-form-group">
                                <span class="icon-iphon"></span><input type="text" value="" placeholder="请输入用户名"
                                                                       name="username" color="color" required
                                                                       data-rule-mobile="true" data-msg-mobile="*"
                                                                       class="input_txt_val">
                            </li>
                            <li class="bl-form-group">
                                <span class="icon-lock"></span><input type="password" value="" name="pwd" color="color"
                                                                      required minlength="6" data-msg-minlength="*"
                                                                      placeholder="请输入密码" class="input_txt_val">
                            </li>
                            <li class="bl-form-group code"><input type="text" placeholder="验证码" value="" name="code"
                                                                  color="color" required minlength="4"
                                                                  data-msg-minlength="*" maxlength="4"
                                                                  data-msg-mobile="*" class="pwd">
                                <img src="{{url('/code')}}" art="点击更换"  onClick="change(this)"/>
                            </li>
                            <li class="bl-form-group error">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul style="color:red;">
                                            @foreach ($errors->all() as $error)
                                                <li>{{  $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </li>
                        </ul>
                        <div class="btn-wap text-left">
                            <button type="submit" class="btn btn-primary btn-outline btn-lg login">登录</button>
                            <button class="btn btn-primary btn-outline btn-lg logout"><a href="{{url('/sign')}}">注册</a>
                            </button>
                            <span><a href="javascript:void(0)">忘记密码?</a></span>
                        </div>
                    </form>
                </div>
            </section>
            <section id="footer" class="text-center" style="height:165px">
                <ul class="footer-title">
                    <li><a href="./index.html" class="logo icon-77"></a></li>
                    <li><a href="./index.html">首页</a></li>
                    <li><a href="goods/index.html">产品购买</a></li>
                    <li><a href="agent/index.html">独家代理</a></li>
                    <li><a href="concat/index-1.html">联系我们</a></li>
                    <li><a href="http://www.lungflute.com/" target="_blank">美国官网</a></li>
                </ul>
                <ul class="footer-icons">
                    <li>
                        <i data-am-popover="{content: '+86 10-5102 9797', trigger: 'hover focus'}"
                           href="javascript:void(0)" class="icon-tel">
                        </i>
                    </li>
                    <li>
                        <i data-am-popover="{content: 'feidi@lunghealthbiotech.com', trigger: 'hover focus'}"
                           href="javascript:void(0)" class="icon-email">
                        </i>
                    </li>
                    <li>
                        <i data-am-popover="{content: '请点击图像', trigger: 'hover focus'}" href="javascript:void(0)"
                           class="icon-myqq"><span class="path1"></span><span class="path2"></span>
                        </i>
                    </li>
                    <li>
                        <i title="公众号：肺笛feidi" href="javascript:void(0)" class="icon-wechats">
                            <span class="path1"></span><span class="path2"></span><span class="path3"></span><span
                                    class="path4"></span><img src="{{asset('/home/public/images/lha.jpg')}}" width='100'
                                                              height="100">
                        </i>
                    </li>
                </ul>
                <div style="color:#fff;margin-top:30px;font-size:12px;" class="text-center">
                    京ICP证17037886号
                    <a href="http://qyxy.baic.gov.cn/" style="color:#fff">
                        <img src="{{asset('/home/public/images/webwxgetmsgimg.png')}}" width="16" height="16">
                        备案编号: 京经食药监械经营备20170029 网站声明 互联网药品信息服务资格证书(京)-非经营性-2018-0025
                    </a>
                </div>
            </section>
            <div id="loading__warp">
                <svg viewBox="0 0 120 120" version="1.1" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="circle" class="g-circles g-circles--v1">
                        <circle id="12" transform="translate(35, 16.698730) rotate(-30) translate(-35, -16.698730) "
                                cx="35"
                                cy="16.6987298" r="10"></circle>
                        <circle id="11" transform="translate(16.698730, 35) rotate(-60) translate(-16.698730, -35) "
                                cx="16.6987298"
                                cy="35" r="10"></circle>
                        <circle id="10" transform="translate(10, 60) rotate(-90) translate(-10, -60) " cx="10" cy="60"
                                r="10"></circle>
                        <circle id="9" transform="translate(16.698730, 85) rotate(-120) translate(-16.698730, -85) "
                                cx="16.6987298"
                                cy="85" r="10"></circle>
                        <circle id="8" transform="translate(35, 103.301270) rotate(-150) translate(-35, -103.301270) "
                                cx="35"
                                cy="103.30127" r="10"></circle>
                        <circle id="7" cx="60" cy="110" r="10"></circle>
                        <circle id="6" transform="translate(85, 103.301270) rotate(-30) translate(-85, -103.301270) "
                                cx="85"
                                cy="103.30127" r="10"></circle>
                        <circle id="5" transform="translate(103.301270, 85) rotate(-60) translate(-103.301270, -85) "
                                cx="103.30127"
                                cy="85" r="10"></circle>
                        <circle id="4" transform="translate(110, 60) rotate(-90) translate(-110, -60) " cx="110" cy="60"
                                r="10"></circle>
                        <circle id="3" transform="translate(103.301270, 35) rotate(-120) translate(-103.301270, -35) "
                                cx="103.30127" cy="35" r="10"></circle>
                        <circle id="2" transform="translate(85, 16.698730) rotate(-150) translate(-85, -16.698730) "
                                cx="85"
                                cy="16.6987298" r="10"></circle>
                        <circle id="1" cx="60" cy="10" r="10"></circle>
                    </g>
                    <use xlink:href="#circle" class="use"></use>
                </svg>
            </div>
            <script src="{{asset('/home/public/js/lib/jquery-1.12.3.js')}}"></script>
            <script src="{{asset('/home/public/js/lib/modernizr-2.6.2.min.js')}}"></script>
            <script src="{{asset('/home/public/js/lib/amazeui.js')}}"></script>
            <script src="{{asset('/home/public/js/lib/amazeui.min.js')}}"></script>
            <script src="{{asset('/home/public/js/common/common.js')}}"></script>
</body>
</html>
<script>
    function change(obj) {
        obj.src = "/code?verify=" + Math.random();
    }
</script>
