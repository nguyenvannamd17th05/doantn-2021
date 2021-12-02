@extends('user.app')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Cập nhật thông tin</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Cập nhật thông tin</a></li>

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
                    <div class="col-sm-12">
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group" >
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" disabled="" placeholder="Enter email" name="email" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Họ Tên</label>
                                <input type="text" class="form-control" placeholder="Họ tên" name="name" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Số điện thoại</label>
                                <input type="number" class="form-control" placeholder="Phone" name="phone" value="{{ $user->phone }}">
                            </div>

                            <div class="form-group">
                                <label for="pwd">Địa chỉ</label>
                                <input type="text" class="form-control" placeholder="Địa chỉ" name="address" value="{{ $user->address }}">
                            </div>

                            <div class="form-group">
                                <label for="pwd">Giới thiệu bản thân</label>
                                <textarea name="about" id="" cols="30" rows="5" class="form-control" placeholder="Mô tả bản thân">{{ $user->about }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection
