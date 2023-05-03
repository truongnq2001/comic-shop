@extends('layouts.master')
@section('title', 'Trang chủ - Comic Shop')
@section('content')
    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center h-100 min-vh-100">
                <img src="images/banner-doraemon.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome to <br> Comic Shop</strong></h1>
                            <p class="m-b-40">Comic Shop là shop bán truyện tranh uy tín nhất hiện nay. Chúng tôi sẽ <br> đem đến cho các bạn một thế giới truyện tranh với đầy đủ các thể loại.</p>
                            <p><a class="btn hvr-hover" href="#">Khám phá ngay</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center h-100 min-vh-100">
                <img src="images/banner-conan.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome to <br> Comic Shop</strong></h1>
                            <p class="m-b-40">Comic Shop là shop bán truyện tranh uy tín nhất hiện nay. Chúng tôi sẽ <br> đem đến cho các bạn một thế giới truyện tranh với đầy đủ các thể loại.</p>
                            <p><a class="btn hvr-hover" href="#">Khám phá ngay</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center h-100 min-vh-100">
                <img src="images/banner-oncepice.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome to<br> Comic Shop</strong></h1>
                            <p class="m-b-40">Comic Shop là shop bán truyện tranh uy tín nhất hiện nay. Chúng tôi sẽ <br> đem đến cho các bạn một thế giới truyện tranh với đầy đủ các thể loại.</p>
                            <p><a class="btn hvr-hover" href="#">Khám phá ngay</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->
	
	<div class="box-add-products">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="offer-box-products">
						<img class="img-fluid" src="https://wallpaperaccess.com/full/3226440.jpg" alt="" />
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="offer-box-products">
						<img class="img-fluid" src="https://wallpaperaccess.com/full/1084875.jpg" alt="" />
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>MỚI RA MẮT</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">Tất cả</button>
                            <button data-filter=".top-featured">Khuyến mại</button>
                            <button data-filter=".best-seller">Bán chạy nhất</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">
                @foreach ($productNew as $item)
                <div class="col-lg-3 col-md-6 col-sm-6 col-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">New</p>
                            </div>
                            <img src="{{ $item->image }}" class="img-fluid imgProduct" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li>
                                        <a href="{{ route('product', ['id' => $item->id]) }}" data-toggle="tooltip" data-placement="right" title="Chi tiết">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Thêm vào yêu thích"><i class="far fa-heart"></i></a></li>
                                </ul>
                                @auth
                                    <a class="cart" onclick="addCart({{ $item->id }})" style="cursor: pointer;">Thêm vào giỏ hàng</a>
                                @else
                                    <a class="cart" onclick="alert('Vui lòng đăng nhập để mua hàng!')" style="cursor: pointer;">Thêm vào giỏ hàng</a>
                                @endauth
                            </div>
                        </div>
                        <div class="why-text">
                            <a href="{{route('product', ['id' => $item->id]) }}"><h4 style="text-transform: uppercase;"> {{ $item->title }}</h4></a>
                            <h5>{{ number_format($item->price, 0, ',', ',')}} VNĐ</h5> 
                        </div>
                        <script>
                        function addCart(productId){
                            $.ajax({
                                url: "/cart/add",
                                type: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "productId": productId,
                                    "quantity": 1,
                                },
                                success: function(response){
                                    if(response.status === "success"){
                                        // alert(response.message);
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
                                    }
                                },
                                error: function(response){
                                    if (response.status === 'error') {
                                        alert(response.message)
                                    }
                                },                            
                            });
                        }   
                        </script>
                    </div>
                </div> 
                @endforeach

            </div>
        </div>
    </div>
    <style>
    .imgProduct{
        height: 355px; 
        width: 255px; 
        object-fit: cover;
    }  
    </style>
    <!-- End Products  -->

    <!-- Start Blog  -->
    <div class="latest-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>latest blog</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid" src="images/blog-img.jpg" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3>Fusce in augue non nisi fringilla</h3>
                                <p>Nulla ut urna egestas, porta libero id, suscipit orci. Quisque in lectus sit amet urna dignissim feugiat. Mauris molestie egestas pharetra. Ut finibus cursus nunc sed mollis. Praesent laoreet lacinia elit id lobortis.</p>
                            </div>
                            <ul class="option-blog">
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li><a href="#"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#"><i class="far fa-comments"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid" src="images/blog-img-01.jpg" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3>Fusce in augue non nisi fringilla</h3>
                                <p>Nulla ut urna egestas, porta libero id, suscipit orci. Quisque in lectus sit amet urna dignissim feugiat. Mauris molestie egestas pharetra. Ut finibus cursus nunc sed mollis. Praesent laoreet lacinia elit id lobortis.</p>
                            </div>
                            <ul class="option-blog">
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li><a href="#"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#"><i class="far fa-comments"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid" src="images/blog-img-02.jpg" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3>Fusce in augue non nisi fringilla</h3>
                                <p>Nulla ut urna egestas, porta libero id, suscipit orci. Quisque in lectus sit amet urna dignissim feugiat. Mauris molestie egestas pharetra. Ut finibus cursus nunc sed mollis. Praesent laoreet lacinia elit id lobortis.</p>
                            </div>
                            <ul class="option-blog">
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li><a href="#"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#"><i class="far fa-comments"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog  -->


    <!-- Start Instagram Feed  -->
    {{-- <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Instagram Feed  -->
@endsection

 