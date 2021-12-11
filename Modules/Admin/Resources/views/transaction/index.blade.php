@extends('admin::layouts.master')

@section('title')
    <title>Admin System</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Đơn hàng</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Đơn hàng</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Tổng hóa đơn</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Ngày mua</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                    <td>{{$transaction->id}}</td>
                                    <td>{{isset($transaction->user->name)?$transaction->user->name:'[N\A]'}}</td>
                                    <td>{{$transaction->tr_address}}</td>
                                    <td>{{$transaction->tr_phone}}</td>
                                    <td>{{number_format($transaction->tr_total,0,',','.')}}đ</td>
                                    <td>
                                        @if($transaction->tr_status==1)
                                            <p href="" class="badge badge-success">Đã xác nhận</p>
                                        @else
                                            <a href="{{route('admin.transaction.active',$transaction->id)}}" class="badge badge-secondary">Chờ xác nhận</a>
                                        @endif
                                    </td>
                                    <td>{{$transaction->created_at->format('d-m-Y')}}</td>
                                    <td>
                                        <a class="btn btn-default" href="{{route('admin.transaction.action',['delete',$transaction->id])}}" ><i class="fas fa-trash"></i> Xóa</a>
                                        <a class="btn btn-default js_order_item" data-id="{{$transaction->id}}" data-total="Tổng hóa đơn: {{number_format($transaction->tr_total,0,',','.') }} đ" href="{{route('admin.transaction.view',$transaction->id)}}" ><i class="fas fa-eye"></i></a>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            {{ $transactions->links()}}

                        </div>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

    <!-- Modal -->
    <div class="modal" id="myOrderModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title">Chi tiết hóa đơn mã #<b class="transaction_id"></b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="md_content">

                </div>
                <div class="modal-footer">
                    <h5 class="transaction_total"></h5>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function (){
            $(".js_order_item").click(function (event){
                event.preventDefault()
                let $this=$(this);
                let url=$this.attr('href');
                $("#md_content").html('')

                $(".transaction_id").text('').text($this.attr('data-id'));
                $(".transaction_total").text($this.attr('data-total'));
                $("#myOrderModal").modal('show');
                $.ajax({
                    url: url,
                }).done(function(result) {
                    if (result)
                    {
                        $("#md_content").append(result);
                    }
                });
            });
        })
    </script>
@endsection
