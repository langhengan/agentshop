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
                        <li class='item product_details active'><a href="{{url('/index')}}">产品详情</a></li>
                        <li class='item personal_center '><a href="{{url('/personal')}}">个人中心</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('home/product/css/order_success.css')}}">
@endsection
@section('script')
    <script src="{{asset('home/public/js/lib/jquery.stellar.js')}}"></script>
    <script src="{{asset('home/public/js/lib/jquery.waypoints.js')}}"></script>
@endsection
    <!--<section class="breadcrumbs">
        <div>
            <span> 首页 > </span><span> 下单信息 </span>
        </div>
    </section>-->
@section('content')
    <section id="order_success">
        <div class="content">
            <div class="order_num">
                <div><img src="{{asset('home/images/success.png')}}" alt=""></div>
                <div><p>订单提交成功，请尽快付款！订单号： <span id="order_num">{{$randNumber}}</span></p></div>
            </div>
            <div class="order_infor">
                <div class="order_bar">
                    <div>商品名称</div>
                    <div>订单号</div>
                    <div>商品单价</div>
                    <div>商品数量</div>
                    <div>订单金额</div>
                </div>
                <div class="order_describe">
                    <div>
                        <div><img src="{{asset('home/images/holder2.png')}}" alt=""></div>
                        <div>
                            <div><span>美国 lung flute 正品 “肺笛<sup>®</sup>”  正式进入中国</span></div>
                            <div><span>购买类型：</span><span>肺笛单品</span></div>
                        </div>
                    </div>
                    <div>{{$randNumber}}</div>
                    <div style="color:#F78B00;">￥{{$value['price']}}</div>
                    <div>{{$value['number']}}/箱</div>
                    <div style="color:#F78B00;">￥{{$value['sum_money']}}元</div>
                </div>
                <div class="order_list">
                    <div>
                        <span>订购单位名称：</span><span>{{$value['company_name']}}</span>
                    </div>
                    <div>
                        <span>联系人姓名：</span><span>{{$value['shr_name']}}</span>
                    </div>
                    <div>
                        <span>联系人电话：</span><span>{{$value['shr_tel']}}</span>
                    </div>
                    <div>
                        <span>收货地址：</span><span>{{$value['shr_address']}}</span>
                    </div>
                    {{--<div>--}}
                        {{--<span>收货日期：</span><span>{{$value['collect_goods_date']}}</span>--}}
                    {{--</div>--}}
                    <div>
                        <span>订单要求：</span><span>{{$value['order_requirement']}}</span>
                    </div>
                </div>           
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{asset('home/public/js/lib/jquery-1.12.3.js')}}"></script>
    <script src="{{asset('home/public/js/lib/amazeui.js')}}"></script>
    <script src="{{asset('home/public/js/lib/amazeui.min.js')}}"></script>
    <script src="{{asset('home/public/js/common/common.js')}}"></script>
    <script src="{{asset('home/public/js/common/ajax.js')}}"></script>
@endsection