@extends('admin.dashboard')
@section('content')
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Danh sách sản phẩm</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Sản phẩm</a></li>
                                            <li class="breadcrumb-item active">Danh sách sản phẩm</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">       
        
                                        <div class="table-rep-plugin">
                                            
                                                <table id="tech-companies-1" class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th data-priority="1">Tên truyện</th>
                                                        <th data-priority="3">Ảnh</th>
                                                        <th data-priority="1">Tác giả</th>
                                                        <th data-priority="3">Thể loại</th>
                                                        <th data-priority="3">Đối tượng</th>
                                                        <th data-priority="6">Số trang</th>
                                                        <th data-priority="6">Ngày cập nhật</th>
                                                        <th data-priority="6">Sửa</th>
                                                        <th data-priority="6">Xóa</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Conan Tập 7</td>
                                                        <td>
                                                            <img src="https://product.hstatic.net/200000343865/product/100_bd275c22338e4df3a7b01a0b8553e338_master.jpg" alt="Ảnh truyện" style="object-fit: cover; width: 70px; height: 100px; border-radius: 9px;">
                                                        </td>
                                                        <td>ABCXYZ</td>
                                                        <td>Conan</td>
                                                        <td>Trẻ mới lớn</td>
                                                        <td>50</td>
                                                        <td>15/4/2023</td>
                                                        <td><button class="btn btn-warning">Sửa</button></td>
                                                        <td>
                                                            <button id="deleteCategory" class="btn btn-danger" >Xóa</button>                                           
                                                        </td>      
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Conan Tập 7</td>
                                                        <td>
                                                            <img src="https://product.hstatic.net/200000343865/product/100_bd275c22338e4df3a7b01a0b8553e338_master.jpg" alt="Ảnh truyện" style="object-fit: cover; width: 70px; height: 100px; border-radius: 9px;">
                                                        </td>
                                                        <td>ABCXYZ</td>
                                                        <td>Conan</td>
                                                        <td>Trẻ mới lớn</td>
                                                        <td>50</td>
                                                        <td>15/4/2023</td>
                                                        <td><button class="btn btn-warning">Sửa</button></td>
                                                        <td>
                                                            <button id="deleteCategory" class="btn btn-danger" >Xóa</button>                                           
                                                        </td>      
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Conan Tập 7</td>
                                                        <td>
                                                            <img src="https://product.hstatic.net/200000343865/product/100_bd275c22338e4df3a7b01a0b8553e338_master.jpg" alt="Ảnh truyện" style="object-fit: cover; width: 70px; height: 100px; border-radius: 9px;">
                                                        </td>
                                                        <td>ABCXYZ</td>
                                                        <td>Conan</td>
                                                        <td>Trẻ mới lớn</td>
                                                        <td>50</td>
                                                        <td>15/4/2023</td>
                                                        <td><button class="btn btn-warning">Sửa</button></td>
                                                        <td>
                                                            <button id="deleteCategory" class="btn btn-danger" >Xóa</button>                                           
                                                        </td>      
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Conan Tập 7</td>
                                                        <td>
                                                            <img src="https://product.hstatic.net/200000343865/product/100_bd275c22338e4df3a7b01a0b8553e338_master.jpg" alt="Ảnh truyện" style="object-fit: cover; width: 70px; height: 100px; border-radius: 9px;">
                                                        </td>
                                                        <td>ABCXYZ</td>
                                                        <td>Conan</td>
                                                        <td>Trẻ mới lớn</td>
                                                        <td>50</td>
                                                        <td>15/4/2023</td>
                                                        <td><button class="btn btn-warning">Sửa</button></td>
                                                        <td>
                                                            <button id="deleteCategory" class="btn btn-danger" >Xóa</button>                                           
                                                        </td>      
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Conan Tập 7</td>
                                                        <td>
                                                            <img src="https://product.hstatic.net/200000343865/product/100_bd275c22338e4df3a7b01a0b8553e338_master.jpg" alt="Ảnh truyện" style="object-fit: cover; width: 70px; height: 100px; border-radius: 9px;">
                                                        </td>
                                                        <td>ABCXYZ</td>
                                                        <td>Conan</td>
                                                        <td>Trẻ mới lớn</td>
                                                        <td>50</td>
                                                        <td>15/4/2023</td>
                                                        <td><button class="btn btn-warning">Sửa</button></td>
                                                        <td>
                                                            <button id="deleteCategory" class="btn btn-danger" >Xóa</button>                                           
                                                        </td>      
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Conan Tập 7</td>
                                                        <td>
                                                            <img src="https://product.hstatic.net/200000343865/product/100_bd275c22338e4df3a7b01a0b8553e338_master.jpg" alt="Ảnh truyện" style="object-fit: cover; width: 70px; height: 100px; border-radius: 9px;">
                                                        </td>
                                                        <td>ABCXYZ</td>
                                                        <td>Conan</td>
                                                        <td>Trẻ mới lớn</td>
                                                        <td>50</td>
                                                        <td>15/4/2023</td>
                                                        <td><button class="btn btn-warning">Sửa</button></td>
                                                        <td>
                                                            <button id="deleteCategory" class="btn btn-danger" >Xóa</button>                                           
                                                        </td>      
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            
        
                                        </div>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
@endsection                
