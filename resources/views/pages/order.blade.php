@extends('layouts.master')
@section('title', 'Đơn hàng - Comic Shop')
@section('content')

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="headerContent" style="margin-bottom: 40px;">
                <p style="font-size: 18px;">Trang chủ > Đơn hàng</p>
            </div>
            <div class="row" style="background: #f7f7f7; margin-bottom: 50px;">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <div class="orderHeader">
                            <div class="col-lg-10">
                                <div class="orderId" style="font-size: 25px; font-weight: bold; color: #111;">ID đơn hàng: 392512582898</div>
                                <div class="orderTime">Đơn hàng được tạo vào: 10:52:20 15/05/2023</div>
                            </div>
                            <div class="col-lg-2 statusOrderContainer">
                                <div class="statusOrder">Đang giao hàng</div>
                            </div>
                        </div>
                        <div class="orderInfor" style="display: flex;">
                            <div class="col-lg-4">
                                <p style="font-weight: bold; font-size: 20px; color: #111;">Phương thức thanh toán</p>
                                <p style="font-size: 16px;">Thanh toán khi nhận hàng</p>
                            </div>
                            <div class="col-lg-4">
                                <p style="font-weight: bold; font-size: 20px; color: #111;">Hình thức giao hàng</p>
                                <p style="font-size: 16px;">Giao hàng chuẩn (2 - 4 ngày)</p>
                            </div>
                            <div class="col-lg-4">
                                <p style="font-weight: bold; font-size: 20px; color: #111;">Địa chỉ</p>
                                <p style="font-size: 16px;">Nguyễn Văn A</p>
                                <p style="font-size: 16px;">số 123 đường ABC, phường Thanh Xuân Nam, quận Thanh Xuân, thành phố Hà Nội</p>
                                <p style="font-size: 16px;">0123456789</p>
                            </div>
                        </div>
                        <div class="listProduct">
                            <div class="itemProduct" style="display: flex; border-bottom: 1px solid #d6d6d6; padding: 15px 0px;">
                                <div class="col-lg-10" style="display: flex;">
                                    <img class="img-fluid" src="https://product.hstatic.net/200000343865/product/28_a75e3f6ae2bc4c98b3000051ebc40135_master.jpg" style="height: 100px; object-fit: cover; width: 70px; margin-right: 20px;" alt="">
                                    <div style="display: block;">
                                        <a id="titleProductOrder" href="http://127.0.0.1:8000/product/20" style="font-size: 18px; font-weight: bold;">
                                            DORAEMON TRUYỆN NGẮN - TẬP 28
                                        </a>
                                        <div class="small text-muted" style="font-size: 13px;">
                                            Đơn giá: 18,700 VNĐ<span class="mx-2">|</span> 
                                            Số lượng: 3
                                        </div>
                                        <a href="" style="color: #a7ba26;">>>Xem chi tiết</a>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <p style="font-weight: bold; font-size: 18px; text-align: center;">19,000 VNĐ</p>
                                </div>
                            </div>
                            <div class="itemProduct" style="display: flex; border-bottom: 1px solid #d6d6d6; padding: 15px 0px;">
                                <div class="col-lg-10" style="display: flex;">
                                    <img class="img-fluid" src="https://product.hstatic.net/200000343865/product/11---obi_6638551a692c48a9aafbe0580e08d81f_master.jpg" style="height: 100px; object-fit: cover; width: 70px; margin-right: 20px;" alt="">
                                    <div style="display: block;">
                                        <a id="titleProductOrder" href="http://127.0.0.1:8000/product/20" style="font-size: 18px; font-weight: bold;">
                                            CHÚ THUẬT HỒI CHIẾN - TẬP 11
                                        </a>
                                        <div class="small text-muted" style="font-size: 13px;">
                                            Đơn giá: 18,700 VNĐ<span class="mx-2">|</span> 
                                            Số lượng: 3
                                        </div>
                                        <a href="" style="color: #a7ba26;">>>Xem chi tiết</a>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <p style="font-weight: bold; font-size: 18px; text-align: center;">24,000 VNĐ</p>
                                </div>
                            </div>
                            <div class="totalMoney" style="display: flex; margin-top: 15px;">
                                <div class="col-lg-10">
                                    <p style="font-weight: bold; font-size: 23px; color:#111;"> Tổng:</p>
                                </div>
                                <div class="col-lg-2">
                                    <p style="font-weight: bold; font-size: 23px; text-align: center; color:#111;"> 33,000 VNĐ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <style>
            .orderHeader{
                border-bottom: 3px solid #000000;
                margin-bottom: 20px;
                padding-bottom: 15px;
                padding-top: 20px;
                display: flex;
            }
            .orderInfor{
                border-bottom: 3px solid #000000;
                margin-bottom: 20px;
                padding-bottom: 15px;
            }
            .listProduct{
                
                margin-bottom: 20px;
                padding-bottom: 15px;
            }
            .statusOrder{
                background: #a7ba26;
                color: white;
                width: 100%;
                font-size: 21px;
                font-weight: bold;
                text-align: center;
            }
            .statusOrderContainer{
                display: flex;
                text-align: center;
                align-items: center;
            }
            #titleProductOrder:hover{
                color: #a7ba26;
            }
            </style>
            

        </div>
    </div>
    <!-- End Cart -->

    
@endsection