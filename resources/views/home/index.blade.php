@extends('layout.app')
@section('content')
    @include('components.silder')
    <style>
        .cat-rating .active{
            color: #ff9075 ;
        }
    </style>
    <!-- product section start -->
    <div class="our-product-area">
        <div class="container">
            <!-- area title start -->
            <div class="area-title">
                <h2>Sản phẩm nổi bật</h2>
            </div>
            <!-- area title end -->
            <!-- our-product area start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="features-tab">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li role="presentation" class="active"><a href="" data-toggle="tab">Bestsellers</a></li>

                        </ul>
                        <!-- Tab pans -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                <div class="row">
                                    <div class="features-curosel">
                                        @if(isset($productsHot))
                                            @foreach($productsHot as $productHot)
                                                <div class="col-lg-12 col-md-12">
                                                    <!-- single-product start -->
                                                    <div class="single-product first-sale">
                                                        <div class="product-img" style="width: 270px;height: 270px">
                                                            @if ( $productHot->pro_number == 0)
                                                                <span style="position: absolute;background: #e91e63;color: white;padding: 2px 6px;border-radius: 5px;font-size: 10px;">Tạm hết hàng</span>
                                                            @endif
                                                            @if ($productHot->pro_sale)
                                                                <span style="position: absolute;font-size:10px;background-image: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100%);border-radius: 10px;padding: 3px 7px;color: white;right: 0">{{ $productHot->pro_sale }}%</span>
                                                            @endif
                                                            <a href="{{route('product.detail',[$productHot->pro_slug,$productHot->id])}}">
                                                                <img class="primary-image" src="{{asset(pare_url_file($productHot->pro_image,'product'))}}" alt="" />
                                                                <img class="secondary-image" src="{{asset(pare_url_file($productHot->pro_image,'product'))}}" alt="" />
                                                            </a>

                                                            <div class="actions">
                                                                <div class="action-buttons">
                                                                    <div class="add-to-links">
                                                                        <div class="add-to-wishlist">
                                                                            <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                                        </div>
                                                                        <div class="compare-button">
                                                                            <a href="{{route('cart.addProduct',$productHot->id)}}" title="Add to Cart"><i class="icon-bag"></i></a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="price-box">
                                                                <span class="new-price">{{number_format($productHot->pro_price,0,',','.')}}đ</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-content">
                                                            <h2 class="product-name"><a href="#">{{$productHot->pro_name}}</a></h2>
                                                            <p>{{$productHot->pro_desc}}</p>
                                                        </div>
                                                    </div>

                                                </div>
                                        @endforeach
                                    @endif
                                    <!-- single-product end -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- our-product area end -->
        </div>
    </div>
    <!-- product section end -->
    <!-- banner-area start -->
    {{--@include('components.banner')--}}
    <!-- banner-area end -->
    <!-- product section start -->
    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>Sản phẩm mới</h2>
            </div>
            <!-- our-product area start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="features-curosel">
                            @if(isset($productsNew))
                                @foreach($productsNew as $productNew)
                            <!-- single-product start -->
                            <div class="col-lg-12 col-md-12">
                                <div class="single-product first-sale">
                                    <div class="product-img" style="width: 270px;height: 270px">
                                        @if ( $productHot->pro_number == 0)
                                            <span style="position: absolute;background: #e91e63;color: white;padding: 2px 6px;border-radius: 5px;font-size: 10px;">Tạm hết hàng</span>
                                        @endif
                                        @if ($productHot->pro_sale)
                                            <span style="position: absolute;font-size:10px;background-image: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100%);border-radius: 10px;padding: 3px 7px;color: white;right: 0">{{ $productHot->pro_sale }}%</span>
                                        @endif
                                        <a href="{{route('product.detail',[$productNew->pro_slug,$productNew->id])}}">
                                            <img class="primary-image" src="{{asset(pare_url_file($productNew->pro_image,'product'))}}" alt="" />
                                            <img class="secondary-image" src="{{asset(pare_url_file($productNew->pro_image,'product'))}}" alt="" />
                                        </a>
                                        <div class="action-zoom">
                                            <div class="add-to-cart">
                                                <a href="" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <div class="action-buttons">
                                                <div class="add-to-links">
                                                    <div class="add-to-wishlist">
                                                        <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                    <div class="compare-button">
                                                        <a href="{{route('cart.addProduct',$productNew->id)}}" title="Add to Cart"><i class="icon-bag"></i></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="new-price">{{number_format($productNew->pro_price,0,',','.')}}đ</span>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h2 class="product-name"><a href="{{route('product.detail',[$productNew->pro_slug,$productNew->id])}}">{{$productNew->pro_name}}</a></h2>
                                        <p>{{$productNew->pro_desc}}</p>
                                    </div>

                                </div>
                            </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <!-- our-product area end -->
        </div>
    </div>
    <!-- product section end -->
    <!-- latestpost area start -->
    @if(isset($articles))
    <div class="latest-post-area">
        <div class="container">
            <div class="area-title">
                <h2>Bài viết mới</h2>
            </div>
            <div class="row">
                <div class="all-singlepost">
                    <!-- single latestpost start -->
                    @foreach($articles as $article)
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single-post" style="margin-bottom: 40px">
                            <div class="post-thumb">
                                <a href="{{route('article.detail',[$article->a_slug,$article->id])}}">
                                    <img src="{{asset(pare_url_file($article->a_avatar,'article'))}}" alt="" style=" width: 370px;height: 280px" />
                                </a>
                            </div>
                            <div class="post-thumb-info">
                                <div class="post-time">

                                    <span>Post by</span>
                                    <span>{{$article->admin->name}}</span>
                                    <span>/</span>
                                    <span>{{time_elapsed_string($article->created_at)}}</span>
                                </div>
                                <div class="postexcerpt">
                                    <p style="height: 40px">{{$article->a_name}}</p>
                                    <a href="{{route('article.detail',[$article->a_slug,$article->id])}}" class="read-more">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single latestpost end -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- latestpost area end -->
    <!-- block category area start -->
    <div class="block-category">
        <div class="container">
            <div class="area-title">
                <h2>Danh mục nổi bật</h2>
            </div>
            <div class="row">
                @if(isset($categoriesHome))
                    @foreach($categoriesHome as $categoryHome)
                        <div class="col-md-4">
                    <!-- block title start -->
                    <div class="block-title">
                        <h2>{{$categoryHome->c_name}}</h2>
                    </div>
                    <!-- block title end -->
                    <!-- block carousel start -->
                            @if(isset($categoryHome->product))
                    <div class="block-carousel">
                        @foreach($categoryHome->product as $productHome)
                        <div class="block-content">
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="{{route('product.detail',[$productHome->pro_slug,$productHome->id])}}"><img style="width: 170px;height: 208px" src="{{asset(pare_url_file($productHome->pro_image,'product'))}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="{{route('product.detail',[$productHome->pro_slug,$productHome->id])}}">{{$productHome->pro_name}}</a></h3>
                                    <p>{{$productHome->pro_desc}}</p>
                                    <div class="cat-price">{{ number_format(round((100 - $productHome->pro_sale) * $productHome->pro_price / 100,0),0,',','.') }}đ<span class="old-price">{{number_format($productHome->pro_price,0,',','.')}}đ</span></div>
                                    <?php
                                    $rateDetail=0;
                                    if($productHome->pro_total_rating)
                                    {
                                        $rateDetail=round($productHome->pro_total_rate_number/$productHome->pro_total_rating,2);
                                    }
                                    ?>
                                    <div class="cat-rating">
                                        @for($i=1;$i<=5;$i++)
                                            <a href="#"><i class="fa fa-star {{$i<=$rateDetail?'active':''}}"></i></a>
                                        @endfor
                                        <p>({{$productHome->pro_total_rating}} đánh giá)</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                            @endif
                    <!-- block carousel end -->
                </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- block category area end -->

@endsection
