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
                                                                <a href="/cart" class="btn btn-default hvr-hover btn-cart">CHI TIẾT</a>
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

            <?php
            $startPage = 1;
            ?>
			
			<div class="row my-5" id="commentBox">
				<div class="card card-outline-secondary my-4 col-12">
					<div class="card-header">
						<h2 id="numComment">Bình luận về sản phẩm ({{ $commentList->total() }})</h2>
					</div>
					<div class="card-body">
                        <div id="commentContainer">
                            @if (!$commentList)
                            <p style="text-align: center;">Chưa có bình luận nào</p> 
                            @endif
                            @foreach ($commentList as $item)
                            <div class="media mb-3">
                                <div class="mr-2"> 
                                    <img class="rounded-circle border p-1" src="/images/user-avatar.png" style="width: 70px;" alt="Generic placeholder image">
                                </div>
                                <div class="media-body" style="width: 80%;">
                                    <p style="font-size: 16px;">{{ $item->content }}</p>
                                    <div style="display: flex;">
                                        <p class="text-muted" style="font-size: 13px;">Đăng bởi <span style="font-weight: bold;">{{ $item->user->name }}</span> vào lúc {{ $item->created_at }}</p>
                                        @if (isset(Auth::user()->id) && $item->user_id == Auth::user()->id)
                                        <p class="deleteComment" style="margin-left: 20px; display: flex; justify-content: center; align-items: center;">
                                            <i data-toggle="modal" data-target="#exampleModalCenter{{ $item->id }}" style="cursor: pointer;" class="fa-solid fa-trash"></i>
                                        </p>
                                        <div class="modal fade" id="exampleModalCenter{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title" id="exampleModalLongTitle">Comic Shop</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        Bạn có chắc chắn muốn xóa bình luận này không?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal" onclick="deleteComment({{ $item->product_id }}, {{ $item->id }})">Có</button>
                                                        <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal">Không</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @endforeach
                        </div>
                        @if ($commentList)
                        <a id="loadMore" onclick="loadComment()" data-product-id="{{ $product->id }}" data-page="2" @if ($commentList->total() <= 3) hidden @endif>Xem thêm</a>
                        @endif
                        <style>
                            #loadMore{
                                color: black; 
                                display: flex; 
                                justify-content: center; 
                                cursor: pointer;
                            }
                            #loadMore:hover{
                                color:#b0b435 !important;
                            }
                        </style>
                        <div class="form-group" id="contentComment">
                            <label for="exampleFormControlTextarea1">Nội dung</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                            <p id="emptyComment" style="color: red;"></p>
                        </div>
                        @if (isset(Auth::user()->id))
                        <a onclick="addComment({{ $product->id }}, {{ Auth::user()->id }})" class="btn hvr-hover" style="cursor: pointer;">Bình luận</a>
                        @else
                        <a data-toggle="modal" data-target="#exampleModalCenter" class="btn hvr-hover" style="cursor: pointer;">Bình luận</a>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLongTitle">Comic Shop</h3>
                                    </div>
                                    <div class="modal-body">
                                        Vui lòng đăng nhập để bình luận!
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <style>
                        .deleteComment>i:hover{
                            color: #b0b435;
                        }
                        </style>
                        <style>
                            #closeModal{
                                background: black;
                            }
                            #closeModal:focus{
                                background: #b0b435;
                                box-shadow: none;
                                border-color: #b0b435;
                            }
                            #closeModal:hover{
                                background: #b0b435;
                                border-color: #b0b435;
                            }
                            </style>
                        <script>
                            function refreshComment(productId, commentArray, userLogin){
                                var comment = '';
                                commentArray.forEach(element => {
                                    if (userLogin == element.user_id) {
                                        comment += `<div class="media mb-3">
                                                <div class="mr-2"> 
                                                    <img class="rounded-circle border p-1" src="/images/user-avatar.png" style="width: 70px;" alt="Generic placeholder image">
                                                </div>
                                                <div class="media-body" style="width: 80%;">
                                                    <p style="font-size: 16px;">`+ element.content +`</p>
                                                    <div style="display: flex;">
                                                        <p class="text-muted" style="font-size: 13px;">Đăng bởi <span style="font-weight: bold;">`+ element.user_name +`</span> vào lúc `+ element.created_at +`</p>
                                                        <p class="deleteComment" style="margin-left: 20px; display: flex; justify-content: center; align-items: center;">
                                                            <i data-toggle="modal" data-target="#exampleModalCenter" style="cursor: pointer;" class="fa-solid fa-trash"></i>
                                                        </p>
                                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h3 class="modal-title" id="exampleModalLongTitle">Comic Shop</h3>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Bạn có chắc chắn muốn xóa bình luận này không?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal" onclick="deleteComment(`+ productId +`, `+ element.id +`, `+ userLogin +`)">Có</button>
                                                                        <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal">Không</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>`;
                                    } else{
                                        comment += `<div class="media mb-3">
                                                <div class="mr-2"> 
                                                    <img class="rounded-circle border p-1" src="/images/user-avatar.png" style="width: 70px;" alt="Generic placeholder image">
                                                </div>
                                                <div class="media-body" style="width: 80%;">
                                                    <p style="font-size: 16px;">`+ element.content +`</p>
                                                    <div style="display: flex;">
                                                        <p class="text-muted" style="font-size: 13px;">Đăng bởi <span style="font-weight: bold;">`+ element.user_name +`</span> vào lúc `+ element.created_at +`</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>`;
                                    }
                                });
                                $('#commentContainer').html(comment);
                                if (commentArray.length == 0) {
                                    $('#commentContainer').html(`<p style="text-align: center;">Chưa có bình luận nào</p>`);
                                }
                                $('#contentComment').html(`<label for="exampleFormControlTextarea1">Nội dung</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                            <p id="emptyComment" style="color: red;"></p>`);
                                $('#numComment').html(`<h2 id="numComment">Bình luận về sản phẩm (`+ commentArray.length +`)</h2>`);
                            }   

                            function loadComment(){
                                $.ajax({
                                url: "/comment/load_more",
                                type: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "content": $('#exampleFormControlTextarea1').val(),
                                    "productId": $('#loadMore').data('product-id'),
                                    "page": $('#loadMore').data('page'),
                                },
                                success: function(response){
                                    if(response.status === "success"){
                                        $('#commentContainer').append(response.html);
                                        $('#loadMore').data('page', parseInt(response.page) + 1);
                                        if (response.page == 'max') {
                                            $('#loadMore').hide();
                                        }
                                    }
                                },
                                error: function(response){
                                    if (response.status === 'error') {
                                        // alert(response.message)
                                    }
                                }, 
                            });    
                            }

                            function addComment(productId, userId){
                            
                            if (!$('#exampleFormControlTextarea1').val()){
                                return $('#emptyComment').html(`Vui lòng nhập nội dung để bình luận.`);
                            }

                            $.ajax({
                                url: "/comment/add",
                                type: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "content": $('#exampleFormControlTextarea1').val(),
                                    "productId": productId,
                                    "userId": userId,
                                },
                                success: function(response){
                                    if(response.status === "success"){
                                        $('#commentBox').html(response.html);
                                    }
                                },
                                error: function(response){
                                    if (response.status === 'error') {
                                        // alert(response.message)
                                    }
                                }, 
                            });    
                        }  

                        function deleteComment(productId, commentId){
                            $.ajax({
                                url: "/comment/delete",
                                type: "DELETE",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "commentId": commentId,
                                    "productId": productId,
                                },
                                success: function(response){
                                    if(response.status === "success"){
                                        $('#commentBox').html(response.html);
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