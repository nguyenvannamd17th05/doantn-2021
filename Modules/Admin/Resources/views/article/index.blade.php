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
                    <div class="col-sm-4">
                        <h1 class="m-0">Bài viết</h1>
                    </div><!-- /.col -->

                        <div class="col-sm-4">
                            <form class="form-inline" action="">

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Tên bài viết" value="{{\Request::get('name')}}"  name="name">
                                </div>
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </form>
                        </div>

                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Bài viết</li>
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
                        <a href="{{route('admin.article.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" >Tên bài viết</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Title Seo</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Nổi bật</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody >
                                @if(isset($articles))
                                    @foreach($articles as $article)
                                        <tr>
                                            <th scope="row">{{$article->id}}</th>
                                            <td>
                                                {{$article->a_name}}
                                                <ul style="padding-left: 15px;">
                                                    <li><span>Tác giả: </span><span> {{isset($article->admin->name)?$article->admin->name:'[N\A]'}}</span></li>
                                                    <li><span>Tạo: </span><span> {{time_elapsed_string($article->created_at)}}</span></li>
                                                </ul>
                                            </td>

                                            <td>
                                                <img src="{{asset(pare_url_file($article->a_avatar,'article'))}}" style="width: 80px;height: 80px">
                                            </td>
                                            <td>{{$article->a_title_seo}}</td>
                                            <td>
                                                <a class="badge {{$article->getStatus($article->a_active)['class']}}" href="{{route('admin.article.action',['active',$article->id])}}">{{$article->getStatus($article->a_active)['name']}}</a>
                                            </td>
                                            <td>
                                                <a class="badge {{$article->getHot($article->a_hot)['class']}}" href="{{route('admin.article.action',['hot',$article->id])}}">{{$article->getHot($article->a_hot)['name']}}</a>

                                            </td>
                                            <td>
                                                <a class="btn btn-default" href="{{route('admin.article.edit',$article->id)}}" ><i class="fas fa-pen" ></i> Edit</a>
                                                <a class="btn btn-default" href="{{route('admin.article.action',['delete',$article->id])}}" ><i class="fas fa-trash-alt"></i> Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                        <div class="row">
                            {{ $articles->links()}}

                        </div>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
