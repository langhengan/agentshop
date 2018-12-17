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
                                <img src="{{$contract_module}}" alt="">
                            </table>

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
                        var url="{{url('admin/power/goods/del')}}"+"/"+link.attr('dele_id');
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