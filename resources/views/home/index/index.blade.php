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
    <link rel="stylesheet" type="text/css" href="{{asset('home/public/css/amazeui-c24a1a723c.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/public/css/reset-2be4611e36.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/public/css/animate-ebbc4d2531.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/public/css/base.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/public/css/icomoon-d0baa465fd.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/public/css/sprite.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('home/product/css/show.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/public/css/lanrenzhijia.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/public/css/breadcrumbs.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
 @endsection
@section('content')

    <section class="breadcrumbs">
        <div>
            <span> 首页 > </span><span> 产品介绍 </span>
        </div>
    </section>

    <section id="product_show" class="container clear">

        <div class="row">
            <form action="{{url('cart/store')}}" method="post">
                <div class="product_show_left">
                    <div class="lanrenzhijia"><!-- 大图begin -->
                        <div id="preview" class="spec-preview">
                            <span class="jqzoom">
                                <img  id="mImg" src="{{asset('home/upload/2017-12-19/5a38a9cf63e79small.jpg')}}" height="400" width="400">
                                <div id="mask"></div>
                                <div id="superMask"></div>
                            </span>
                        </div>
                        <div id="largeDiv"></div>
                        <!-- 大图end -->
                        <!-- 缩略图begin -->
                        <div class="spec-scroll">
                            <a class="prev">
                                <img src="{{asset('home/images/left.png')}}" alt="">
                            </a>
                            <a class="next">
                                <img src="{{asset('home/images/right.png')}}" alt="">
                            </a>
                            <div class="items">
                                <ul>
                                    <li><img src="{{asset('home/uploads/2017-10-25/896150484816895997.png')}}">
                                    </li>
                                    <li><img src="{{asset('home/upload/2017-12-19/5a38a9cf63e79small.jpg')}}">
                                    </li>
                                    <li><img src="{{asset('home/upload/2017-12-19/5a38acd4070desmall.png')}}">
                                    </li>
                                    <li><img src="{{asset('home/upload/2017-12-19/5a38ad17df21dsmall.png')}}">
                                    </li>
                                    <li><img src="{{asset('home/upload/2017-12-19/5a38ad5dc7718small.png')}}">
                                    </li>                           
                                 </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product_show_right text-left">
                    @foreach($goodsList as $goods)
                    <div class="product_show__title">
                        <span class="blow">{{$goods->title}}</span><br/>
                        <span class="sub_title">松动分泌物、呼吸正压（PEP）器械、支气管卫生疗法</span>
                    </div>
                    {{csrf_field()}}
                    <div class="product_show__num--warp clear">
                        <div class="product_show__price">
                            <span class="title">价格:</span>
                            <span class="price">￥{{$goods->price}}</span>
                        </div>
                        {{--<div class="product_show__all text-center">
                            <span>累计售出</span>
                            <span style="color:#35d4a0;font-size:16px;">99+</span>
                        </div>--}}
                    </div>
                    <div class="product_show__type--warp">
                        <span class="title">购买类型:</span>
                        <a data-price="{{$goods->price}}" data-productid="{{$goods->type}}" data-goodsid="{{$goods->goodsid}}" class="btn btn-primary btn-lg active">肺笛</a>
                        {{--<a  data-price="2880.00" data-productid="2" data-goodsid="2" class="btn btn-primary btn-lg">健康呼吸系统</a>--}}
                    </div>
                    @endforeach
                    <div id="product_show__buy" class="product_show__buy--warp">
                        <span class="title">购买数量:</span>
                        <div class="num__warp text-center">
                            <span class="allNum">1</span>
                            <a class="plus">+</a><a class="reduce">-</a></div>
                    </div>
                    <div class="product_show__add" data-num='1'>
                        <a href="{{url('/cart',['goodsPrice'=>$goods->price])}}" class="btn btn-primary btn-lg"> 加入订货单 </a>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section id="product_introduce">
        <div class="product_intro">
            <div class="intro_bar">
                <div class="intro">产品详情</div>
            </div>
            <div class="intro_img">
                <!--<img src="{{asset('home')}}/images/product1.png" alt="">-->
            </div>
            <div class="recommend">
                <div class="recommendation">
                    <span>掌柜推荐</span><br/>
                    <span>Recommendation</span>
                </div>
            </div>
            <div class="agent">
                <img src="{{asset('home/images/agent.jpg')}}" alt="">
            </div>
            <div class="word_details">
                <div class="bar_details">
                    <span>商品信息</span>
                </div>
                <div class="content_details">
                    <p><span>商品名称：</span>朗弗罗<sup>®</sup>肺笛</p>
                    <p><span>材&emsp;&emsp;质：</span>产品采用美国药典中的第六类医用材料</p>
                    <p><span>尺&emsp;&emsp;寸：</span>360mm*46mm*24mm（产品尺寸）</p>
                    <p><span></span>400mm*100mm*50mm（包装尺寸）</p>
                    <p><span>备&emsp;&emsp;注：</span>由于长时间的使用会使哨片老化，进而影响声波频率，故需要两周更换一次哨片</p>
                </div>
            </div>
            <div class="word_details">
                <div class="bar_details">
                    <span>注意事项</span>
                </div>
                <div class="content_details">
                    <p>1、请不要试图使用排痰器吸气。</p>
                    <p>2、出于卫生考虑，确保您的排痰器仅供您个人使用。</p>
                    <p>3、建议每天使用两次，早上一次，下午或晚上一次。</p>
                    <p>4、建议每次使用完成20组练习，每组练习吹两下。</p>
                    <p>注意：排痰器是促使痰液排除的器具，不是痰液收集的装置，不要将痰液吐入排痰器。</p>
                </div>
            </div>
        </div>
    </section>
@endsection
    @section('script')
    <script src="{{asset('home/public/js/lib/jquery-1.12.3.js')}}"></script>
    <script src="{{asset('home/public/js/lib/amazeui.js')}}"></script>
    <script src="{{asset('home/public/js/lib/amazeui.min.js')}}"></script>
    <script src="{{asset('home/public/js/common/ajax.js')}}"></script>
    <script src="{{asset('home/public/js/common/common.js')}}"></script>
    <script src="{{asset('home/product/js/show.js')}}"></script>
    <script src="{{asset('home/product/js/cart.js')}}"></script>
@endsection