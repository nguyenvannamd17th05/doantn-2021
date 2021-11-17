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
                        <h1 class="m-0">Slider</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Slider</li>
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
                        <a href="{{route('admin.slider.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên slider</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            @if(isset($categories))--}}
{{--                                @foreach($categories as $category)--}}
{{--                                <tr>--}}
{{--                                    <th scope="row">{{$category->id}}</th>--}}
{{--                                    <td>{{$category->c_name}}</td>--}}
{{--                                    <td>{{$category->c_title_seo}}</td>--}}
{{--                                    <td>--}}
{{--                                    <a class="badge {{$category->getStatus($category->c_active)['class']}}" href="{{route('admin.cate.action',['active',$category->id])}}">{{$category->getStatus($category->c_active)['name']}}</a>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}

{{--                                        <a class="btn btn-default" href="{{route('admin.cate.edit',$category->id)}}" ><i class="fas fa-pen" ></i> Edit</a>--}}
{{--                                        <a class="btn btn-default" href="{{route('admin.cate.action',['delete',$category->id])}}" ><i class="fas fa-trash-alt"></i> Delete</a>--}}

{{--                                </tr>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
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
