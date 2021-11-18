@extends('layout.app')
@section('content')
    <div class="our-product-area">
        <div class="container">
            <!-- area title start -->
            <div class="area-title">
                <h2>Giỏ hàng của bạn</h2>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                @foreach($products as $key => $product)
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td><a href="">{{$product->name}}</a></td>
                    <td>
                        <img style="width: 80px;height: 70px" src="{{asset(pare_url_file($product->options->image,'product'))}}">
                    </td>
                    <td>
                        <ul>
                            <li><span><i class="fa fa-dollar">: </i></span><span> {{number_format($product->options->price_old,0,',','.')}}đ</span></li>
                            <li><span><i class="fa fa-tag">: </i></span><span> {{$product->options->sale}}%</span></li>
                        </ul>


                    </td>
                    <td>{{$product->qty}}</td>
                    <td>

                        {{number_format($product->qty*$product->price,0,',','.')}}đ</td>
                    <td>
                        <a href=""><i class="fa fa-pencil"></i> Cập nhật</a>
                        <br>
                        <a href="{{route('cart.delProduct',$key)}}"><i class="fa fa-times"></i> Xóa</a>
                    </td>
                </tr>
                <?php $i++; ?>
                @endforeach
                </tbody>
            </table>
            <h5 class="pull-right">Tổng tiền cần thanh toán: {{\Cart::subtotal(0,',','.')}} đ

                <a href="{{route('cart.pay')}}" class="btn btn-success ">Thanh toán</a>
            </h5>
            <br>

        </div>
    </div>
@stop
