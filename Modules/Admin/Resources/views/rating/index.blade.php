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
                        <h1 class="m-0">Đánh giá sản phẩm</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Đánh giá</li>
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
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Thao tác</th>
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
                                    <td>
                                        <a class="btn btn-default" href=""><i class="fas fa-trash"></i> Xóa</a>
                                    </td>

                                </tr>


                            @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            {{ $ratings->links()}}

                        </div>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
