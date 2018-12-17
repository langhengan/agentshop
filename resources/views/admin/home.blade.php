@extends('admin.layouts.app')

@section('content')
<div class="tpl-content-wrapper">
    <div class="tpl-content-page-title">

    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-home">首页</a></li>
        <li><a href="#">分类</a></li>
        <li class="am-active">内容</li>
    </ol>
    <div class="tpl-content-scope">
        <div class="note note-info">
            <h3>自定义</h3>
            <div></div>
        </div>
    </div>


    </div>

@endsection
@section('script')
    <script src="{{asset('back/js/echarts.min.js')}}"></script>
@endsection