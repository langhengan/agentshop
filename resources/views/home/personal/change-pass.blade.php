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
    <link rel="stylesheet" type="text/css" href="{{asset('home/personal/css/change_pass.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/public/css/breadcrumbs.css')}}">
@endsection
@section('content')
    <section class="breadcrumbs">
        <div>
            <span> 首页 > </span><span> 个人中心 </span>
        </div>
    </section>

    <section id="change_pass">
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
            {{--<li class="active">--}}
            {{--<i class="icon-password"></i>--}}
            {{--<a href="{{url('/update-pass')}}">修改密码</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<i class="icon-sign"></i>--}}
            {{--<a href="{{url('/order-record')}}">我的订单</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<i class="fa fa-cloud-download"></i>--}}
            {{--<a href="{{url('/download')}}">模板下载</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--</div>--}}
            <div class="personal_right">
                <div class="personal_bar">
                    <span>修改密码</span>
                </div>
                <div class="change_content">
                    <form action="{{url('/passEdit')}}" method="post" class="change_pass">
                        {!! csrf_field() !!}
                        <div class="old_pass">
                            <label for="">旧密码：</label><input type="password" name="password" placeholder="请输入旧密码">
                        </div>
                        <div class="new_pass">
                            <label for="">新密码：</label><input type="password" name="passwordnew1" placeholder="请输入新密码">
                            <span>密码由8-16位数字、字母、下划线组成</span>
                        </div>
                        <div class="sure_pass">
                            <label for="">确认密码：</label><input type="password" name="passwordnew2" placeholder="请再次输入密码">
                            <span>请保证两次输入密码一致</span>
                        </div>
                        <div class="yanzheng_code">
                            @if($phone=$adminModel->phone)
                                <label for="">手机验证码：</label><input type="text" id="code" placeholder="验证码" name="code" style="width: 215px" data-phone="{{$phone}}"><button class="codePhone" style="background: #ffaa00;width: 100px;height: 40px;border-radius: 4px; border: none; color: #FFF; margin: 50px 0;">发送验证码</button>
                            @endif
                        </div>
                        <div class="sub_pass text-center">
                            {{--<button>确认</button>--}}

                            <input type="submit" value="确认" class="submit" style="background: #ffaa00;width: 140px;height: 40px;border-radius: 4px;color: #FFF;">
                        </div>
                    </form>
                    <div class="text-center">旧密码输入错误，请重新输入</div>
                </div>
            </div>
        </div>
    </section>

@section('script')
    <script src="{{asset('home/public/js/common/common.js')}}"></script>
    <script>

        $(".codePhone").click(function(e){
            //清楚默认事件 因为界面有两个button所以被点击的时候都会触发
            e.preventDefault();
            $.ajax({
                url:'/classifyCode',
                type:'POST',
                data:{ '_token':'{{csrf_token()}}',
                    'phone':$("#code").data('phone'),},
                success:function(data){
                    console.log(data.data);
                }
            });
        });
    </script>
@endsection
@endsection
