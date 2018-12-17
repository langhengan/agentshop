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
                    <div class="am-u-sm-12 am-u-md-6">
                        <div class="am-btn-toolbar">
                            <a href="{{url('admin/power/allModule/add')}}">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    {{--检索框--}}
                    <div class="am-u-sm-12 am-u-md-3" style="text-align: right;">
                        <form method="post" action="">
                            @csrf
                        <div class="am-input-group am-input-group-sm">
                            <input type="text" name="title" value="{{old('title')}}" class="am-form-field" placeholder="商品名">
                            <span class="am-input-group-btn">
                            <button class="am-btn  am-btn-default am-btn-success tpl-am-btn-success am-icon-search" type="submit"></button>
                        </span>
                        </div>
                        </form>
                    </div>


                </div>
                <div class="am-g">
                    <div class="am-u-sm-12">
                        <form class="am-form">
                            <table class="am-table am-table-striped am-table-hover table-font">
                                <thead>
                                <tr>
                                    <th class="table-check"><input type="checkbox" class="tpl-table-fz-check"></th>
                                    <th>ID</th>
                                    <th>模板名</th>
                                    {{--<th>订购合同</th>--}}
                                    {{--<th>商品的价格</th>--}}
                                    {{--<th>订购合同模板</th>--}}
                                    {{--<th>订购合同模板</th>--}}
                                    <th>创建日期</th>
                                    <th>更新日期</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody id="form-btn">
                                @foreach($module as $item)
                                    <tr class="btn-add">
                                        <td><input type="checkbox"></td>
                                        <td>{{$item->id}}</td>
                                        <td><a href="{{url('admin/power/allModule/proto-module-common',['id'=>$item->id])}}">{{$item->module_name}}</a> </td>
                                        {{--<td><a href="{{url('admin/power/allModule/proto-module',['id'=>$item->id])}}">模板合同</a></td>--}}
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->updated_at}}</td>
                                        <td>
                                            <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <button type="button" onclick="location.href='{{url('admin/power/allModule/add',['id'=>$item->id])}}'" class="am-btn am-btn-default am-btn-warning"><span class="am-icon-archive"></span>编辑</button>
                                                <button type="button" id="delete_handle_{{$item->id}}" dele_id="{{$item->id}}" class="btn_delete am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span>删除</button>
                                            </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="am-cf">
                                <div class="am-fr">
                                    {{--{{ $module->appends(['title' =>old('title')])->links() }}--}}
                                </div>
                            </div>
                            <hr>

                        </form>
                    </div>

                </div>
            </div>
            <div class="tpl-alert"></div>
        </div>

        <div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm">
            <div class="am-modal-dialog">
                <div class="am-modal-hd">Amaze UI</div>
                <div class="am-modal-bd">
                    你，确定要删除这条记录吗？
                </div>
                <div class="am-modal-footer">
                    <span class="am-modal-btn" data-am-modal-cancel>取消</span>
                    <span class="am-modal-btn" data-am-modal-confirm>确定</span>
                </div>
            </div>
        </div>
@endsection
@section('script')
    <script>
        $(function() {
            $('.btn_delete').on('click', function() {
                var _self=$(this);
                $('#my-confirm').modal({
                    relatedTarget: _self,
                    onConfirm: function(options) {
                       // console.log(this);
                        var link = this.relatedTarget;
                        console.log(link);
                        // var msg = link.length ? '你要删除的链接 ID 为 ' + link.data('id') :
                        //     '确定了，但不知道要整哪样';
                        // alert(link.attr('dele_id'));
                        var url="{{url('admin/power/allModule/del')}}"+"/"+link.attr('dele_id');
                        window.location.href=url;
                    },
                    // closeOnConfirm: false,
                    onCancel: function() {
                        alert('算求，不弄了');
                    }
                });
            });
        }());
    </script>

@endsection