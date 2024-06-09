<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laptop LT - Thế giới công nghệ</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{URL('public/client/img/logo-image.png')}}">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="{{URL('public/client/img/ico-logo.ico')}}"> -->
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.15.2/css/pro.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('public/client/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/client/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/client/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('public/client/css/sweetalert.css')}}">

    <!-- Light Slider -->
    <link rel="stylesheet" href="{{asset('public/client/css/lightgallery.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/client/css/prettify.css')}}">
    <link rel="stylesheet" href="{{asset('public/client/css/lightslider.css')}}">
</head>

<body>
    <?php
        use Illuminate\Support\Facades\Session;
        //dùng cho back về url đang làm việc sau khi login,register
        Session::put('back_url', request()->fullUrl());
    ?>
    <!-- Begin Header -->
    <header class="mb-3 ">
        <!-- Begin Header PC -->
        <div class="wrapper-top py-1">
            <div class="container">
                <div class="detail">
                    <a class="map-top" href="https://goo.gl/maps/zm4MPY3XfUV6NNmN9"><i class="fas fa-map-marker-alt"></i> Địa chỉ: 470 Trần Đại Nghĩa - Phường Hòa Hải - Quận Ngũ Hành Sơn - Tp. Đà Nẵng |</a>
                    <a href="tel: 0941 547 945"><i class="m-lg-1 fas fa-phone-alt"></i> 037 855 6163</a>
                </div>
                <div class="social">
                    Social:
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="container-fluid pb-3 header-pc">
            <div class="row">
                <a class="col-sm-1" href="{{URL('/')}}" title="Laptop LT - Thế giới công nghệ">
                    <img src="{{URL('public/client/img/logo-image.png')}}" alt="Laptop LT - Thế giới công nghệ" width="140" height="90">
                </a>
                <div class="col-sm-2">
                    <div class="row">
                        <div class="col-md-3 mt-4"><img src="{{URL('public/client/img/icon-phone.png')}}" alt="icon-phone"></div>
                        <div class="col-md-9 mt-3">
                            <a class="item-row1" href="#">Hotline</a><br/>
                            <a class="item-row2 text-danger" href="tell: 037 855 6163">037 855 6163</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="row">
                        <div class="col-md-2 mt-4"><img src="{{URL('public/client/img/icon-conversion3.png')}}" alt="icon-conversion"></div>
                        <div class="col-md-10 mt-3">
                            <a class="item-row1" href="#">Đổi trả hàng</a><br/>
                            <a class="item-row2" href="#">Cho đến khi bạn hài lòng</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-md-2 mt-4"><img src="{{URL('public/client/img/icon-product1.png')}}" alt="icon-product"></div>
                        <div class="col-md-10 mt-3">
                            <a class="item-row1" href="#">Sản phẩm Laptop LT</a><br/>
                            <a class="item-row2" href="#">Đẳng cấp thế giới</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 row mt-3">
                    @if(Session::get('cart') == true)
                    <div id="show-cart-qty" class="col-md-6 icon-cart"></div>
                    @else
                    <div class="col-md-6 icon-cart">
                        <a href="{{url('/gio-hang')}}">
                            <span class="num-cart">0</span>
                            <img src="{{URL('public/client/img/icon-cart1.png')}}" alt="Giỏ hàng" width="44">
                        </a>
                    </div>
                    @endif
                    <div class="col-md-6 icon-search">
                        <img src="{{URL('public/client/img/icon-search1.png')}}" width="44" alt="Search">
                        <div class="search-content">
                            <div class="icon-down-search"></div>
                            <div class="form-search" id="search-container">
                            <form action="{{URL('/tim-kiem')}}" method="get">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <input type="text" name="keyword_submit" class=" col-md-10 form-control" placeholder="Nhập từ khóa tìm kiếm...">
                                        <button type="submit" class="col-md-2 btn btn-violet"><i class="text-white fas fa-search"></i></button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="row">
    <div class="col-md-12 fixedElement" style=" background-color: #f7ffec;">
        <nav class="container nav-pc">
            <div class="row">
                <div class="navbar col-md-12">
                    <ul class="nav">
                        <li class="nav-item">
                            <div class="scroll-div" style="display: none;">
                                <a href="{{URL('/')}}" title="Laptop LT - Thế giới công nghệ">
                                    <img src="{{URL('public/client/img/logo-image.png')}}" alt="Laptop LT - Thế giới công nghệ" height="40">
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{URL('/')}}"><i class="fas fa-home-alt"></i></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{route('introduce')}}">Giới thiệu</a></li>
                        <li class="nav-item dropdown subnav-item">
                            <a class="nav-link" href="" onclick="return false;">Sản phẩm</a>
                            <ul class="dropdown-menu subnav">
                                @foreach($category as $key => $cate)
                                <li class="dropdown-item"><a href="{{URL('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                                <li class="dropdown-divider"></li>
                                @endforeach
                            </ul>
                        </li>
                        <!-- <li class="nav-item dropdown subnav-item">
                            <a class="nav-link" href="" onclick="return false;">Quà tặng</a>
                            <ul class="dropdown-menu subnav">
                                <li class="dropdown-item"><a href="#">Chuột</a></li>
                                <li class="dropdown-divider"></li>
                                <li class="dropdown-item"><a href="#">Balo</a></li>
                            </ul>
                        </li> -->
                        <li class="nav-item"><a class="nav-link" href="https://www.facebook.com/laptoplt/">Fanpage</a></li>
                        <li class="nav-item dropdown subnav-item">
                            <a class="nav-link" href="" onclick="return false;">Tin tức</a>
                            <ul class="dropdown-menu subnav">
                                @foreach($category_post as $key => $cate)
                                <li class="dropdown-item"><a href="{{URL('/danh-muc-bai-viet/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                                <li class="dropdown-divider"></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{url('/lien-he')}}">Liên hệ</a></li>
                        @if(session('name'))
                            <li class="nav-item dropdown subnav-item">
                                <a class="nav-link" href="" onclick="return false;">{{session('name')}}</a>
                                <ul class="dropdown-menu subnav">
                                    <li class="dropdown-item"><a href="{{route('client.info')}}">Thông tin</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item"><a href="{{route('client.update')}}">Cập nhật</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item"><a href="{{route('client.logout')}}">Đăng xuất</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item dropdown subnav-item">
                                <a class="nav-link" href="" onclick="return false;">Tài khoản</a>
                                <ul class="dropdown-menu subnav">
                                    <li class="dropdown-item"><a href="{{route('client.login')}}">Đăng nhập</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item"><a href="{{route('client.register')}}">Đăng ký</a></li>
                                </ul>
                            </li>
                        @endif
                        <li class="nav-item">
                            <div class="scroll-div" style="display: none;">
                                @if(Session::get('cart') == true)
                                <div id="show-cart-qty" class="icon-cart"></div>
                                @else
                                <div class="icon-cart">
                                    <a href="{{url('/gio-hang')}}">
                                        <span class="num-cart">0</span>
                                        <img height="30" width="30" src="{{URL('public/client/img/icon-cart1.png')}}" alt="Giỏ hàng">
                                    </a>
                                </div>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
        <!-- End Header PC -->
        <!-- Begin Header Responsive -->
        <div class="nav-responsive fixedElement">
            <div class="logo-homepage">
                <a class="icon-logo" href="{{URL('/')}}" title="Laptop LT - Thế giới công nghệ">
                    <img src="{{URL('public/client/img/logoLT-mobile.png')}}" alt="Laptop LT - Thế giới công nghệ">
                </a>
            </div>
            <div class="nav-wrapper-res">
                <ul class="nav nav-tabs">
                    <li id="" class="show-nav-respon js-left-nav">
                        <button class="mt-1">
                            <span class="navicon-line"></span>
                            <span class="navicon-line"></span>
                            <span class="navicon-line"></span>
                        </button>
                    </li>
                    <li class="col-tab-1 js-support">
                        <button></button>
                    </li>
                    <li class="col-tab-2 js-social">
                        <button></button>
                    </li>
                    <li class="col-tab-3 js-search">
                        <button></button>
                    </li>
                </ul>
                <div class="show-nav-res js-nav-support">
                    <ul class="nav-row row js-row-support">
                        <li class="col-md-5 nav-row-item"><a href="#">Hướng dẫn mua hàng và thanh toán</a></li>
                        <li class="col-md-5 nav-row-item"><a href="{{url('/lien-he')}}">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="show-nav-res js-nav-social">
                    <ul class="nav-row row js-row-social">
                        <li class="col-md-5 nav-row-item">
                            <a href="https://www.facebook.com/laptoplt/" title="Facebook">Facebook</a>
                        </li>
                        <li class="col-md-5 nav-row-item ">
                            <a href="#" title="Google+">Google+</a>
                        </li>
                        <li class="col-md-5 nav-row-item">
                            <a href="#" title="Twitter">Twitter</a>
                        </li>
                        <li class="col-md-5 nav-row-item">
                            <a href="#" title="Youtube">Youtube</a>
                        </li>
                        <li class="col-md-5 nav-row-item">
                            <a href="tel: 037 855 6163">037 855 6163</a>
                        </li>
                        <li class="col-md-5 nav-row-item">
                            <a href="tel: 0916 190 744">0916 190 744 (giờ hành chính)</a>
                        </li>
                        <li class="col-md-10 nav-row-item">
                            <a href="mailto: pvlinh.20it9@vku.udn.vn">pvlinh.20it9@vku.udn.vn</a>
                        </li>
                    </ul>
                </div>
                <div class="show-nav-res js-nav-search">
                    <form class="nav-row row js-row-search" action="{{URL('/tim-kiem')}}" method="get">
                        {{csrf_field()}}
                        <input type="text" name="keyword_submit" class=" col-md-10 form-control" placeholder="Nhập từ khóa tìm kiếm...">
                        <button type="submit" class="col-md-2 btn btn-violet"><i class="text-white fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div id="" class="show-nav-left js-modal-nav">
            <div class="nav-left js-show-nav-left">
                <div class="head-left-nav"> Menu Laptop LT
                    <div class="icon-left-nav js-icon-back"></div>
                </div>
                <ul id="menu-left">
                    <li class="nav-item">
                        <div><a class="nav-link js-hide" href="{{route('introduce')}}">Giới thiệu</a></div>
                    </li>
                    <li class="nav-item dropdown subnav-item">
                        <span>
                            <a class="nav-link" href="#" onclick="return false;">Sản phẩm</a>
                            <div class="icon-add-nav"></div>
                        </span>
                        <ul class="dropdown-menu subnav">
                            @foreach($category as $key => $cate)
                                <li class="dropdown-item">
                                    <a href="{{URL('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <!-- <li class="nav-item dropdown subnav-item">
                        <span>
                            <a class="nav-link" href="#" onclick="return false;">Quà tặng</a>
                            <div class="icon-add-nav"></div>
                        </span>
                        <ul class="dropdown-menu subnav">
                            <li class="dropdown-item">
                                <a href="#">Chuột</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="#">Balo</a>
                            </li>
                        </ul>
                    </li> -->
                    <li>
                        <div><a class="nav-link js-hide" href="https://www.facebook.com/laptoplt/">Fanpage</a></div>
                    </li>
                    <li class="nav-item dropdown subnav-item">
                        <span>
                            <a class="nav-link" href="#" onclick="return false;">Tin tức</a>
                            <div class="icon-add-nav"></div>
                        </span>
                        <ul class="dropdown-menu subnav">
                                @foreach($category_post as $key => $cate)
                                <li class="dropdown-item"><a href="{{URL('/danh-muc-bai-viet/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                                <li class="dropdown-divider"></li>
                                @endforeach
                            </ul>
                    </li>
                    <li>
                        <div><a class="nav-link" href="{{url('/lien-he')}}">Liên hệ</a></div>
                    </li>
                    <!-- <li class="nav-item dropdown subnav-item">
                        <span>
                            <a class="nav-link" href="#" onclick="return false;">Tài khoản</a>
                            <div class="icon-add-nav"></div>
                        </span>
                        <ul class="dropdown-menu subnav">
                            <li class="dropdown-item">
                                <a href="{{route('client.login')}}">Đăng nhập</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="{{route('client.register')}}">Đăng ký</a>
                            </li>
                        </ul>
                    </li> -->
                    @if(session('name'))
                            <li class="nav-item dropdown subnav-item">
                                <a class="nav-link" href="" onclick="return false;">{{session('name')}}</a>
                                <ul class="dropdown-menu subnav">
                                    <li class="dropdown-item"><a href="{{route('client.info')}}">Thông tin</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item"><a href="{{route('client.update')}}">Cập nhật</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item"><a href="{{route('client.logout')}}">Đăng xuất</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item dropdown subnav-item">
                                <a class="nav-link" href="" onclick="return false;">Tài khoản</a>
                                <ul class="dropdown-menu subnav">
                                    <li class="dropdown-item"><a href="{{route('client.login')}}">Đăng nhập</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item"><a href="{{route('client.register')}}">Đăng ký</a></li>
                                </ul>
                            </li>
                        @endif
                </ul>
            </div>
        </div>
        <!-- End Header Responsive -->
    </header>
    <!-- End Header -->
    @yield('content')
    <!-- Begin Scroll to top -->
    <div><img id="scroll-top" onclick="topFunction()" src="{{URL('public/client/img/scroll-to-top.png')}}" alt="Scroll top top"></div>
    <!-- End Scroll to top -->
    <!-- Begin Footer -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row mx-0">
                    <div class="col-md-5">
                        <p>
                            <a href="{{URL('/')}}"><img class="mb-3 logo-footer" src="{{URL('public/client/img/logoLT-mobile.png')}}" width="250" alt="Laptop LT - Thế giới công nghệ"></a> <br>
                            <i class="mr-3 fas fa-map-marked-alt"></i>Cơ sở 1 <br>
                            <span>&emsp;&emsp;<i class="mr-3 fas fa-map-marker-alt"></i>Địa chỉ:<a class="row-bottom-2" href="https://goo.gl/maps/79wo14qfxCXLLs8H6"> Khái Tây 1, P. Hòa Quý, Q. Ngũ Hành Sơn, TP. Đà Nẵng</a></span><br>
                            <span>&emsp;&emsp;<i class="mr-3 fas fa-phone-alt"></i>Điện thoại:<a class="row-bottom-2" href="tel: 037 855 6163"> 037 855 6163</a></span><br>
                            <span>&emsp;&emsp;<i class="mr-3 fas fa-envelope"></i>Email:<a class="row-bottom-2" href="mailto: pvlinh.20it9@vku.udn.vn"> pvlinh.20it9@vku.udn.vn</a></span>
                        </p>
                        <p>
                            <i class="mr-3 fas fa-map-marked-alt"></i>Cơ sở 2 <br>
                            <span>&emsp;&emsp;<i class="mr-3 fas fa-map-marker-alt"></i>Địa chỉ:<a class="row-bottom-2" href="https://goo.gl/maps/79wo14qfxCXLLs8H6"> Khái Tây 1, P. Hòa Quý, Q. Ngũ Hành Sơn, TP. Đà Nẵng</a></span><br>
                            <span>&emsp;&emsp;<i class="mr-3 fas fa-phone-alt"></i>Điện thoại:<a class="row-bottom-2" href="tel: 0916 190 744"> 0916 190 744</a></span><br>
                            <span>&emsp;&emsp;<i class="mr-3 fas fa-envelope"></i>Email:<a class="row-bottom-2" href="mailto: httrinh.20it10@vku.udn.vn"> httrinh.20it10@vku.udn.vn</a></span>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <div class="title-footer">Quy định - chính sách</div>
                        <hr>
                        <div>
                            <p><a class="row-bottom-2" href="#"><i class="mr-1 fas fa-angle-double-right"></i>Hướng dẫn đặt hàng và thanh toán</a></p>
                            <p><a class="row-bottom-2" href="#"><i class="mr-1 fas fa-angle-double-right"></i>Chính sách giao hàng và đổi trả</a></p>
                            <p><a class="row-bottom-2" href="#"><i class="mr-1 fas fa-angle-double-right"></i>Chính sách bảo mật thông tin</a></p>
                        </div>
                        <img src="{{URL('public/client/img/da-thong-bao.png')}}" alt="Đã thông báo" width="184px">
                    </div>
                    <div class="col-md-3">
                        <div class="title-footer">Fanpage Facebook</div>
                        <hr>
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Flaptoplt%2F&tabs=timeline&width=290&height=140&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="290" height="140" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>
                </div>
                <div class="row container">
                    <div class="col-md-4 px-4 text-center social-footer">
                        <a href="https://www.facebook.com/laptoplt/"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.facebook.com/messages/t/105663118560408"><i class="fab fa-facebook-messenger"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                    <div class="col-md-6 copyright">Coppyright©2021 Laptop LT All Rights Reserved | Designed by LT Team</div>
                </div>
            </div>
        </div>
        <div class="row-bottom">
            <div class="row">
                <div class="col-md-2">
                    <span class="row-bottom-1">Mua hàng:<a class="row-bottom-2" href="tel: 037 855 6163"> 037 855 6163</a></span>
                </div>
                <div class="col-md-3">
                    <span class="row-bottom-1">Hotline:</span>
                    <a class="row-bottom-2" href="tel: 0916 190 744"> 0916 190 744</a>
                    <span> (giờ hành chính)</span>
                </div>
                <div class="col-md-3">
                    <span class="row-bottom-1">Email:</span>
                    <a class="row-bottom-2" href="mailto: pvlinh.20it9@vku.udn.vn"> pvlinh.20it9@vku.udn.vn</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    
    <script src="{{asset('public/client/js/js.js')}}"></script>

    <!-- Sweetalert -->
    <script src="{{asset('public/client/js/sweetalert.js')}}"></script>

    <!-- Light Slider -->
    <script type="text/javascript" src="{{asset('public/client/js/lightgallery-all.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/client/js/lightslider.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/client/js/prettify.js')}}"></script>

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
    <!-- Slick sider, slick products and slick partner -->
    <script type="text/javascript">
        // ----- Slick Slider -----
        $('.slick-slider').slick({
            dots: true,
            infinite: true,
            speed: 600,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
        });
        // ----- Slick Products -----
        $('.slick-product').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            }, {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }]
        });
        // ----- Slick Partner -----
        $('.slick-partner').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            }, {
                breakpoint: 840,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            }]
        });
        $('.slick-new-img').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slick-new-subimg'
        });
        $('.slick-new-subimg').slick({
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slick-new-img',
            centerMode: true,
            focusOnSelect: true,
        });
        $('.slick-product-details').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slick-subProduct-details'
        });
        $('.slick-subProduct-details').slick({
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slick-product-details',
            centerMode: true,
            focusOnSelect: true,
        });
    </script>
    <script type="text/javascript">
        $(window).scroll(function(e) {
            var $el = $('.fixedElement');
            var $wrapTop = $('.wrapper-top');
            var $scrollDiv = $('.scroll-div');
            var isPositionFixed = ($el.css('position') == 'fixed');
            if ($(this).scrollTop() > 200 && !isPositionFixed) {
                $el.css({
                    'position': 'fixed',
                    'top': '0',
                    'right': '0',
                    'left': '0',
                    'z-index': '1000',
                    'bacground-color': '#f7ffec',
                });
                $wrapTop.css({
                    'display': 'none'
                });
                $scrollDiv.css({
                    'display': 'block'
                });
            }
            if ($(this).scrollTop() <
                200 && isPositionFixed) {
                $el.css({
                    'position': 'relative',
                    'padding-top': '0px'
                });
                $wrapTop.css({
                    'display': 'block'
                });
                $scrollDiv.css({
                    'display': 'none'
                });
            }
        });
    </script>

    <!-- Thông báo Cart -->
    <script type="text/javascript">
        $(document).ready(function() {
            // Show cart Quantity
            show_cart_qty();
            function show_cart_qty() {
                $.ajax({
                    url: "{{url('/show-cart-qty')}}",
                    method: "GET",
                    success:function(data) {
                        $('#show-cart-qty').html(data);
                    }
                });
            }
            $('.add-to-cart').click(function() {
                var id= $(this).data('id_product');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                
                $.ajax({
                    url: "{{url('/add-to-cart')}}",
                    method: 'POST',
                    data:{
                        cart_product_id:cart_product_id,
                        cart_product_name:cart_product_name,
                        cart_product_image:cart_product_image,
                        cart_product_price:cart_product_price,
                        cart_product_qty:cart_product_qty,
                        _token:_token
                        
                    },
                    success:function(data) {
                        swal({
                            title: "Đã thêm vào giỏ hàng",
                            text: "Bạn có thể tiếp tục mua sắm hoặc đi đến giỏ hàng để thanh toán",
                            showCancelButton: true,
                            cancelButtonText: "Trở lại",
                            cancelButtonClass: "btn-danger",
                            confirmButtonClass: "btn-grape",
                            confirmButtonText: "Đi đến giỏ hàng",
                            closeOnConfirm: false
                        },
                        function() {
                            window.location.href = "{{url('/gio-hang')}}";
                        });
                        show_cart_qty();
                    }
                });
            });
        });
    </script>
    <!-- // phía cuối file layout.blade.php của views -->
<!-- Đánh giá sao -->
    <script type="text/javascript">
        function remove_background(product_id)
        {
            for (var count = 1; count <= 5; count++)
            {
                $('#' + product_id + '-' + count).css('color', '#ccc');
            }
        }
        // hover chuột đánh giá sao
        $(document).on('mouseenter', '.rating', function(){
            var index = $(this).data("index");
            var product_id = $(this).data("product_id");

            remove_background(product_id);

            for (var count = 1; count <= index; count++)
            {
                $('#' + product_id + '-' + count).css('color', '#ffcc00');
            }
        });
        // thả chuột không đánh giá
        $(document).on('mouseleave', '.rating', function(){
            var index = $(this).data("index");
            var product_id = $(this).data('product_id');
            var rating = $(this).data("rating");

            remove_background(product_id);

            for (var count = 1; count <= 5; count++)
            {
                $('#' + product_id + '-' + count).css('color', '#ffcc00');
            }
        });
        // click đánh giá sao
        $(document).on('click', '.rating', function(){
            var index = $(this).data("index");
            var product_id = $(this).data("product_id");
            var _token = $('input[name="_token"]').val();

            $.ajax({
                    url: "{{url('/insert-rating')}}",
                    method: 'POST',
                    data:{index:index, product_id:product_id, _token:_token},
                success:function(data)
                {
                    if(data == 'done')
                    {
                        alert("Bạn đã đánh giá "+ index +" trên 5");
                    }
                    else 
                    {
                        alert("Lỗi đánh giá");
                    }
                }
            });
        });
    </script>

    <!-- Address -->
    <script type="text/javascript">
        $(document).ready(function(){

            fetch_delivery();

            function fetch_delivery() {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                        url : '{{url('/select-feeship')}}',
                        method: 'POST',
                        data:{_token:_token},
                        success:function(data){
                            $('#load_delivery').html(data); 
                        }
                    });
            }
             
            $(document).on('blur','.fee_feeship_edit',function(){
                var feeship_id = $(this).data('feeship_id');
                var fee_value = $(this).text();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                        url : '{{url('/update-delivery')}}',
                        method: 'POST',
                        data:{feeship_id:feeship_id, fee_value:fee_value, _token:_token},
                        success:function(data){
                            fetch_delivery();
                        }
                    });
            })

            $('.add_delivery').click(function(){
                var city = $('.city').val();
                var province = $('.province').val(); 
                var wards = $('.wards').val();
                var fee_ship = $('.fee_ship').val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url : '{{url('/insert-delivery')}}',
                    method: 'POST',
                    data:{city:city, province:province, wards:wards, fee_ship:fee_ship, _token:_token},
                    success:function(data){
                        fetch_delivery();
                        // alert('Thêm phí vận chuyển thành công');
                    }
                });
            });

            $('.choose').on('change',function(){
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';

                if(action == 'city') {
                    result = 'province';
                } else {
                    result = 'wards';
                }
                $.ajax({
                    url : '{{url('/select-delivery')}}',
                    method: 'POST',
                    data:{action:action, ma_id:ma_id, _token:_token},
                    success:function(data){
                        $('#'+result).html(data); 
                    }
                });
            });
        })   
           
    </script>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="NcecnLXB"></script>
</body>

</html>