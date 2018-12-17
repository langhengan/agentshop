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
    <link rel="stylesheet" type="text/css" href="{{asset('home/personal/css/shopping_record.css')}}">
@endsection
@section('script')
    <script src="{{asset('home/public/js/common/common.js')}}"></script>
    <script src="{{asset('home/personal/js/shopping_record.js')}}"></script>
@endsection
@section('content')
    <section class="breadcrumbs">
        <div>
            <span> 首页 > </span><span> 个人中心 </span>
        </div>
    </section>

    <section id="shopping_record">
        <div class="personal">
            {{--個人中心 左側--}}
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
                        {{--<li class="active">--}}
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
                    <span>购物记录</span>
                </div>
                <div class="shopping_record">
                    <div class="record_title">
                        <div class="record_all"><a href="" class="active">全部订单</a></div>
                        <div class="record_had"><a href="">已完成订单</a></div>
                        <div class="record_none"><a href="">未完成订单</a></div>
                        {{--订单的检索--}}

                        <div class="record_search">
                            <form action="{{url('/order-record')}}" method="post">
                                {!! csrf_field() !!}
                                <div>
                                    <input type="text" placeholder="订单号" name="order_number">
                                    <span class="ex-search"></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{--个人订单信息的展示--}}
                    <div class="record_bar" data-am-sticky>
                        <div>商品数量</div>
                        <div>订单金额</div>
                        <div>联系人姓名</div>
                        <div>联系人电话</div>
                        <div>订购单位名称</div>
                    </div>
                    @foreach($order as $item)
                    <div class="record_lists">
                        <div class="record_list">
                            <div class="list_des">
                                <div><span>2000/箱</span></div>
                                <div><span>￥{{$item->sum_money}}</span></div>
                                <div><span>{{$item->realname}}</span></div>
                                <div><span>{{$item->shr_tel}}</span></div>
                                <div><span>{{$item->company_name}}</span></div>
                            </div>
                            <div class="list_bar">
                                <div class="bar_time">
                                    {{--<span>下單日期：</span>--}}
                                    <span>{{$item->order_date}}</span>
                                </div>
                                <div class="bar_num">
                                    <span>订单号：</span>
                                    <span>{{$item->order_num}}</span>
                                </div>
                                <div class="bar_situ">
                                    <span>订单状态：</span>
                                    <span>
                                        @if($item->order_status==1)
                                            已付款
                                            @else 未付款
                                        @endif
                                    </span>
                                </div>
                            </div>
                            {{--收货地址和订购合同单号--}}
                            <div class="list_address">
                                <div class="address_msg">
                                    <span>收货地址：</span>
                                    <span>{{$item->shr_address}}</span>
                                </div>
                                <div class="express_num">
                                    <span>邮寄盖章版合同快递单号：</span>
                                    <span>{{$item->courier_number}}</span>
                                    <span class="trigger_span"><a href="">邮寄盖章版合同快递号</a></span>
                                </div>
                            </div>
                        </div>
                    </div>



        <!--弹出层-->
        <div class="fade">
            <div class="succ_pop">
                <div class="chose_type">
                    <span>邮寄盖章版合同快递单号</span>
                    <span><a href="">×</a></span>
                </div>
                <form action="{{url('/postCon')}}" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" value="{{$item->id}}" name="orderId">
                    <div class="chose_case">
                        <div>
                            <div>
                                <div class="type">快递单号:</div>
                                <div class="types">
                                    <input type="text" name="courier_number"  placeholder="请输入快递单号" class="courier-number" value="">
                                </div>
                            </div>
                        </div>
                        <div><button>提交</button></div>
                    </div>
                </form>
            </div>
        </div>

                    @endforeach
                    {{--pages分頁--}}
                    <div class="page_show">
                        {{--<a href="" class="previous">上一页</a>--}}
                        {{--<a href="" class="current">1</a>--}}
                        {{--<a href="">2</a>--}}
                        {{--<a href="">3</a>--}}
                        {{--<a href="">4</a>--}}
                        {{--<a href="">5</a>--}}
                        {{--<a href="" class="next">下一页</a>--}}
                        {{ $order->appends(['order_number' =>old('order_number')])->links() }}
                    </div>
                </div>
            </div>
        </div>

    </section>



{{--@section('script')--}}
    {{--<script src="{{asset('home/public/js/common/common.js')}}"></script>--}}
    {{--<script src="{{asset('home/personal/js/shopping_record.js')}}"></script>--}}
{{--@endsection--}}
<script>
    function inputOrder(id) {
        // alert(id);
        console.log(id);
        var value = $('.courier-number').val();
        console.log(value);
    }
</script>
@endsection