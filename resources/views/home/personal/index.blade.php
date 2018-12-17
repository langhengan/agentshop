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
    <link rel="stylesheet" type="text/css" href="{{asset('home/public/css/breadcrumbs.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/personal/css/personal_center.css')}}">
@endsection
@section('script')
    <script src="{{asset('home/public/js/common/common.js')}}"></script>
    <script src="{{asset('home/personal/js/msg_modify.js')}}"></script>
    <script>
    var lis = $('#menu>li');
    lis.on('click',function(){
    $(this).addClass('active');
    $(this).siblings().remove('active');
    })
    </script>
@endsection
@section('content')
    <section class="breadcrumbs">
        <div>
            <span> 首页 > </span><span> 个人中心 </span>
        </div>
    </section>

    <section id="personal_center">
        <div class="personal">
            @include('home.layout.personal')
            {{--<div class="personal_left">--}}
                {{--<div>--}}
                    {{--<img src="{{asset('home/images/user.png')}}" alt="">--}}
                    {{--<p>北京中科生仪</p>--}}
                {{--</div>--}}
                {{--<div>--}}
                    {{--<ul id="menu">--}}
                        {{--<li class="active">--}}
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
                        {{--<li>--}}
                            {{--<i class="fa fa-cloud-download"></i>--}}
                            {{--<a href="{{url('/download')}}">模板下载</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="personal_right">
                <div class="personal_bar">
                    <span>个人资料</span>
                    <span class="change_msg"><u>修改资料</u></span>
                </div>
                <div class="personal_msg am_active">
                    <div class="word_show">
                        <div>联系人:</div>
                        <div>{{$personalArr->realname}}</div>
                    </div>
                    <div class="word_show">
                        <div>联系电话</div>
                        <div>{{$personalArr->phone}}</div>
                    </div>
                    <div class="word_show">
                        <div>代理级别</div>
                        <div>{{$personalArr->level}}</div>
                    </div>
                    <div class="word_show">
                        <div>代理区域</div>
                        <div>{{$personalArr->province}}</div>
                    </div>
                    <div class="word_show">
                        <div>上级代理人</div>
                        <div>{{$personalArr->referee}}</div>
                    </div>
                    <div class="word_show">
                        <div>公司地址</div>
                        <div>{{$personalArr->company_address}}</div>
                    </div>
                    <div class="img_show">
                        <div>营业执照</div>
                        @if($personalArr)
                            <div><img src="{{$personalArr->business_license}}" alt=""></div>
                        @else
                            <div><img src="{{asset('home/images/holder.png')}}" alt=""></div>
                        @endif
                    </div>
                    <div class="img_show">
                        <div>法人身份证信息</div>
                        @if($personalArr)
                            <div><img src="{{$personalArr->corporate_identity_card_info}}" alt=""></div>
                        @else
                            <div><img src="{{asset('home/images/holder.png')}}" alt=""></div>
                        @endif
                    </div>
                    <div class="img_show">
                        <div>二维备案</div>
                        @if($personalArr)
                            <div><img src="{{$personalArr->second_record}}" alt=""></div>
                        @else
                            <div><img src="{{asset('home/images/holder.png')}}" alt=""></div>
                        @endif
                    </div>
                    <div class="img_show">
                        <div>网络销售备案</div>
                        @if($personalArr)
                            <div><img src="{{$personalArr->network_sales_pic}}" alt=""></div>
                        @else
                            <div><img src="{{asset('home/images/holder.png')}}" alt=""></div>
                        @endif
                    </div>
                </div>
                <div class="msg_modify am_hidden">
                    <form action="{{url('/personal-update')}}" method="post">
                        {!! csrf_field() !!}
                        <input type="hidden" value="{{$personalArr->admin_id}}" name="id">
                        <div class="sub_word">
                            <div>联系人</div>
                            <input type="text" name="realname" value="{{$personalArr->realname}}" required  minlength="2"  pattern="^[\u4e00-\u9fa5]{2,}$">
                        </div>
                        <div class="sub_word">
                            <div>联系电话</div>
                            <input type="text" name="phone" value="{{$personalArr->phone}}" required pattern="^1((3|5|8){1}\d{1}|70)\d{8}$">
                        </div>
                        <div class="sub_word">
                            <div>代理级别</div>
                            <div>{{$personalArr->level}}</div>
                        </div>
                        <div class="sub_word">
                            <div>代理区域</div>
                            <div>{{$personalArr->province}}</div>
                        </div>
                        <div class="sub_word">
                            <div>上级代理人</div>
                            <input type="text" name="referee"  value="{{$personalArr->referee}}">
                        </div>
                        <div class="sub_word">
                            <div>公司地址</div>
                            <input type="text" name="company_address" value="{{$personalArr->company_address}}" required minlength="2">
                        </div>
                        <div class="sub_img">
                            <div>营业执照</div>
                            <div class="img_con" >
                                <!--<div class="add_img text-center">
                                    <span class="">+</span>
                                    <input type="file" class="file" accept="image/*">
                                    <img src="" alt="">
                                    <i class="fa fa-times-circle"></i>
                                </div>-->
                                @if($personalArr)
                                    <div><img src="{{$personalArr->business_license}}" name="" style="height: 49px;width: 45px;" alt=""></div>
                                @else
                                    <div><img src="{{asset('home/images/holder.png')}}" alt=""></div>
                                @endif
                                {{--<i class="fa fa-times-circle"></i>--}}
                            </div>
                        </div>
                        <div class="sub_img">
                            <div>法人身份证信息</div>
                            <div class="img_con">
                                @if($personalArr)
                                    <div><img src="{{$personalArr->corporate_identity_card_info}}" style="height: 49px;width: 45px;" alt=""></div>
                                @else
                                    <div><img src="{{asset('home/images/holder.png')}}" alt=""></div>
                                @endif
                                {{--<i class="fa fa-times-circle"></i>--}}
                            </div>
                        </div>
                        <div class="sub_img">
                            <div>二维备案</div>
                            <div class="img_con">
                                @if($personalArr)
                                    <div><img src="{{$personalArr->second_record}}" style="height: 49px;width: 45px;" alt=""></div>
                                @else
                                    <div><img src="{{asset('home/images/holder.png')}}" alt=""></div>
                                @endif
                                {{--<i class="fa fa-times-circle"></i>--}}
                            </div>
                        </div>
                        <div class="sub_img">
                            <div>网络销售备案</div>
                            <div class="img_con">
                                @if($personalArr)
                                    <div><img src="{{$personalArr->network_sales_pic}}" style="height: 49px;width: 45px;" alt=""></div>
                                @else
                                    <div><img src="{{asset('home/images/holder.png')}}" alt=""></div>
                                @endif
                                {{--<i class="fa fa-times-circle"></i>--}}
                            </div>
                        </div>
                        <div class="text-center">
                            <button>提交</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--弹出层-->
    <div class="fade text-center am_hidden">
        <i class="fa fa-times-circle-o close"></i>
        <img src="" alt="">       
    </div>


@section('script')

    {{--<script>--}}
        {{--var lis = $('#menu>li');--}}
        {{--lis.on('click',function(){--}}
            {{--$(this).addClass('active');--}}
            {{--$(this).siblings().remove('active');--}}
        {{--})--}}
    {{--</script>--}}
@endsection
@endsection