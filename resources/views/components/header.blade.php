<header class="short-stor">
    <div class="container-fluid">
        <div class="row">
            <!-- logo start -->
            <div class="col-md-3 col-sm-12 text-center nopadding-right">
                <div class="top-logo">
                    <a href="{{route('home.index')}}"><img src="{{asset('home/img/logo.gif')}}" alt="" /></a>
                </div>
            </div>
            <!-- logo end -->
            <!-- mainmenu area start -->
            <div class="col-md-6 text-center">
                <div class="mainmenu">
                    <nav>
                        <ul>
                            <li class="expand"><a href="{{route('home.index')}}">Trang chủ</a>

                            </li>
                            <li class="expand"><a href="">Sản phẩm</a>
                                <ul class="restrain sub-menu">
                                    @if(isset($categories))
                                        @foreach($categories as $category)
                                            <li><a href="{{route('cate.listProduct',[$category->c_slug,$category->id])}}">{{$category->c_name}}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            <li class="expand"><a href="{{route('article.listArticle')}}" title="Tin tức">Tin tức</a>

                            </li>
                            <li class="expand"><a href="">Giới thiệu</a>

                            </li>
                            <li class="expand"><a href="{{route('contact.get')}}">Liên hệ</a>

                            </li>

                        </ul>
                    </nav>
                </div>
                <!-- mobile menu start -->
                <div class="row">
                    <div class="col-sm-12 mobile-menu-area">
                        <div class="mobile-menu hidden-md hidden-lg" id="mob-menu">
                            <span class="mobile-menu-title">Menu</span>
                            <nav>
                                <ul>
                                    <li><a href="{{route('home.index')}}">Home</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- mobile menu end -->
            </div>
            <!-- mainmenu area end -->
            <!-- top details area start -->
            <div class="col-md-3 col-sm-12 nopadding-left">
                <div class="top-detail">
                    <!-- language division start -->

                    <!-- language division end -->
                    <!-- addcart top start -->
                    <div class="disflow">
                        <div class="circle-shopping expand">
                            <div class="shopping-carts text-right">
                                <div class="cart-toggler">
                                    <a href="{{route('cart.listCart')}}"><i class="icon-bag"></i></a>
                                    <a href="#"><span class="cart-quantity">{{\Cart::count()}}</span></a>
                                </div>
                                <div class="restrain small-cart-content">
                                    <ul class="cart-list" >
                                        <?php $productsCart=\Cart::content();   ?>
                                        @if(isset($productsCart))
                                            @foreach($productsCart as $key=> $productCart)
                                        <li style="list-style-type: none">
                                            <a class="sm-cart-product" href="{{route('product.detail',[\Illuminate\Support\Str::slug($productCart->name),$productCart->id])}}">
                                                <img src="{{asset(pare_url_file($productCart->options->image,'product'))}}" alt="">
                                            </a>
                                            <div class="small-cart-detail">
                                                <a class="remove" href="{{route('cart.delProduct',$key)}}"><i class="fa fa-times-circle"></i></a>
                                                <a href="{{route('cart.listCart')}}" class="edit-btn"><img src="{{asset('home/img/btn_edit.gif')}}" alt="Edit Button" /></a>
                                                <a class="small-cart-name" href="{{route('product.detail',[\Illuminate\Support\Str::slug($productCart->name),$productCart->id])}}">{{$productCart->name}}</a>
                                                <span class="quantitys"><strong>{{$productCart->qty}}</strong>x<span>{{number_format($productCart->price,0,',','.')}}đ</span></span>
                                            </div>
                                        </li>
                                    </ul>

                                    @endforeach
                                    <p class="total">Tổng tiền: <span class="amount">{{\Cart::subtotal(0,',','.')}}</span></p>
                                    @endif
                                    <p class="buttons">
                                        <a href="{{route('cart.pay')}}" class="button">Checkout</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- addcart top start -->
                    <!-- search divition start -->
                    <div class="disflow">
                        <div class="header-search expand">
                            <div class="search-icon fa fa-search"></div>
                            <div class="product-search restrain">
                                <div class="container nopadding-right">
                                    <form action="index.html" id="searchform" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control" maxlength="128" placeholder="Search product...">
                                            <span class="input-group-btn">
														<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
													</span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- search divition end -->
                    <div class="disflow">
                        <div class="expand dropps-menu">
                            <a href="#"><i class="fa fa-align-right"></i></a>
                            <ul class="restrain language">
                                @if(Auth::check())
                                <li><a href="{{route('user.index')}}">Quản lý</a></li>
                                <li><a href="wishlist.html">Yêu thích</a></li>
                                <li><a href="{{route('cart.listCart')}}">Giỏ hàng</a></li>
                                <li><a href="{{route('get.logout')}}">Thoát</a></li>
                                @else
                                <li><a href="{{route('get.register')}}">Đăng ký</a></li>
                                <li><a href="{{route('get.login')}}">Đăng nhập</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- top details area end -->
        </div>
    </div>
</header>
