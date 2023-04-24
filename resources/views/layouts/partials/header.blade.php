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
                <a class="navbar-brand" href="/"><img src="{{ asset('images/logo-comic-long.png') }}" style="width: 60%;" class="logo" alt=""></a>
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
                            <span class="badge" id="totalCart">
                            @if (session()->has('cart'))
                                {{ count(session('cart')) }}
                            @else
                                {{ 0 }}
                            @endif
                            </span>
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
                <?php 
                    $totalMoney = 0;
                ?>
                <ul class="cart-list" id="cartBox">
                    @if (session()->has('cart'))
                        @foreach (session('cart') as $item)
                        <li>
                            <a href="{{ route('product', ['id' => $item['product']->id]) }}" style="height: 70px;" class="photo">
                                <img src="{{ $item['product']->image }}" style="object-fit: cover; height: 70px;" class="cart-thumb" alt="" />
                            </a>
                            <div style="display: table;">
                                <h6>
                                    <a href="{{ route('product', ['id' => $item['product']->id]) }}">{{ $item['product']->title }}</a>
                                </h6>
                                <p>{{ $item['quantity'] }}x <span class="price">{{ $item['product']->price }} VNĐ</span> 
                                    <a style="cursor: pointer" id="deleteCart" onclick="deleteCart({{ $item['product']->id }})">
                                        <i class="fa fa-minus-square" style="cursor: pointer" aria-hidden="true"></i>
                                    </a>
                                </p>
                            </div>
                        </li>
                        <?php 
                            $totalMoney += $item['product']->price*$item['quantity'];
                        ?>
                        @endforeach                       
                    @else
                        <p style="text-align: center" id="emptyCart">Chưa có sản phẩm nào</p>
                    @endif
                    <li class="total">
                        <a href="#" class="btn btn-default hvr-hover btn-cart">CHI TIẾT</a>
                        <span class="float-right"><strong>Tổng</strong>: {{ $totalMoney }} VNĐ</span>
                    </li>
                </ul>
            </li>
            <style>
                a#deleteCart:focus{
                    color: #b0b435;
                }
                a#deleteCart:hover{
                    color: #b0b435;
                }
            </style>
            <script>
            function deleteCart(productId){
                $.ajax({
                    url: "/cart/delete",
                    type: "DELETE",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "productId": productId,
                    },
                    success: function(response){
                        if(response.status === "success"){
                            var sessionArray = response.session;
                            var cart = '';
                            var totalMoney = 0;
                            for (var i = 0; i < sessionArray.length; i++) {
                                cart += `<li>
                                            <a href="#" style="height: 70px;" class="photo">
                                                <img src="` + sessionArray[i]['product'].image + `" style="object-fit: cover; height: 70px;" class="cart-thumb" alt="" />
                                                </a>
                                            <div style="display: table;">
                                                <h6>
                                                    <a href="/product/` + sessionArray[i]['product'].id + `">` + sessionArray[i]['product'].title + `</a>
                                                    </h6>
                                                <p>` + sessionArray[i]['quantity'] + `x <span class="price">` + sessionArray[i]['product'].price + ` VNĐ</span>
                                                    <a style="cursor: pointer" id="deleteCart" onclick="deleteCart(`+ sessionArray[i]['product'].id +`)">
                                                        <i class="fa fa-minus-square" style="cursor: pointer" aria-hidden="true"></i>
                                                    </a>
                                                </p>
                                            </div>
                                        </li>`;
                                    totalMoney += sessionArray[i]['product'].price*sessionArray[i]['quantity'];
                            }
                            $('#cartBox').html(cart);
                            $('#cartBox').append(`<li class="total">
                                                    <a href="#" class="btn btn-default hvr-hover btn-cart">CHI TIẾT</a>
                                                    <span class="float-right"><strong>Tổng</strong>: `+ totalMoney +` VNĐ</span>
                                                </li>`);
                            $('#totalCart').html(sessionArray.length);
                            $('#emptyCart').html('Chưa có sản phẩm nào');
                        }
                    },
                    error: function(response){
                        if (response.status === 'error') {
                            // alert(response.message)
                        }
                    },        
                });
            }
            </script>
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