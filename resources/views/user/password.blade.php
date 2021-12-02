@extends('user.app')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Đổi mật khẩu</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Đổi mật khẩu</a></li>

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
                            <div class="form-group" style="position: relative">
                                <label for="email">Mật khẩu cũ:</label>
                                <input type="password" class="form-control"  placeholder="********" name="password_old" value="">
                                <a style="position: absolute;top: 54%;right: 10px;color: #333" href="javascript:;void(0)"><i class="fa fa-eye"></i></a>
                                @if($errors->has('password_old'))
                                    <span class="error-text">
                        {{$errors->first('password_old')}}
                    </span>
                                @endif
                            </div>
                            <div class="form-group" style="position: relative">
                                <label for="email">Mật khẩu mới:</label>
                                <input type="password" class="form-control"  placeholder="********" name="password" value="">
                                <a style="position: absolute;top: 54%;right: 10px;color: #333" href="javascript:;void(0)"><i class="fa fa-eye"></i></a>
                                @if($errors->has('password'))
                                    <span class="error-text">
                            {{$errors->first('password')}}
                        </span>
                                @endif
                            </div>
                            <div class="form-group" style="position: relative">
                                <label for="email">Nhập lại mật khẩu mới:</label>
                                <input type="password" class="form-control"  placeholder="********" name="password_comfirm" value="">
                                <a style="position: absolute;top: 54%;right: 10px;color: #333" href="javascript:;void(0)"><i class="fa fa-eye"></i></a>
                                @if($errors->has('password_comfirm'))
                                    <span class="error-text">
                            {{$errors->first('password_comfirm')}}
                        </span>
                                @endif
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
@section('script')
    <script>
        $(function(){
            $(".form-group a").click(function(){
                let $this = $(this);

                if ($this.hasClass('active'))
                {
                    $this.parents('.form-group').find('input').attr('type','password')
                    $this.removeClass('active');
                }else
                {
                    $this.parents('.form-group').find('input').attr('type','text')
                    $this.addClass('active')
                }
            });
        });
    </script>
@stop
