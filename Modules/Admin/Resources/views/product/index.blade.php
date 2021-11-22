@extends('admin::layouts.master')

@section('title')
    <title>Admin System</title>
@endsection
@section('content')
    <style>
        .rating .active{
            color: #ff9075 !important;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <h1 class="m-0">Sản phẩm</h1>
                    </div><!-- /.col -->

                        <div class="col-sm-4">
                            <form class="form-inline" action="">

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Tên sản phẩm" value="{{\Request::get('name')}}"  name="name">
                                </div>
                                <div class="form-group">
                                    <select name="cate" class="form-control" >
                                        <option value="">--Danh mục</option>
                                        @if(isset($categories))
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{\Request::get('cate')==$category->id? "selected":"" }}>{{$category->c_name}}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </form>
                        </div>

                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Sản phẩm</li>
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
                        <a href="{{route('admin.product.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Loại sản phẩm</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Title Seo</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Nổi bật</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody >
                                @if(isset($products))
                                    @foreach($products as $product)
                                        <?php
                                            $rate=0;
                                            if($product->pro_total_rating)
                                            {
                                                $rate=round($product->pro_total_rate_number/$product->pro_total_rating,2);
                                            }

                                        ?>
                                        <tr>
                                            <th scope="row">{{$product->id}}</th>
                                            <td>
                                                {{$product->pro_name}}
                                                <ul style="padding-left: 15px">
                                                    <li><span><i class="fas fa-dollar-sign">: </i></span><span> {{number_format($product->pro_price,0,',','.')}}đ</span></li>
                                                    <li><span><i class="fas fa-tag">: </i></span><span> {{$product->pro_sale}}%</span></li>
                                                    <li><span>Đánh giá: </span>
                                                        <span class="rating">
                                                            @for($i=1;$i<=5;$i++)
                                                                <i class="fa fa-star {{$i<=$rate?'active':''}}" style="color: #999"></i>
                                                                @endfor
                                                        </span>
                                                        <span>({{$rate}})</span>
                                                    </li>
                                                    <li><span>Số lượng: </span> <span>{{$product->pro_number}}</span></li>
                                                </ul>
                                            </td>
                                            <td>{{isset($product->category->c_name)?$product->category->c_name:'[N\A]'}}</td>
                                            <td>
                                                <img src="{{asset(pare_url_file($product->pro_image,'product'))}}" style="width: 80px;height: 80px">
                                            </td>
                                            <td>{{$product->pro_title_seo}}</td>
                                            <td>
                                                <a class="badge {{$product->getStatus($product->pro_active)['class']}}" href="{{route('admin.product.action',['active',$product->id])}}">{{$product->getStatus($product->pro_active)['name']}}</a>
                                            </td>
                                            <td>
                                                <a class="badge {{$product->getHot($product->pro_hot)['class']}}" href="{{route('admin.product.action',['hot',$product->id])}}">{{$product->getHot($product->pro_hot)['name']}}</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-default" href="{{route('admin.product.edit',$product->id)}}" ><i class="fas fa-pen" ></i> Edit</a>
                                                <a class="btn btn-default" href="{{route('admin.product.action',['delete',$product->id])}}" ><i class="fas fa-trash-alt"></i> Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                        <div class="row">
                            {{ $products->links()}}

                        </div>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
