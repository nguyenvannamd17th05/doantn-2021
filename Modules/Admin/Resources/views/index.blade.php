@extends('admin::layouts.master')

@section('title')
    <title>Admin System</title>
@endsection
@section('content')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
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
                                <h3>{{$transactionByDay}}</h3>

                                <p>Đơn hàng mới</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{route('admin.transaction.index')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>

                                <p>Bounce Rate</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$userByMonth}}</h3>

                                <p>Người dùng đăng kí mới</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{route('admin.user.index')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>

                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <figure class="highcharts-figure">
                            <div id="container"></div>

                        </figure>
                    </div>
                    <div class="col-sm-8">
                        <h5 style="font-family: Arial ">Danh sách đơn hàng mới</h5>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Tổng hóa đơn</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Ngày mua</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactionNews as $transaction)
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

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                 <div class="col-sm-6">
                     <h5 style="font-family: Arial ">Danh sách liên hệ mới nhất</h5>
                     <table class="table table-bordered">
                         <thead>
                         <tr>
                             <th scope="col">#</th>
                             <th scope="col">Tiêu đề</th>
                             <th scope="col">Họ tên</th>
                             <th scope="col">Email</th>
                             <th scope="col">Nội dung</th>
                             <th scope="col">Trạng thái</th>
                         </tr>
                         </thead>
                         <tbody>
                         @foreach($contacts as $contact)
                             <tr>
                                 <td>{{ $contact->id }}</td>
                                 <td>{{ $contact->c_title }}</td>
                                 <td>{{ $contact->c_name }}</td>
                                 <td>{{ $contact->c_email }}</td>
                                 <td>{{ $contact->c_content }}</td>
                                 <td>
                                     @if ( $contact->c_status == 1)
                                         <span class="badge badge-success">Đã xử lý</span>
                                     @else
                                         <span class="badge badge-secondary">Chưa xử lý</span>
                                     @endif
                                 </td>

                             </tr>
                         @endforeach
                         </tbody>
                     </table>
                 </div>
                    <div class="col-sm-6" >
                        <h5 style="font-family: Arial">Đánh giá mới nhất</h5>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Rating</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($ratings as $rating)
                                <tr>
                                    <td>{{$rating->id}}</td>
                                    <td>{{isset($rating->user->name)? $rating->user->name:'[N\A]'}}</td>
                                    <td>{{isset($rating->product->pro_name)?$rating->product->pro_name:'[N\A]'}}</td>
                                    <td>{{$rating->ra_content}}</td>
                                    <td>{{$rating->ra_number}} <i class="fa fa-star " style="color: #ff9075"></i></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script>
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Biểu đồ doanh thu ngày và tháng'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Tổng doanh thu'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        formatter: function () {
                            return Highcharts.numberFormat(this.y, 0, ',', '.') +' VNĐ';
                        }
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f} VNĐ</b> đã bán<br/>'
            },

            series: [
                {
                    name: "Số tiền",
                    colorByPoint: true,
                    data: [
                        {
                            name: "Doanh thu ngày",
                            y: {{$moneyByDay}},
                            drilldown: "Doanh thu ngày",

                        },
                        {
                            name: "Doanh thu tháng",
                            y: {{$moneyByMonth}},
                            drilldown: "Doanh thu tháng "
                        },


                    ]
                }
            ],

        });
    </script>
@endsection
