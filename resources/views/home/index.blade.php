@extends('layout.app')
@section('content')
    @include('components.silder  ')
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
                            <li role="presentation" class="active"><a href="#home" data-toggle="tab">Bestsellers</a></li>
                            <li role="presentation"><a href="#profile" data-toggle="tab">Random Products</a></li>
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
                                                        <div class="product-img">
                                                            <a href="{{route('product.detail',[$productHot->pro_slug,$productHot->id])}}">
                                                                <img class="primary-image" src="{{asset(pare_url_file($productHot->pro_image,'product'))}}" alt="" />
                                                                <img class="secondary-image" src="{{asset(pare_url_file($productHot->pro_image,'product'))}}" alt="" />
                                                            </a>
                                                            <div class="action-zoom">
                                                                <div class="add-to-cart">
                                                                    <a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                                </div>
                                                            </div>
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
                                                                    <div class="quickviewbtn">
                                                                        <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="price-box">
                                                                <span class="new-price">{{number_format($productHot->pro_price,0,',','.')}}</span>
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
                <h2>New products</h2>
            </div>
            <!-- our-product area start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="features-curosel">
                            <!-- single-product start -->
                            <div class="col-lg-12 col-md-12">
                                <div class="single-product first-sale">
                                    <div class="product-img">
                                        <a href="#">
                                            <img class="primary-image" src="{{asset('home/img/products/product-1.jpg')}}" alt="" />
                                            <img class="secondary-image" src="{{asset('home/img/products/product-2.jpg')}}" alt="" />
                                        </a>
                                        <div class="action-zoom">
                                            <div class="add-to-cart">
                                                <a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <div class="action-buttons">
                                                <div class="add-to-links">
                                                    <div class="add-to-wishlist">
                                                        <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                    <div class="compare-button">
                                                        <a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                                <div class="quickviewbtn">
                                                    <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="new-price">$200.00</span>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h2 class="product-name"><a href="#">Donec ac tempus</a></h2>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product end -->
                            <!-- single-product start -->
                            <div class="col-lg-12 col-md-12">
                                <div class="single-product first-sale">
                                    <div class="product-img">
                                        <a href="#">
                                            <img class="primary-image" src="{{asset('home/img/products/product-5.jpg')}}" alt="" />
                                            <img class="secondary-image" src="{{asset('home/img/products/product-6.jpg')}}" alt="" />
                                        </a>
                                        <div class="action-zoom">
                                            <div class="add-to-cart">
                                                <a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <div class="action-buttons">
                                                <div class="add-to-links">
                                                    <div class="add-to-wishlist">
                                                        <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                    <div class="compare-button">
                                                        <a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                                <div class="quickviewbtn">
                                                    <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="new-price">$300.00</span>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h2 class="product-name"><a href="#">Primis in faucibus</a></h2>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product end -->
                            <!-- single-product start -->
                            <div class="col-lg-12 col-md-12">
                                <div class="single-product first-sale">
                                    <div class="product-img">
                                        <a href="#">
                                            <img class="primary-image" src="{{asset('home/img/products/product-9.jpg')}}" alt="" />
                                            <img class="secondary-image" src="{{asset('home/img/products/product-10.jpg')}}" alt="" />
                                        </a>
                                        <div class="action-zoom">
                                            <div class="add-to-cart">
                                                <a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <div class="action-buttons">
                                                <div class="add-to-links">
                                                    <div class="add-to-wishlist">
                                                        <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                    <div class="compare-button">
                                                        <a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                                <div class="quickviewbtn">
                                                    <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="new-price">$270.00</span>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h2 class="product-name"><a href="#">Voluptas nulla</a></h2>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                    </div>
                                </div>

                            </div>
                            <!-- single-product end -->
                            <!-- single-product start -->
                            <div class="col-lg-12 col-md-12">
                                <div class="single-product first-sale">
                                    <div class="product-img">
                                        <a href="#">
                                            <img class="primary-image" src="{{asset('home/img/products/product-13.jpg')}}" alt="" />
                                            <img class="secondary-image" src="{{asset('home/img/products/product-1.jpg')}}" alt="" />
                                        </a>
                                        <div class="action-zoom">
                                            <div class="add-to-cart">
                                                <a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <div class="action-buttons">
                                                <div class="add-to-links">
                                                    <div class="add-to-wishlist">
                                                        <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                    <div class="compare-button">
                                                        <a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                                <div class="quickviewbtn">
                                                    <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="new-price">$340.00</span>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h2 class="product-name"><a href="#">Cras neque metus</a></h2>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product end -->
                            <!-- single-product start -->
                            <div class="col-lg-12 col-md-12">
                                <div class="single-product first-sale">
                                    <span class="sale-text">Sale</span>
                                    <div class="product-img">
                                        <a href="#">
                                            <img class="primary-image" src="{{asset('home/img/products/product-4.jpg')}}" alt="" />
                                            <img class="secondary-image" src="{{asset('home/img/products/product-5.jpg')}}" alt="" />
                                        </a>
                                        <div class="action-zoom">
                                            <div class="add-to-cart">
                                                <a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <div class="action-buttons">
                                                <div class="add-to-links">
                                                    <div class="add-to-wishlist">
                                                        <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                    <div class="compare-button">
                                                        <a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                                <div class="quickviewbtn">
                                                    <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="new-price">$360.00</span>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h2 class="product-name"><a href="#">Occaecati cupiditate</a></h2>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product end -->
                            <!-- single-product start -->
                            <div class="col-lg-12 col-md-12">
                                <div class="single-product first-sale">
                                    <div class="product-img">
                                        <a href="#">
                                            <img class="primary-image" src="{{asset('home/img/products/product-8.jpg')}}" alt="" />
                                            <img class="secondary-image" src="{{asset('home/img/products/product-9.jpg')}}" alt="" />
                                        </a>
                                        <div class="action-zoom">
                                            <div class="add-to-cart">
                                                <a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <div class="action-buttons">
                                                <div class="add-to-links">
                                                    <div class="add-to-wishlist">
                                                        <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                    <div class="compare-button">
                                                        <a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                                <div class="quickviewbtn">
                                                    <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="new-price">$400.00</span>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h2 class="product-name"><a href="#">Accumsan elit</a></h2>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product end -->
                            <!-- single-product start -->
                            <div class="col-lg-12 col-md-12">
                                <div class="single-product first-sale">
                                    <div class="product-img">
                                        <a href="#">
                                            <img class="primary-image" src="{{asset('home/img/products/product-11.jpg')}}" alt="" />
                                            <img class="secondary-image" src="{{asset('home/img/products/product-12.jpg')}}" alt="" />
                                        </a>
                                        <div class="action-zoom">
                                            <div class="add-to-cart">
                                                <a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <div class="action-buttons">
                                                <div class="add-to-links">
                                                    <div class="add-to-wishlist">
                                                        <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                    <div class="compare-button">
                                                        <a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                                <div class="quickviewbtn">
                                                    <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="new-price">$280.00</span>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h2 class="product-name"><a href="#">Pellentesque habitant</a></h2>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product end -->
                            <!-- single-product start -->
                            <div class="col-lg-12 col-md-12">
                                <div class="single-product first-sale">
                                    <div class="product-img">
                                        <a href="#">
                                            <img class="primary-image" src="{{asset('home/img/products/product-11.jpg')}}" alt="" />
                                            <img class="secondary-image" src="{{asset('home/img/products/product-2.jpg')}}" alt="" />
                                        </a>
                                        <div class="action-zoom">
                                            <div class="add-to-cart">
                                                <a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <div class="action-buttons">
                                                <div class="add-to-links">
                                                    <div class="add-to-wishlist">
                                                        <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                    <div class="compare-button">
                                                        <a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                                <div class="quickviewbtn">
                                                    <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="new-price">$222.00</span>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h2 class="product-name"><a href="#">Donec ac tempus</a></h2>
                                        <p>Nunc facilisis sagittis ullamcorper...</p>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product end -->
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
                                <a href="#">
                                    <img src="{{asset(pare_url_file($article->a_avatar,'article'))}}" alt="" style=" width: 370px;height: 280px" />
                                </a>
                            </div>
                            <div class="post-thumb-info">
                                <div class="post-time">
                                    <a href="#">Beauty</a>
                                    <span>/</span>
                                    <span>Post by</span>
                                    <span>BootExperts</span>
                                </div>
                                <div class="postexcerpt">
                                    <p style="height: 40px">{{$article->a_name}}</p>
                                    <a href="#" class="read-more">Xem thêm</a>
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
            <div class="row">
                <!-- featured block start -->
                <div class="col-md-4">
                    <!-- block title start -->
                    <div class="block-title">
                        <h2>Featureds</h2>
                    </div>
                    <!-- block title end -->
                    <!-- block carousel start -->
                    <div class="block-carousel">
                        <div class="block-content">
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-1.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Donec ac tempus</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$235.00 <span class="old-price">$333.00</span></div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-2.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Primis in faucibus</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$205.00</div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                        </div>
                        <div class="block-content">
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-3.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Voluptas nulla</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$99.00 <span class="old-price">$111.00</span></div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-4.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Cras neque metus</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$235.00</div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                        </div>
                        <div class="block-content">
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-5.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Occaecati cupiditate</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$105.00 <span class="old-price">$111.00</span></div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-6.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Accumsan elit</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$165.00</div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                        </div>
                        <div class="block-content">
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-3.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Pellentesque habitant</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$80.00 <span class="old-price">$110.00</span></div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-9.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Donec non est</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$560.00</div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                        </div>
                    </div>
                    <!-- block carousel end -->
                </div>
                <!-- featured block end -->
                <!-- featured block start -->
                <div class="col-md-4">
                    <!-- block title start -->
                    <div class="block-title">
                        <h2>On Sales</h2>
                    </div>
                    <!-- block title end -->
                    <!-- block carousel start -->
                    <div class="block-carousel">
                        <div class="block-content">
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-9.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Voluptas nulla</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$99.00 <span class="old-price">$111.00</span></div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-10.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Cras neque metus</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$235.00</div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                        </div>
                        <div class="block-content">
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-7.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Donec ac tempus</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$235.00 <span class="old-price">$333.00</span></div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-8.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Primis in faucibus</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$205.00</div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                        </div>
                        <div class="block-content">
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-11.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Occaecati cupiditate</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$105.00 <span class="old-price">$111.00</span></div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-12.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Accumsan elit</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$165.00</div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                        </div>
                        <div class="block-content">
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-13.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Pellentesque habitant</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$80.00 <span class="old-price">$110.00</span></div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-14.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Donec non est</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$560.00</div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                        </div>
                    </div>
                    <!-- block carousel end -->
                </div>
                <!-- featured block end -->
                <!-- featured block start -->
                <div class="col-md-4">
                    <!-- block title start -->
                    <div class="block-title">
                        <h2>Populers</h2>
                    </div>
                    <!-- block title end -->
                    <!-- block carousel start -->
                    <div class="block-carousel">
                        <div class="block-content">
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-13.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Voluptas nulla</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$99.00 <span class="old-price">$111.00</span></div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-14.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Cras neque metus</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$235.00</div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                        </div>
                        <div class="block-content">
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-11.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Donec ac tempus</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$235.00 <span class="old-price">$333.00</span></div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-12.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Primis in faucibus</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$205.00</div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                        </div>
                        <div class="block-content">
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-4.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Occaecati cupiditate</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$105.00 <span class="old-price">$111.00</span></div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-9.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Accumsan elit</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$165.00</div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                        </div>
                        <div class="block-content">
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-7.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Pellentesque habitant</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$80.00 <span class="old-price">$110.00</span></div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                            <!-- single block start -->
                            <div class="single-block">
                                <div class="block-image pull-left">
                                    <a href="product-details.html"><img src="{{asset('home/img/block-cat/block-3.jpg')}}" alt="" /></a>
                                </div>
                                <div class="category-info">
                                    <h3><a href="product-details.html">Donec non est</a></h3>
                                    <p>Nunc facilisis sagittis ullamcorper...</p>
                                    <div class="cat-price">$560.00</div>
                                    <div class="cat-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single block end -->
                        </div>
                    </div>
                    <!-- block carousel end -->
                </div>
                <!-- featured block end -->
            </div>
        </div>
    </div>
    <!-- block category area end -->

@endsection
