@extends('layouts.master')
@section('title', $product->title)
@section('content')
    <!-- Start All Title Box -->
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="headerContent" style="margin-bottom: 40px;">
                <p style="font-size: 18px;">Trang chủ > {{$product->category->name}} > {{ $product->title }}</p>
            </div>
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="{{ $product->image }}" alt="First slide"> </div>
                            {{-- <div class="carousel-item"> <img class="d-block w-100" src="images/big-img-02.jpg" alt="Second slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="images/big-img-03.jpg" alt="Third slide"> </div> --}}
                        </div>
                        {{-- <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev"> 
						<i class="fa fa-angle-left" aria-hidden="true"></i>
						<span class="sr-only">Previous</span> 
					</a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next"> 
						<i class="fa fa-angle-right" aria-hidden="true"></i> 
						<span class="sr-only">Next</span> 
					</a>
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                <img class="d-block w-100 img-fluid" src="images/smp-img-01.jpg" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="1">
                                <img class="d-block w-100 img-fluid" src="images/smp-img-02.jpg" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="2">
                                <img class="d-block w-100 img-fluid" src="images/smp-img-03.jpg" alt="" />
                            </li>
                        </ol> --}}
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{{ $product->title }}</h2>
                        <h3 style="font-size: 30px; font-weight: bold; color:rgb(176 180 53);">{{ number_format($product->price, 0, ',', ',')}} VNĐ</h3>
                        <p style="margin-bottom: 5px;">ISBN: <span style="font-weight: bold;">{{ $product->ibsn_code }}</span></p>
                        <p style="margin-bottom: 5px;">Tác giả: <span style="font-weight: bold; color:rgb(176 180 53);">{{ $product->author }}</span></p>
                        <p style="margin-bottom: 5px;">Đối tượng: <span style="font-weight: bold; color:rgb(176 180 53);">{{ $product->age }}</span></p>
                        <p style="margin-bottom: 5px;">Khuôn khổ: {{ $product->size }} cm</p>
                        <p style="margin-bottom: 5px;">Số trang: {{ $product->number_of_pages }}</p>
                        <p style="margin-bottom: 5px;">Định dạng: {{ $product->format }}</p>
                        <p style="margin-bottom: 5px;">Trọng lượng: {{ $product->weight }} gram</p>
                        <p style="margin-bottom: 5px; font-weight: bold;">Số lượng:</p>
						
                        <div class="input-group quantity mr-3" style="width: 130px; margin-bottom: 30px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus changeQuantity" id="minusQuantity" onclick="minus({{ $product->id }})" style="background: #b0b435; border-radius: 0px; border: none;">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input id="quantityInput{{ $product->id }}" type="text" style="background: #ebebeb;" class="form-control border-0 text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus changeQuantity" id="plusQuantity" onclick="plus({{ $product->id }})" style="background: #b0b435; border-radius: 0px; border: none;">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                            <style>
                            button.changeQuantity:focus{
                                box-shadow: none;
                            }
                            input#myInput{
                                box-shadow: none;
                            }
                            </style>
                        </div>

						<div class="price-box-bar">
							<div class="cart-and-bay-btn">
								<a class="btn hvr-hover" onclick="buyNow({{ $product->id }})" data-fancybox-close="" href="{{ route('cart') }}">Mua ngay</a>
								<a class="btn hvr-hover" onclick="addNumCart({{ $product->id }})" data-fancybox-close="" href="#">Thêm vào giỏ hàng</a>
							</div>
						</div>

                        <script>
                        function minus(productId){
                            var currentValue = $('#quantityInput' + productId).val();
                            var intValue = parseInt(currentValue);

                            intValue = intValue - 1;
                            if(intValue < 1){
                                intValue = 1;
                            }

                            $('#quantityInput' + productId).val(intValue);
                        }    
                        function plus(productId){
                            var currentValue = $('#quantityInput' + productId).val();
                            var intValue = parseInt(currentValue);

                            intValue = intValue + 1;

                            $('#quantityInput' + productId).val(intValue);
                        }  
                        function buyNow(productId){
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
                                    }
                                },
                                error: function(response){
                                    if (response.status === 'error') {
                                        // alert(response.message)
                                    }
                                }, 
                            });    
                        } 
                        function addNumCart(productId){
                            var quantity = $('#quantityInput' + productId).val();
                            $.ajax({
                                url: "/cart/add",
                                type: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "productId": productId,
                                    "quantity": quantity,
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
                                        alert('Lưu giỏ hàng thành công!');
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

						<div class="add-to-btn">
							<div class="add-comp">
								<a class="btn hvr-hover" href="#"><i class="fas fa-heart"></i> Thêm vào yêu thích</a>
							</div>
							<div class="share-bar">
								<a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
								<a class="btn hvr-hover" href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
								<a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
								<a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
							</div>
						</div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 50px;">
                <div class="descriptionContainer">
                    <h2 style="font-weight: bold;">Mô tả:</h2>
                    <p style="font-size: 16px;">{{ $product->description }}</p>
                </div>
            </div>
			
			<div class="row my-5">
				<div class="card card-outline-secondary my-4 col-12">
					<div class="card-header">
						<h2>Bình luận về sản phẩm</h2>
					</div>
					<div class="card-body">
						<div class="media mb-3">
							<div class="mr-2"> 
								<img class="rounded-circle border p-1" src="/images/user-avatar.png" style="width: 70px;" alt="Generic placeholder image">
							</div>
							<div class="media-body">
								<p style="font-size: 16px;">Truyện rất hay, mọi người nên mua nhé.</p>
								<p class="text-muted" style="font-size: 13px;">Đăng bởi Nguyen Van A vào lúc 11:43:34 28/4/2023</p>
							</div>
						</div>
						<hr>
						{{-- <div class="media mb-3">
							<div class="mr-2"> 
								<img class="rounded-circle border p-1" src="/images/user-avatar.png" style="width: 70px;" alt="Generic placeholder image">
							</div>
							<div class="media-body">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
								<small class="text-muted">Posted by Anonymous on 3/1/18</small>
							</div>
						</div>
						<hr>
						<div class="media mb-3">
							<div class="mr-2"> 
								<img class="rounded-circle border p-1" src="/images/user-avatar.png" style="width: 70px;" alt="Generic placeholder image">
							</div>
							<div class="media-body">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
								<small class="text-muted">Posted by Anonymous on 3/1/18</small>
							</div>
						</div>
						<hr> --}}
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Nội dung</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
						<a href="#" class="btn hvr-hover">Bình luận</a>
					</div>
				  </div>
			</div>

            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Bạn có thể thích</h1>
                    </div>
                    <div class="featured-products-box owl-carousel owl-theme">
                        @foreach ($relatedProducts as $item)
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <a href="{{ route('product', ['id' => $item->id]) }}">
                                        <img src="{{ $item->image }}" class="img-fluid" alt="Image" style="height: 355px; width: 255px; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="why-text">
                                    <a href="{{ route('product', ['id' => $item->id]) }}"><h4>{{ $item->title }}</h4></a>
                                    <h5> {{ number_format($item->price, 0, ',', ',')}} VNĐ</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        {{-- <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="images/img-pro-02.jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>Lorem ipsum dolor sit amet</h4>
                                    <h5> $9.79</h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="images/img-pro-03.jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>Lorem ipsum dolor sit amet</h4>
                                    <h5> $9.79</h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="images/img-pro-04.jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>Lorem ipsum dolor sit amet</h4>
                                    <h5> $9.79</h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="images/img-pro-01.jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>Lorem ipsum dolor sit amet</h4>
                                    <h5> $9.79</h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="images/img-pro-02.jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>Lorem ipsum dolor sit amet</h4>
                                    <h5> $9.79</h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="images/img-pro-03.jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>Lorem ipsum dolor sit amet</h4>
                                    <h5> $9.79</h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="images/img-pro-04.jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>Lorem ipsum dolor sit amet</h4>
                                    <h5> $9.79</h5>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->

    
@endsection