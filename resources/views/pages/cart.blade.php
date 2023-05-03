@extends('layouts.master')
@section('title', 'Giỏ hàng - Comic Shop')
@section('content')

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="headerContent" style="margin-bottom: 40px;">
                <p style="font-size: 18px;">Trang chủ > Giỏ hàng</p>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên truyện</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th>Lưu</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (session()->has('cart') && count(session('cart')) != 0)
                                    @foreach (session('cart') as $item)
                                    <tr id="product{{ $item['product']->id }}">
                                        <td class="thumbnail-img">
                                            <a href="#">
                                                <img class="img-fluid" src="{{ $item['product']->image }}" style="height: 100px; object-fit: cover; width: 70px;" alt="" />
                                            </a>
                                        </td>
                                        <td class="name-pr">
                                            <a href="{{ route('product', ['id' => $item['product']->id]) }}">
                                                {{ $item['product']->title }}
                                            </a>
                                        </td>
                                        <td class="price-pr">
                                            <p>{{ number_format($item['product']->price, 0, ',', ',')}} VNĐ</p>
                                        </td>
                                        <td>
                                            <div class="input-group quantity mr-3" style="width: 130px;">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-primary btn-minus changeQuantity" id="minusQuantity" onclick="minus({{ $item['product']->id }})" style="background: #b0b435; border-radius: 0px; border: none;">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                                <input id="quantityInput{{ $item['product']->id }}" type="text" style="background: #ebebeb;" class="form-control border-0 text-center" value="{{ $item['quantity'] }}">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-primary btn-plus changeQuantity" id="plusQuantity" onclick="plus({{ $item['product']->id }})" style="background: #b0b435; border-radius: 0px; border: none;">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-pr">
                                            <p>{{ number_format($item['product']->price*$item['quantity'], 0, ',', ',')}} VNĐ</p>
                                        </td>
                                        <td class="save-pr">
                                            <a style="cursor: pointer;" onclick="updateCart({{ $item['product']->id }})">
                                                <i class="fa-solid fa-floppy-disk" id="btnCart" style="font-size: 22px;" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td class="remove-pr">
                                            <a style="cursor: pointer;" onclick="deleteCart({{ $item['product']->id }})">
                                                <i class="fa fa-trash" id="btnCart" style="font-size: 22px;" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
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
                            
                            // function deleteCartProduct(productId){
                            //     var productName = '#product'+ productId;
                            //     var productBox = '#cart'+ productId;
                            //     $(productName).attr('hidden', true);
                            //     $(productBox).attr('hidden', true);
                            //     $.ajax({
                            //         url: "/cart/delete",
                            //         type: "DELETE",
                            //         data: {
                            //             "_token": "{{ csrf_token() }}",
                            //             "productId": productId,
                            //         },
                            //         success: function(response){
                            //             if(response.status === "success"){
                            //                 var sessionArray = response.session;
                            //                 $('#totalCart').html(sessionArray.length);
                            //             }
                            //         },
                            //         error: function(response){
                            //             if (response.status === 'error') {
                            //                 // alert(response.message)
                            //             }
                            //         },        
                            //     });
                            // }
                            function updateCart(productId){
                                var quantity = $('#quantityInput' + productId).val();
                                $.ajax({
                                    url: "/cart/update",
                                    type: "PUT",
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        "productId": productId,
                                        "quantity": quantity,
                                    },
                                    success: function(response){
                                        if(response.status === "success"){
                                            // var sessionArray = response.session;
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
                            <style>
                            button.changeQuantity:focus{
                                box-shadow: none;
                            }
                            input#myInput{
                                box-shadow: none;
                            }
                            #btnCart:hover{
                                color: #b0b435;
                            }
                            #btnCart:focus{
                                color: #b0b435;
                            }
                            </style>
                            @if (!session()->has('cart') || count(session('cart')) == 0)
                                <tr>
                                    <p style="text-align: center;">Chưa có sản phẩm nào</p>
                                </tr>
                            @endif
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    {{-- <div class="coupon-box">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Nhập mã khuyến mại" aria-label="Coupon code" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="button">Áp dụng</button>
                            </div>
                        </div>
                    </div> --}}

                </div>
                @if (session()->has('cart') && count(session('cart')) != 0)
                <div class="col-lg-6 col-sm-6">
                    <div class="shopping-box" style="text-align: right;">
                        <a href="{{ route('cart.checkout') }}" class="ml-auto btn hvr-hover">Thanh toán</a>
                    </div>
                </div>
                @endif
            </div>

            {{-- <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold"> $ 130 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 40 </div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Coupon Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 10 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Tax</h4>
                            <div class="ml-auto font-weight-bold"> $ 2 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Shipping Cost</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5"> $ 388 </div>
                        </div>
                        <hr> 
                    </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="checkout.html" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div> --}}

        </div>
    </div>
    <!-- End Cart -->

    
@endsection