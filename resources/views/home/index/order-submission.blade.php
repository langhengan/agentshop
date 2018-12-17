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
    <link rel="stylesheet" type="text/css" href="{{asset('home/public/css/breadcrumbs.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/product/css/order_submission.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('home/public/jeDate/test/jeDate-test.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('home/public/jeDate/skin/jedate.css')}}">

@endsection
@section('content')
    <section class="breadcrumbs">
        <div>
            <span> 首页 > </span><span> 下单信息 </span>
        </div>
    </section>

    <section id="order_submission">
        <div class="content">
            <form action="{{url('/cart')}}" class="sub_msg" method="post">
                {!! csrf_field() !!}
                <input type="hidden" name="price" value="{{$goodsPrice}}">
                <div class="sub_title">
                    <div>请填写您的下单信息</div>
                </div>
                <div class="sub_bar">
                    <div>商品名称</div>
                    <div>商品单价</div>
                    <div>商品数量</div>
                    <div>订单金额</div>
                </div>
                <div class="sub_describe">
                    <div>
                        <div>
                            @if($image==null)
                           <img src="{{asset('home/public/images/product.png')}}">
                            @else
                            <img src="{{$image}}" alt="">
                            @endif
                        </div>
                        <div>
                            <div><span>美国 lung flute 正品 “肺笛<sup>®</sup>”  正式进入中国</span></div>
                            <div><span>购买类型：</span><span>肺笛单品</span></div>
                        </div>
                    </div>
                    <div style="color:#F78B00;" class="price" data-price="{{$goodsPrice}}"></div>
                    <div>
                        <a class="reduce">-</a><input type="text" value="1" name="number" class="text-center count_input" readonly="readonly"><a class="plus">+</a>
                        @if ($errors->has('number'))
                            <small style="color:red;">{{$errors->first('number')}}</small>
                        @endif
                    </div>
                    <div class="total_price"><span>￥<input type="text" value="2880"  name="sum_money" readonly="readonly" class="text-center total_input"></span></div>
                </div>
                <div class="sub_list">
                    <div><label for="">订购单位名称：</label><input type="text" name="company_name"></div>
                    <div><label for="">联系人姓名：</label><input type="text" id="shr_name" name="shr_name"></div>
                    <div><label for="">联系人电话：</label><input type="text" name="shr_tel"></div>
                    <div>
                        <label for="">收货地区：</label>
                        <select name="shr_province" id="province"></select>
                        <select name="shr_city" id="city"></select>
                    </div>
                    <div><label for="">详细地址：</label><input type="text" name="shr_address" value="" id="address"></div>
                    <div>
                        <label for="">收货日期：</label>
                        {{--<input type="date" name="collect_goods_date">--}}
                        <input type="text" class="jeinput" id="testblue" placeholder="年-月-日">
                        <!--<select name="" id="year"></select>年
                        <select name="" id="month"></select>月
                        <select name="" id="date"></select>日-->
                    </div>
                    <div>
                        <label for="">订单要求：</label>
                        <textarea name="order_requirement"></textarea>
                    </div>
                </div>
                <div class="total">
                    <div class="total_count">
                        <span>金额小计： </span>
                        <span class="total_money">￥2880.00</span>
                    </div>
                    <div class="discount">
                        <span>优惠金额： </span>
                        <span>￥
                            <input type="text" name="deleazePrice" class="text-center discount_price">
                        </span>
                    </div>
                    <div class="should_pay">
                        <span>实付金额： </span>
                        <span class="bottom_price">￥2880.00</span>
                    </div>
                    <div class="address">
                        <span>寄送至： </span>
                        <span class="address_detail"></span>
                        <span>收货人： </span>
                        <span class="address_name"></span>
                    </div>
                </div>

            <div class="order_sub text-right">
                <button style="width: 150px;height: 35px; background:  #FFAA00;border:1px solid #ccc;color: #fff;font-weight: 600;">提交订单</button>
            </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{asset('home/public/js/lib/jquery-1.12.3.js')}}"></script>
    <script src="{{asset('home/public/js/lib/amazeui.js')}}"></script>
    <script src="{{asset('home/public/js/lib/amazeui.min.js')}}"></script>
    <script src="{{asset('home/public/js/common/ajax.js')}}"></script>
    <script src="{{asset('home/public/js/common/common.js')}}"></script>
    <script src="{{asset('home/product/js/pc.js')}}"></script>
    <script src="{{asset('home/product/js/cart.js')}}"></script>
    <script src="{{asset('home/product/js/order_submission.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/public/jeDate/src/jedate.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/public/jeDate/test/demo.js')}}"></script>
    <script>
        $('#shr_name').change(function () {
            var shrName =$('#shr_name').val();
            $('.address_name').html(shrName);
        });
        $("#address").keyup(function(){
            var add = $('#address').val();
            $('.address_detail').html(add);
        });
    </script>
@endsection