@extends('layout.app')
@section('content')
    <style>
        .sidebar-content .active{
            color: #c2a476;
        }
    </style>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="{{route('home.index')}}">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>{{$cateProduct->c_name}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- shop-with-sidebar Start -->
    <div class="shop-with-sidebar">
        <div class="container">
            <div class="row">
                <!-- left sidebar start -->
                <div class="col-md-3 col-sm-12 col-xs-12 text-left">
                    <div class="topbar-left">
                        <aside class="widge-topbar">
                            <div class="bar-title">
                                <div class="bar-ping"><img src="{{asset('home/img/bar-ping.png')}}" alt=""></div>
                                <h2>Shop by</h2>
                            </div>
                        </aside>
                        <aside class="sidebar-content">
                            <div class="sidebar-title">
                                <h6>Categories</h6>
                            </div>
                            <ul class="sidebar-tags">
                                <li><a href="#">Acsessories</a><span> (14)</span></li>
                                <li><a href="#">Afternoon</a><span> (14)</span></li>
                                <li><a href="#">Attachment</a><span> (14)</span></li>
                                <li><a href="#">Beauty</a><span> (14)</span></li>
                            </ul>
                        </aside>
                        <aside class="sidebar-content">
                            <div class="sidebar-title">
                                <h6>Availability</h6>
                            </div>
                            <ul>
                                <li><a href="#">Not available</a><span> (1)</span></li>
                                <li><a href="#">In stock</a><span> (2)</span></li>
                            </ul>
                        </aside>
                        <aside class="topbarr-category sidebar-content">
                            <div class="sidebar-title">
                                <h6>Khoảng giá</h6>
                            </div>
                            <ul>
                                <li><a class="{{Request::get('price')==1?'active':''}}" href="{{ request()->fullUrlWithQuery(['price' => 1]) }} ">Dưới 2 triệu</a><span> (1)</span></li>
                                <li><a class="{{Request::get('price')==2?'active':''}}" href="{{ request()->fullUrlWithQuery(['price' => 2]) }} ">Từ 2-4 triệu</a><span> (2)</span></li>
                                <li><a class="{{Request::get('price')==3?'active':''}}" href="{{ request()->fullUrlWithQuery(['price' => 3]) }} ">Từ 4-7 triệu</a><span> (2)</span></li>
                                <li><a class="{{Request::get('price')==4?'active':''}}" href="{{ request()->fullUrlWithQuery(['price' => 4]) }} ">Từ 7-13 triệu</a><span> (2)</span></li>
                                <li><a class="{{Request::get('price')==5?'active':''}}" href="{{ request()->fullUrlWithQuery(['price' => 5]) }} ">Từ 13-20 triệu</a><span> (2)</span></li>
                                <li><a class="{{Request::get('price')==6?'active':''}}" href="{{ request()->fullUrlWithQuery(['price' => 6]) }} ">Trên 20 triệu</a><span> (2)</span></li>
                            </ul>
                        </aside>

                        <aside class="sidebar-content">
                            <div class="sidebar-title">
                                <h6>Properties</h6>
                            </div>
                            <ul>
                                <li><a href="#">Colorful Dress</a><span> (1)</span></li>
                                <li><a href="#">Maxi Dress</a><span> (2)</span></li>
                                <li><a href="#">Midi Dress</a><span> (2)</span></li>
                                <li><a href="#">Short Dress</a><span> (2)</span></li>
                                <li><a href="#">Short Sleeve</a><span> (2)</span></li>
                            </ul>
                        </aside>
                        <aside class="widge-topbar">
                            <div class="bar-title">
                                <div class="bar-ping"><img src="{{asset('home/img/bar-ping.png')}}" alt=""></div>
                                <h2>Tags</h2>
                            </div>
                            <div class="exp-tags">
                                <div class="tags">
                                    <a href="#">camera</a>
                                    <a href="#">mobile</a>
                                    <a href="#">electronic</a>
                                    <a href="#">destop</a>
                                    <a href="#">tablet</a>
                                    <a href="#">accessories</a>
                                    <a href="#">camcorder</a>
                                    <a href="#">laptop</a>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                <!-- left sidebar end -->
                <!-- right sidebar start -->
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <!-- shop toolbar start -->
                    <div class="shop-content-area">
                        <div class="shop-toolbar">
                            <div class="col-xs-12 nopadding-left text-left">
                                <form class="tree-most" action="" id="form_sort" method="get">
                                    <div class="orderby-wrapper pull-right">
                                        <label>Sắp xếp</label>
                                        <select name="orderby"  class="orderby">
                                            <option {{Request::get('orderby')=='md' || !Request::get('orderby') ?'selected':''}} value="md" selected="selected">Mặc định</option>
                                            <option {{Request::get('orderby')=='desc'?'selected':''}}  value="desc">Mới nhất</option>
                                            <option {{Request::get('orderby')=='sell'?'selected':''}}  value="sell">Bán chạy</option>
                                            <option {{Request::get('orderby')=='price'?'selected':''}}  value="price">Giá tăng dần</option>
                                            <option {{Request::get('orderby')=='price-desc'?'selected':''}} value="price-desc">Giá giảm dần</option>
                                        </select>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                    <!-- shop toolbar end -->
                    <!-- product-row start -->
                    @if(isset($products))
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="shop-grid-tab">
                            <div class="row">
                                <div class="shop-product-tab first-sale">
                                    @foreach($products as $product)
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="two-product">
                                            <!-- single-product start -->
                                            <div class="single-product">

                                                <div class="product-img">
                                                    @if ( $product->pro_number == 0)
                                                        <span style="position: absolute;background: #e91e63;color: white;padding: 2px 6px;border-radius: 5px;font-size: 10px;">Tạm hết hàng</span>
                                                    @endif
                                                    @if ($product->pro_sale)
                                                        <span style="position: absolute;font-size:10px;background-image: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100%);border-radius: 10px;padding: 3px 7px;color: white;right: 0">{{ $product->pro_sale }}%</span>
                                                    @endif
                                                    <a href="{{route('product.detail',[$product->pro_slug,$product->id])}}">
                                                        <img class="primary-image" src="{{asset(pare_url_file($product->pro_image,'product'))}}" alt="" />
                                                        <img class="secondary-image" src="{{asset(pare_url_file($product->pro_image,'product'))}}" alt="" />
                                                    </a>
                                                    <div class="action-zoom">
                                                        <div class="add-to-cart">
                                                            <a href="{{route('product.detail',[$product->pro_slug,$product->id])}}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="actions">
                                                        <div class="action-buttons">
                                                            <div class="add-to-links">
                                                                <div class="add-to-wishlist">
                                                                    <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                                </div>
                                                                <div class="compare-button">
                                                                    <a href="{{route('cart.addProduct',$product->id)}}" title="Add to Cart"><i class="icon-bag"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="quickviewbtn">
                                                                <a href="" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="price-box">
                                                        <span class="new-price">{{number_format($product->pro_price,0,',','.')}}đ</span>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h2 class="product-name"><a href="{{route('product.detail',[$product->pro_slug,$product->id])}}">{{$product->pro_name}}</a></h2>
                                                    <p>{{$product->pro_desc}}</p>
                                                </div>
                                            </div>
                                            <!-- single-product end -->
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- product-row end -->
                    @endif
                        </div>

                        <!-- shop toolbar start -->
                        <div class="shop-content-bottom">
                            <div class="shop-toolbar btn-tlbr">

                                <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                    <div class="pages">
                                        <label>Page:</label>
                                        {!!$products->links()!!}
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- shop toolbar end -->
                    </div>
                </div>
                <!-- right sidebar end -->
            </div>
        </div>
    </div>
    <!-- shop-with-sidebar end -->
@endsection
@section('script')
<script>
    $(function(){
        $(".orderby").change(function(){
            $("#form_sort").submit();


        })
    })
</script>
@endsection
