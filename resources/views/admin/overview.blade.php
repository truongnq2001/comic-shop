@extends('admin.dashboard')
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Tổng số sản phẩm</p>
                                    <h4 class="mb-2">{{ $productTotal }}</h4>
                                    <p class="text-muted mb-0"></p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="ri-book-open-line font-size-24"></i>  
                                    </span>
                                </div>
                            </div>                                            
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Số lượng đặt hàng</p>
                                    <h4 class="mb-2">938</h4>
                                    <p class="text-muted mb-0"></p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="ri-shopping-cart-2-line font-size-24"></i>  
                                    </span>
                                </div>
                            </div>                                              
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Số người dùng</p>
                                    <h4 class="mb-2">{{ $userTotal }}</h4>
                                    <p class="text-muted mb-0"></p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="ri-user-3-line font-size-24"></i>  
                                    </span>
                                </div>
                            </div>                                              
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Số lượng danh mục</p>
                                    <h4 class="mb-2">{{ $categoryTotal }}</h4>
                                    <p class="text-muted mb-0"></p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="ri-bar-chart-horizontal-fill font-size-24"></i>  
                                    </span>
                                </div>
                            </div>                                              
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
            <!-- end row -->
            <!-- end row -->

            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title mb-4">Danh sách sản phẩm mới cập nhật</h2>                           
                                <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên truyện</th>
                                            <th>Tác giả</th>
                                            <th>Thể loại</th>
                                            <th>Giá tiền</th>
                                            <th style="width: 120px;">Ngày cập nhật</th>
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                        @foreach ($products as $index => $item)
                                        <tr>
                                            <td><h6 class="mb-0">{{ $index+1 }}</h6></td>
                                            <td class="title">{{ $item->title }}</td>
                                            <td class="author">{{ $item->author }}</td>
                                            <td class="category">{{ $item->category->name }}</td>
                                            <td class="price">{{ number_format($item->price, 0, ',', ',')}} VNĐ</td>
                                            <td class="updated_at">{{ \Carbon\Carbon::parse($item->updated_at)->format('H:i:s d-m-Y') }}</td>
                                        </tr>
                                        @endforeach
                                        
                                         <!-- end -->
                                    </tbody><!-- end tbody -->
                                    <style>
                                    td.title{
                                        max-width: 165px;
                                        white-space: normal;
                                    }
                                    td.author{
                                        max-width: 100px;
                                        white-space: normal;
                                    }
                                    td.category{
                                        max-width: 100px;
                                        white-space: normal;
                                    }
                                    td.price{
                                        max-width: 100px;
                                        white-space: normal;
                                    }
                                    td.updated_at{
                                        max-width: 100px;
                                        white-space: normal;
                                    }
                                    </style>
                                </table> <!-- end table -->
                            
                        </div><!-- end card -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title mb-4">Danh mục sản phẩm</h2> 
                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên danh mục</th>
                                        <th>Số lượng truyện</th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                    @for ($i = 0; $i < count($categories); $i++)
                                    <tr>
                                        <td><h6 class="mb-0"> {{ $i+1 }}</h6></td>
                                        <td>{{ $categories[$i]->name }}</td>
                                        <td style="text-align: center;">{{ $categories[$i]->getTotalProducts() }}</td>
                                    <tr>
                                    @endfor
                                    <!-- end -->
                                
                                </tbody><!-- end tbody -->
                            </table> <!-- end table -->
                        </div><!-- end card -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © Comic Shop.
                </div>
            </div>
        </div>
    </footer>
</div>    
@endsection