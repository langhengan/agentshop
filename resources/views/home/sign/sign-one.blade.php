@extends('home.layout.home')
@section('style')
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{asset('home/public/css/amazeui-c24a1a723c.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/public/css/reset-2be4611e36.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/public/css/animate-ebbc4d2531.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/public/css/base.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/public/css/icomoon-d0baa465fd.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/public/css/sprite.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/public/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/sign/css/login-1.css')}}">
    @endsection
@section('content')
    <section id="register">
        <div class="submission">
            <div class="reg_title text-center">
                <h3>新用户注册</h3>
            </div>
            <div class="process">
                <ul class="progressbar">
                    <li class="active">注册信息</li>
                    <li class="active">审核信息</li>
                    <li>审核进度</li>
                </ul>
            </div>
            <div class="content">
                <form action="{{url('/sign/register/store')}}" method="post" class="submsg" id="submsg" enctype="multipart/form-data" >
                    <div class="con_title">基本信息</div>
                    {!! csrf_field() !!}
                    <div class="basic">
                        <div>
                            <label for="">代理级别：</label>
                            <select name="level" id="">
                                <option value="0">请选择代理级别</option>
                                <option value="1">一级</option>
                                <option value="2">二级</option>
                                <option value="3">三级</option>
                            </select>
                            {{--<input type="text" name="level" placeholder="请输入代理级别"  required data-msg-required="请填写该字段" minlength="1" data-msg-minlength="请输入代理级别至少两位汉字">--}}
                        </div>
                        <div>
                            <label for="">代理区域：</label>
                                <select name="province" id="province"></select>
                                <select name="city" id="city"></select>
                            {{--<input type="text" name="area" placeholder="请输入代理区域"  required data-msg-required="请填写该字段" minlength="2" data-msg-minlength="请输入代理区域至少六位汉字">--}}
                        </div>
                        <div>
                            <label for="">上级代理：</label><input type="text" name="referee" placeholder="请输入上级代理人">
                        </div>
                        <div>
                            <label for="">公司地址：</label><input type="text" name="company_area" placeholder="请输入公司地址"  required data-msg-required="请填写该字段" minlength="2" data-msg-minlength="请输入公司地址至少两位汉字">
                        </div>
                        {{--<div class="get_yzm">
                            <label for="">验证码：</label><input type="text" placeholder="请输入验证码" required data-msg-required="请填写该字段" minlength="4" maxlength="4" data-msg-minlength="请输入正确的4位验证码">
                            <span>获取验证码</span>
                        </div>--}}
                    </div>

                    <div class="con_title">资质上传<span>请上传盖章扫描件</span></div>
                    <div class="qualifition">
                        <div class="picDiv">
                            <label for="">营业执照：</label>
                            <div class="addImages">
                                <input type="file" class="file" name="yingye"  accept = "image/*" required>
                                <div class="text-detail">
                                    <!--<img src="" alt="">-->
                                    <span>+</span>
                                    <p>点击上传</p>
                                </div>
                                <!--<div class="control text-center">
                                    <i class="fa fa-trash-o del"></i>
                                    <i class="fa fa-search-plus plus"></i>
                                </div>-->
                            </div>
                        </div>
                        <div class="picDiv">
                            <label for="">法人身份证：</label>
                            <div class="addImages">
                                <input type="file" class="file" name="faren" accept = "image/*" required>
                                <div class="text-detail">
                                    <span>+</span>
                                    <p>点击上传</p>
                                </div>
                            </div>
                            <span style="color:#ffaa00;position:relative;top:-70px;">* </span>
                            <span style="position:relative;top:-70px;"> 请将身份证正反面复印到一张图片上传</span>
                        </div>
                        <div class="picDiv">
                            <label for="">二类备案：</label>
                            <div class="addImages">
                                <input type="file" class="file" name="erlei" accept = "image/*"  required>
                                <div class="text-detail">
                                    <span>+</span>
                                    <p>点击上传</p>
                                </div>
                            </div>
                        </div>
                        <div class="picDiv">
                            <label for="">网络销售备案：</label>
                            <div class="addImages">
                                <input type="file" class="file" name="wangluo" accept = "image/*">
                                <div class="text-detail">
                                    <span>+</span>
                                    <p>点击上传</p>
                                </div>
                            </div>
                        </div>
                        <div class="submit text-center">
                            <input type="submit" value="提交审核">
                            {{--<button>提交审核</button>--}}
                        </div>
                    </div>   
                </form>
            </div>
        </div>
    </section>
    <!--弹出层-->
    <div class="fade text-center">
        <i class="fa fa-times-circle-o close"></i>
        <img src="" alt="">
    </div>

@endsection
@section('script')
    <script src="{{asset('home/public/js/lib/jquery-1.12.3.js')}}"></script>
    <script src="{{asset('home/public/js/lib/amazeui.js')}}"></script>
    <script src="{{asset('home/public/js/lib/amazeui.min.js')}}"></script>
    <script src="{{asset('home/public/js/common/common.js')}}"></script>
    <script src="{{asset('home/public/js/common/ajax.js')}}"></script>
    <script src="{{asset('home/sign/js/login-1.js')}}"></script>
    <script src="{{asset('home/product/js/pc.js')}}"></script>
@endsection
