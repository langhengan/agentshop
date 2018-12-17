@extends('admin.layouts.app')
@section('style')
    <style>
        th{text-align: center}
        td{text-align: center}
        .table-font{
            font-size: 1.4rem;
            padding: .5rem;
        }
    </style>
@endsection
@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">

        </div>
        <ol class="am-breadcrumb">
            <li><a href="#" class="am-icon-home">首页</a></li>
            <li><a href="#">分类</a></li>
            <li class="am-active">内容</li>
        </ol>

        <div class="tpl-portlet-components">
            <div class="portlet-title">
                <div class="caption font-green bold">
                    管理员<span class="am-icon-code"></span> 列表
                </div>
            </div>
            <div class="tpl-block">

                <div class="am-g">
                    <div class="am-u-sm-12">
                        <form class="am-form">
                            <table class="am-table am-table-striped am-table-hover table-font">
                                {{--@php(echo $agent_proto_module)@endphp--}}
                                <img src="{{$agent_proto_module}}" alt="">
                            </table>

                            <hr>

                        </form>
                    </div>
                </div>
            </div>
            <div class="tpl-alert"></div>
        </div>

@endsection
@section('script')


@endsection