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
                        {{--<div class="am-btn-toolbar">--}}
                            {{--<a href="{{url('admin/power/user/create')}}">--}}
                                {{--<div class="am-btn-group am-btn-group-xs">--}}
                                    {{--<button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</button>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    </div>
                    {{--检索框--}}
                    <div class="am-u-sm-12 am-u-md-3" style="text-align: right;">
                        <form method="post" action="">
                            @csrf
                        <div class="am-input-group am-input-group-sm">
                            <input type="text" name="order_num" value="{{old('order_num')}}" class="am-form-field" placeholder="订单号">
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
                                    {{--<th>序号</th>--}}
                                    <th>客户的名称</th>
                                    <th>订单号</th>
                                    <th>发票的抬头</th>
                                    <th>明细</th>
                                    <th>发票的类型</th>
                                    <th>数量</th>
                                    <th>总价格</th>
                                    <th>是否开具发票</th>
                                    {{--<th>创建日期</th>--}}
                                    {{--<th>更新日期</th>--}}
                                    {{--<th>状态</th>--}}
                                    {{--<th>操作</th>--}}
                                </tr>
                                </thead>
                                <tbody id="form-btn">
                                @foreach($list as $item)
                                    <tr class="btn-add">
                                        <td><input type="checkbox"></td>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->company_name}}</td>
                                        <td>{{$item->order_num}}</td>
                                        <td>{{$item->boill_title}}</td>
                                        <td>{{$item->boill_content}}</td>
                                        <td>
                                            {{--{{$item->boill_type}}--}}
                                            @if($item->boill_type==0)普票
                                                @else专票
                                            @endif
                                        </td>
                                        <td>{{$item->number}}</td>
                                        <td>{{$item->sum_money}}</td>
                                        <td>
                                            {{--{{$item->boill_status}}--}}
                                            @if($item->boill_status==0)未开发票
                                                @else 已开发票
                                                @endif
                                        </td>
                                        {{--<td>{{$item->created_at}}</td>--}}
                                        {{--<td>{{$item->updated_at}}</td>--}}
                                        {{--<td>--}}
                                            {{--<div class="am-btn-toolbar">--}}
                                            {{--<div class="am-btn-group am-btn-group-xs">--}}
                                                {{--@if($item->check_status==0)--}}
                                                {{--<button type="button" onclick="location.href='{{url('admin/power/admin/authorizat',['admin_id'=>$item->admin_id])}}'" class="am-btn am-btn-default am-btn-warning"><span class="am-icon-archive"></span>未授权</button>--}}
                                                {{--@elseif($item->check_status==1)--}}
                                                    {{--<button type="button" style="background-color: limegreen;color: #fff; border-color: #ea6e0c;  border: 1px solid;height: 30px; width: 76px;">已授权</button>--}}
                                                {{--@else--}}
                                                    {{--<button style="background-color: #dd514c;color: #fff; border-color: #ea6e0c;  border: 1px solid;height: 30px; width: 76px;">授权失败</button>--}}
                                                {{--@endif--}}
                                                {{--<button type="button" id="delete_handle_{{$item->id}}" dele_id="{{$item->id}}" class="btn_delete am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span>已审核</button>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</td>--}}
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <div class="am-cf">
                                <div class="am-fr">
                                    {{ $list->appends(['order_num' =>old('order_num')])->links() }}
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
                console.log('11111');
                // alert('12');
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
                        var url="{{url('admin/power/user/delete')}}"+"/"+link.attr('dele_id');
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