@extends('layout.app')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="{{route('home.index')}}">Home</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="home">
                                <a href="{{route('cart.listCart')}}">Giỏ hàng</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Thanh toán</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-contact-area">
        <div class="container wrapper">
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="">
                    @csrf
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                        <!--REVIEW ORDER-->
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Thông tin đơn hàng <div class="pull-right"><small><a class="afix-1" href="{{route('cart.listCart')}}">Edit Cart</a></small></div>
                            </div>
                            <div class="panel-body">
                                <?php
                                    $total=0;
                                    $sale=0
                                ?>
                                @foreach($products as $product)
                                <div class="form-group">
                                    <div class="col-sm-3 col-xs-3">
                                        <img class="img-responsive" style="width: 100px;height: 70px" src="{{asset(pare_url_file($product->options->image,'product'))}}" />
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="col-xs-12">{{$product->name}}</div>
                                        <div class="col-xs-12"><small>Số lượng:<span> x{{$product->qty}}</span></small></div>
                                    </div>
                                    <div class="col-sm-3 col-xs-3 text-right">
                                        <h6>{{number_format($product->options->price_old,0,',','.')}}<span> VNđ</span></h6>
                                        <br>
                                        <h6>Giảm giá: {{$product->options->sale}}%</h6>
                                    </div>
                                </div>
                                <div class="form-group"><hr /></div>
                                    <?php
                                        $total+=$product->options->price_old*$product->qty;
                                        $sale+=$product->options->price_old*($product->options->sale)*$product->qty/100;
                                        ?>
                                @endforeach
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <strong>Tổng tiền: </strong>

                                        <div class="pull-right"><span>{{number_format($total,0,',','.')}}</span><span> VNĐ</span></div>
                                    </div>

                                    <div class="col-xs-12">
                                        <small>Giảm giá:    </small>
                                        <div class="pull-right"><span>-{{number_format($sale,0,',','.')}}</span><span> VNĐ</span></div>
                                    </div>
                                </div>
                                <div class="form-group"><hr /></div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <strong>Tổng đơn hàng</strong>
                                        <div class="pull-right"><span>{{\Cart::subtotal(0,',','.')}}</span><span> VNĐ</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--REVIEW ORDER END-->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                        <!--SHIPPING METHOD-->
                        <div class="panel panel-info">
                            <div class="panel-heading">Thông tin giao hàng</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-6 col-xs-12">
                                        <strong>Họ tên: </strong>
                                        <input type="text" name="name" class="form-control" value="" />
                                    </div>
                                    <div class="span1"></div>
                                    <div class="col-md-6 col-xs-12">
                                        <strong>Số điện thoại: </strong>
                                        <input type="text" name="phone" class="form-control" value="{{get_data_user('web','phone')}}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Địa chỉ: </strong></div>
                                    <div class="col-md-12">
                                        <input type="text" name="address" class="form-control" value="" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12"><strong>Email Address: </strong></div>
                                    <div class="col-md-12"><input type="text" name="email" class="form-control" readonly value="{{get_data_user('web','email')}}" /></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Ghi chú: </strong></div>
                                    <div class="col-md-12">
                                        <textarea cols="30" rows="4" name="note" class="form-control"  ></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success">Lưu thông tin</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--SHIPPING METHOD END-->

                    </div>

                </form>
            </div>
            <div class="row cart-footer">

            </div>
        </div>
    </div>

@endsection
