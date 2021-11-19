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
                        <h1 class="m-0">Thành viên</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Liên hệ</li>
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
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Họ tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col" width="10%">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $stt++ }}</td>
                                    <td>{{ $contact->c_title }}</td>
                                    <td>{{ $contact->c_name }}</td>
                                    <td>{{ $contact->c_email }}</td>
                                    <td>{{ $contact->c_content }}</td>
                                    <td>
                                        @if ( $contact->c_status == 1)
                                            <span class="label label-success">Đã xử lý</span>
                                        @else
                                            <span class="label label-default">Chưa xử lý</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn_customer_action" href="{{ route('admin.action.contact',['status',$contact->id]) }}"><i class="fas fa-pen" ></i> Cập nhật</a>
                                    </td>
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
