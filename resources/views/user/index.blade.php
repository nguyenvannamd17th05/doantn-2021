@extends('user.app')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Trang tổng quan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang tổng quan</a></li>

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
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$totalTransaction}}</h3>

                                <p>Tổng số đơn hàng</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$totalTransactionDone}}</h3>

                                <p>Đơn đã xử lý</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$totalTransaction-$totalTransactionDone}}</h3>

                                <p>Đơn chưa xử lý</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>0</h3>

                                <p>Đã hủy</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <div class="row">

                    <div class="col-sm-12">
                        <h5 style="font-family: Arial ">Danh sách đơn hàng của bạn</h5>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>

                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Tổng hóa đơn</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Ngày mua</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(isset($transactions))
                                    @foreach($transactions as $transaction)
                                        <tr>
                                            <td>{{$transaction->id}}</td>

                                            <td>{{$transaction->tr_address}}</td>
                                            <td>{{$transaction->tr_phone}}</td>
                                            <td>{{number_format($transaction->tr_total,0,',','.')}}đ</td>
                                            <td>
                                                @if($transaction->tr_status==1)
                                                    <p href="" class="badge badge-success">Đã xác nhận</p>
                                                @else
                                                    <a href="" class="badge badge-secondary">Chờ xác nhận</a>
                                                @endif
                                            </td>
                                            <td>{{$transaction->created_at->format('d-m-Y')}}</td>
                                            <td>
                                                <a class="btn btn-default js_order_item" data-id="{{$transaction->id}}" data-total="Tổng hóa đơn: {{number_format($transaction->tr_total,0,',','.') }} đ" href="{{route('admin.transaction.view',$transaction->id)}}" ><i class="fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        {{ $transactions->links()}}

                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection
