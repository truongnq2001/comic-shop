@extends('layouts.master')
@section('title', 'Đơn hàng - Comic Shop')
@section('content')

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="headerContent" style="margin-bottom: 40px;">
                <p style="font-size: 18px;">Trang chủ > Đơn hàng</p>
            </div>
            @for ($i = count($orders)-1; $i >= 0; $i--)
            <div class="row" style="background: #f7f7f7; margin-bottom: 50px;">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <div class="orderHeader">
                            <div class="col-lg-10">
                                <div class="orderId" style="font-size: 25px; font-weight: bold; color: #111;">ID đơn hàng: {{ $orders[$i]->order_id_show }}</div>
                                <div class="orderTime">Đơn hàng được tạo vào: {{ \Carbon\Carbon::parse($orders[$i]->created_at)->format('H:i:s d-m-Y') }}</div>
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
                                <p style="font-size: 16px; color:#a7ba26; font-weight: bold;">Freeship</p>
                                <p style="font-size: 16px;">Giao hàng chuẩn (2 - 4 ngày)</p>
                            </div>
                            <div class="col-lg-4">
                                <p style="font-weight: bold; font-size: 20px; color: #111;">Địa chỉ</p>
                                <p style="font-size: 16px;">{{ $orders[$i]->user->name }}</p>
                                <p style="font-size: 16px;">{{ $orders[$i]->address_detail }}, {{ $orders[$i]->ward }}, {{ $orders[$i]->district }}, {{ $orders[$i]->city }}</p>
                                <p style="font-size: 16px;">{{ $orders[$i]->phone_number }}</p>
                            </div>
                        </div>
                        <div class="listProduct">
                            @foreach ($orders[$i]->orderDetails as $orderDetail)
                            <div class="itemProduct" style="display: flex; border-bottom: 1px solid #d6d6d6; padding: 15px 0px;">
                                <div class="col-lg-10" style="display: flex;">
                                    <img class="img-fluid" src="{{ $orderDetail->product->image }}" style="height: 100px; object-fit: cover; width: 70px; margin-right: 20px;" alt="">
                                    <div style="display: block;">
                                        <a id="titleProductOrder" href="{{ route('product', ['id' => $orderDetail->product->id]) }}" style="font-size: 18px; font-weight: bold;">
                                            {{ $orderDetail->product->title }}
                                        </a>
                                        <div class="small text-muted" style="font-size: 13px;">
                                            Đơn giá: {{ number_format($orderDetail->product->price, 0, ',', ',')}} VNĐ<span class="mx-2">|</span> 
                                            Số lượng: {{ $orderDetail->quantity }}
                                        </div>
                                        <a href="{{ route('product', ['id' => $orderDetail->product->id]) }}" style="color: #a7ba26;">>> Xem chi tiết</a>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <p style="font-weight: bold; font-size: 18px; text-align: center;">{{ number_format($orderDetail->product->price*$orderDetail->quantity, 0, ',', ',')}} VNĐ</p>
                                </div>
                            </div>
                            @endforeach
                            <div class="totalMoney" style="display: flex; margin-top: 15px;">
                                <div class="col-lg-10">
                                    <p style="font-weight: bold; font-size: 23px; color:#111;"> Tổng:</p>
                                </div>
                                <div class="col-lg-2">
                                    <p style="font-weight: bold; font-size: 23px; text-align: center; color:#111;"> {{ number_format($orders[$i]->total_money, 0, ',', ',')}} VNĐ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
            
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