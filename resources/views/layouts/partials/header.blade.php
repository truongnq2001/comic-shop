<!-- Start Main Top -->
<div class="main-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                
                <div class="right-phone-box">
                    <p>Hotline : <a href="#"> +84 123 456 789</a></p>
                </div>
                <div class="our-link">
                    <ul>
                        @auth
                            <li><a href="#" style="text-transform: none !important;"><i class="fa fa-user s_color"></i> {{ Auth::user()->name }}</a></li>
                        @else
                            <li><a href="#"><i class="fa fa-user s_color"></i> Tài khoản</a></li>
                        @endauth
                        <li><a href="#"><i class="fas fa-location-arrow"></i> Vị trí của chúng tôi</a></li>
                        <li><a href="#"><i class="fas fa-headset"></i> Liên hệ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                @auth
                    <div class="login-box">
                        <select id="basic" class="selectpicker show-tick form-control" onchange="location = this.value;">
                            <option disabled selected>{{ Auth::user()->email }}</option>
                            <option value="{{ route('logout') }}">Đăng xuất</option>
                        </select>
                    </div> 
                @else
                    <div class="login-box">
                        <select id="basic" class="selectpicker show-tick form-control" onchange="location = this.value;">
                            <option selected>Tài khoản</option>
                            <option value="{{ route('register') }}">Đăng ký</option>
                            <option value="{{ route('login') }}">Đăng nhập</option>
                        </select>
                    </div>        
                @endauth
                <div class="text-slid-box">
                    <div id="offer-box" class="carouselTicker">
                        <ul class="offer-box">
                            <li>
                                <i class="fab fa-opencart"></i> Khuyến mãi truyện tranh mới lên tới 20%
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Comic Shop - Shop bán truyện tranh uy tín nhất
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Giao hàng sau 3 ngày
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Miễn phí ship với đơn hàng từ 60.000 VNĐ
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Giao hàng sau 3 ngày
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Comic Shop - Shop bán truyện tranh uy tín nhất
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Khuyến mãi truyện tranh mới lên tới 20%
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Miễn phí ship với đơn hàng từ 60.000 VNĐ 
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Top -->

<!-- Start Main Top -->
<header class="main-header">
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
        <div class="container">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
                <a class="navbar-brand" href="index.html"><img src="images/logo-comic-long.png" style="width: 60%;" class="logo" alt=""></a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="nav-item active"><a class="nav-link" href="index.html">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">Về Chúng tôi</a></li>
                    <li class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Thể loại <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="shop.html">Cổ trang</a></li>
                            <li><a href="shop-detail.html">Thiếu nhi</a></li>
                            <li><a href="cart.html">Thể thao</a></li>
                            <li><a href="checkout.html">Thần đồng đất việt</a></li>
                            <li><a href="my-account.html">Conan</a></li>
                            <li><a href="wishlist.html">Doraemon</a></li>
                            <li><a href="wishlist.html">Khác</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="gallery.html">Mục yêu thích</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact-us.html">Liên hệ</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                    <li class="side-menu">
                        <a href="#">
                            <i class="fa fa-shopping-bag"></i>
                            <span class="badge">3</span>
                            <p>Giỏ hàng</p>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->
        </div>
        <!-- Start Side Menu -->
        <div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <li class="cart-box">
                <ul class="cart-list">
                    <li>
                        <a href="#" class="photo"><img src="images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
                        <h6><a href="#">Conan tập 7 </a></h6>
                        <p>1x - <span class="price">20.000 VNĐ</span></p>
                    </li>
                    <li>
                        <a href="#" class="photo"><img src="images/img-pro-02.jpg" class="cart-thumb" alt="" /></a>
                        <h6><a href="#">Doraemon - Cuộc phiêu lưu vào thiên hà</a></h6>
                        <p>1x - <span class="price">24.000 VNĐ</span></p>
                    </li>
                    <li>
                        <a href="#" class="photo"><img src="images/img-pro-03.jpg" class="cart-thumb" alt="" /></a>
                        <h6><a href="#">Conan đặc biệt - Điều kì lạ ở phòng 205</a></h6>
                        <p>1x - <span class="price">33.000 VNĐ</span></p>
                    </li>
                    <li class="total">
                        <a href="#" class="btn btn-default hvr-hover btn-cart">CHI TIẾT</a>
                        <span class="float-right"><strong>Tổng</strong>: 77.000 VNĐ</span>
                    </li>
                </ul>
            </li>
        </div>
        <!-- End Side Menu -->
    </nav>
    <!-- End Navigation -->
</header>
<!-- End Main Top -->

<!-- Start Top Search -->
<div class="top-search">
    <div class="container">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" class="form-control" placeholder="Search">
            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
        </div>
    </div>
</div>
<!-- End Top Search -->