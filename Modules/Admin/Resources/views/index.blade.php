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
                 <div class="col-sm-6">
                     <h5>Liên hệ mới nhất</h5>
                     <table class="table">
                         <thead>
                         <tr>
                             <th scope="col">#</th>
                             <th scope="col">First</th>
                             <th scope="col">Last</th>
                             <th scope="col">Handle</th>
                         </tr>
                         </thead>
                         <tbody>
                         <tr>
                             <th scope="row">1</th>
                             <td>Mark</td>
                             <td>Otto</td>
                             <td>@mdo</td>
                         </tr>
                         <tr>
                             <th scope="row">2</th>
                             <td>Jacob</td>
                             <td>Thornton</td>
                             <td>@fat</td>
                         </tr>
                         <tr>
                             <th scope="row">3</th>
                             <td>Larry</td>
                             <td>the Bird</td>
                             <td>@twitter</td>
                         </tr>
                         </tbody>
                     </table>
                 </div>

                    <div class="col-sm-6">


                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
