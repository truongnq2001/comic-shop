@extends('layouts.master')
@section('title', 'Thanh toán - Comic Shop')
@section('content')

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Thông tin khách hàng</h3>
                        </div>
                        <form class="needs-validation" novalidate>
                            {{-- <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">First name *</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                                    <div class="invalid-feedback"> Valid first name is required. </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Last name *</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                                    <div class="invalid-feedback"> Valid last name is required. </div>
                                </div>
                            </div> --}}
                            <div class="mb-3">
                                <label for="username">Tên</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="username" placeholder="" value="{{ Auth::user()->name }}">
                                    <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="" value="{{ Auth::user()->email }}" disabled>
                                <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                            </div>
                            <div class="mb-3">
                                <label for="phonenumber">Số điện thoại *</label>
                                <input type="text" class="form-control" id="phonenumber" placeholder="" required>
                                <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Địa chỉ chi tiết *</label>
                                <input type="text" class="form-control" id="address" placeholder="" required>
                                <div class="invalid-feedback"> Please enter your shipping address. </div>
                            </div>
                            <div class="row">
                                {{-- <div class="col-md-5 mb-3">
                                    <label for="country">Tỉnh/Thành phố *</label>
                                    <select class="wide w-100" id="country">
									<option value="Chọn tỉnh/thành phố" data-display="Select">Chọn tỉnh/thành phố</option>
									<option value="United States">United States</option>
								    </select>
                                    <div class="invalid-feedback"> Please select a valid country. </div>
                                </div> --}}
                                <div class="col-md-4 mb-3">
                                    <label>Tỉnh/Thành phố *</label>
                                    <select class="form-select form-select-sm mb-3 selectBox" id="city" aria-label=".form-select-sm" required>
                                    <option value="" selected>Chọn Tỉnh Thành</option>           
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Quận/Huyện *</label>
                                    <select class="form-select form-select-sm mb-3 selectBox" id="district" aria-label=".form-select-sm" required>
                                    <option value="" selected>Chọn Quận Huyện</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Phường/Xã *</label>
                                    <select class="form-select form-select-sm selectBox" id="ward" aria-label=".form-select-sm" required>
                                    <option value="" selected>Chọn Phường Xã</option>
                                    </select>
                                </div>
                            </div>
                            <style>
                            .selectBox{
                                min-height: 40px;
                                border-radius: 0px;
                                border: 1px solid #e8e8e8;
                                box-shadow: none !important;
                                font-size: 15px;
                                min-width: 150px;
                            }
                            </style>
                            <div class="title"> <span>Hình thức thanh toán</span> </div>
                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                                    <label class="custom-control-label" for="credit">Thanh toán khi nhận hàng</label>
                                </div>
                            </div>
                           
                            <div class="row">
                                
                                <div class="col-md-6 mb-3">
                                    <div class="payment-icon">
                                        <ul>
                                            <li><img class="img-fluid" src="images/payment-icon/1.png" alt=""></li>
                                            <li><img class="img-fluid" src="images/payment-icon/2.png" alt=""></li>
                                            <li><img class="img-fluid" src="images/payment-icon/3.png" alt=""></li>
                                            <li><img class="img-fluid" src="images/payment-icon/5.png" alt=""></li>
                                            <li><img class="img-fluid" src="images/payment-icon/7.png" alt=""></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-1"> </form>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="shipping-method-box">
                                <div class="title-left">
                                    <h3>Hình thức giao hàng</h3>
                                </div>
                                <div class="mb-4">
                                    <div class="custom-control custom-radio">
                                        <input id="shippingOption1" name="shipping-option" class="custom-control-input" checked="checked" type="radio">
                                        <label class="custom-control-label" for="shippingOption1">Giao hàng chuẩn</label> <span class="float-right font-weight-bold">Miễn phí</span> </div>
                                    <div class="ml-4 mb-2 small">(2-4 ngày)</div>
                                    {{-- <div class="custom-control custom-radio">
                                        <input id="shippingOption2" name="shipping-option" class="custom-control-input" type="radio">
                                        <label class="custom-control-label" for="shippingOption2">Giao hàng nhanh</label> <span class="float-right font-weight-bold">10,000 VNĐ</span> </div>
                                    <div class="ml-4 mb-2 small">(2-4 ngày)</div>
                                    <div class="custom-control custom-radio">
                                        <input id="shippingOption3" name="shipping-option" class="custom-control-input" type="radio">
                                        <label class="custom-control-label" for="shippingOption3">Hỏa tốc</label> <span class="float-right font-weight-bold">50,000 VNĐ</span> </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Thông tin giỏ hàng</h3>
                                </div>
                                <?php
                                $totalMoney = 0;
                                ?>
                                <div class="rounded p-2 bg-light">
                                    @if (session()->has('cart'))
                                        @foreach (session('cart') as $item)
                                        <div class="media mb-2 border-bottom">
                                            <div class="media-body"> <a href="detail.html" style="font-size: 15px;"> {{ $item['product']->title }}</a>
                                                <div class="small text-muted" style="font-size: 13px;">Đơn giá: {{ number_format($item['product']->price, 0, ',', ',') }} VNĐ<span class="mx-2">|</span> Số lượng: {{ $item['quantity'] }} <span class="mx-2">|</span> Tổng tiền: {{ number_format($item['product']->price*$item['quantity'], 0, ',', ',') }} VNĐ</div>
                                            </div>
                                        </div>
                                        <?php
                                        $totalMoney += $item['product']->price*$item['quantity'];
                                        ?>
                                        @endforeach
                                    @endif
                                    {{-- <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="detail.html"> Lorem ipsum dolor sit amet</a>
                                            <div class="small text-muted">Price: $60.00 <span class="mx-2">|</span> Qty: 1 <span class="mx-2">|</span> Subtotal: $60.00</div>
                                        </div>
                                    </div>
                                    <div class="media mb-2">
                                        <div class="media-body"> <a href="detail.html"> Lorem ipsum dolor sit amet</a>
                                            <div class="small text-muted">Price: $40.00 <span class="mx-2">|</span> Qty: 1 <span class="mx-2">|</span> Subtotal: $40.00</div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3 style="font-size: 18px;">Thông tin thanh toán</h3>
                                </div>
                                
                                <div class="d-flex">
                                    <h4>Sản phẩm</h4>
                                    <div class="ml-auto font-weight-bold"> {{ number_format($totalMoney, 0, ',', ',') }} VNĐ </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Khuyến mại</h4>
                                    <div class="ml-auto font-weight-bold"> 0 VNĐ </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Phí giao hàng</h4>
                                    <div class="ml-auto font-weight-bold"> Miễn phí </div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Tổng tiền</h5>
                                    <div class="ml-auto h5"> {{ number_format($totalMoney, 0, ',', ',') }} VNĐ </div>
                                </div>
                                <hr> </div>
                        </div>
                        <div class="col-12 d-flex shopping-box"> 
                            <button class="ml-auto btn hvr-hover" id="btnOrder" data-toggle="modal" data-target="#exampleModalCenter" style="color: white; font-size: 19px;">Đặt hàng</button>
                            <style>
                            #btnOrder:focus{
                                box-shadow: none;
                            }
                            </style> 
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLongTitle">Đặt hàng thành công</h3>
                                </div>
                                <div class="modal-body">
                                Đơn hàng sẽ được giao đến bạn trong 2-4 ngày nữa
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal">Đóng</button>
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
                                </div>
                            </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
	var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
    url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json", 
    method: "GET", 
    responseType: "application/json", 
    };
    var promise = axios(Parameter);
    promise.then(function (result) {
    renderCity(result.data);
    });

    function renderCity(data) {
    for (const x of data) {
        citis.options[citis.options.length] = new Option(x.Name, x.Id);
    }
    citis.onchange = function () {
        district.length = 1;
        ward.length = 1;
        if(this.value != ""){
        const result = data.filter(n => n.Id === this.value);

        for (const k of result[0].Districts) {
            district.options[district.options.length] = new Option(k.Name, k.Id);
        }
        }
    };
    district.onchange = function () {
        ward.length = 1;
        const dataCity = data.filter((n) => n.Id === citis.value);
        if (this.value != "") {
        const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

        for (const w of dataWards) {
            wards.options[wards.options.length] = new Option(w.Name, w.Id);
        }
        }
    };
    }
	</script>
    <!-- End Cart -->

@endsection