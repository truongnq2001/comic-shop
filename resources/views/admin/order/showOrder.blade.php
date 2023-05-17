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
                                    <h4 class="mb-sm-0">Danh sách đơn hàng</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">       
        
                                        <div class="table-rep-plugin" id="tableComment">
                                            
                                            <table id="tech-companies-1" class="table">
                                                <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th data-priority="1">Tên</th>
                                                    <th data-priority="3">Email</th>
                                                    <th data-priority="1">Số điện thoại</th>
                                                    <th data-priority="1">Tỉnh/Thành phố</th>
                                                    <th data-priority="1">Huyện/Quận</th>
                                                    <th data-priority="1">Xã/Phường</th>
                                                    <th data-priority="1">Địa chỉ chi tiết</th>
                                                    <th data-priority="1">Tổng tiền</th>
                                                    <th data-priority="6">Ngày cập nhật</th>
                                                    <th data-priority="6">Ngày tạo</th>
                                                    {{-- <th data-priority="6">Hiển thị</th> --}}
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (collect($orders)->reverse() as $key => $item)
                                                    <tr>
                                                        <td>{{ count($orders) - $key }}</td>
                                                        <td class="">{{ $item->user->name }}</td>
                                                        <td class="">{{ $item->user->email }}</td>
                                                        <td class="">{{ $item->phone_number }}</td>
                                                        <td class="">{{ $item->city }}</td>
                                                        <td class="">{{ $item->district }}</td>
                                                        <td class="">{{ $item->ward }}</td>
                                                        <td class="">{{ $item->address_detail }}</td>
                                                        <td class="">{{ number_format($item->total_money, 0, ',', ',')}} VNĐ</td>
                                                        <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('H:i:s d-m-Y') }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('H:i:s d-m-Y') }}</td>
                                                        <td>
                                                            <a id="deleteCategory" style="cursor: pointer;">
                                                                <i class="ri-delete-bin-6-line" id="changeIcon" style="font-size: 21px;"></i>
                                                            </a>                                           
                                                        </td> 
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            
                                            {{-- <div style="justify-content: center; display: flex;">
                                                <nav aria-label="...">
                                                    <ul class="pagination">
                                                      <li @if ($page == 1) class="page-item disabled" @else class="page-item" @endif>
                                                        <a class="page-link" onclick="changePage({{ $page-1 }})" style="cursor: pointer;">Trước</a>
                                                      </li>
                                                      @for ($i = 1; $i <= $comments->lastPage(); $i++)
                                                        <li @if ($i == $page) class="page-item active" @else class="page-item" @endif onclick="changePage({{ $i }})" style="cursor: pointer;">
                                                            <a class="page-link">{{ $i }}</a>
                                                        </li>
                                                      @endfor
                                                      <li @if ($page == $comments->lastPage()) class="page-item disabled" @else class="page-item" @endif>
                                                        <a class="page-link" onclick="changePage({{ $page+1 }})" style="cursor: pointer;">Sau</a>
                                                      </li>
                                                    </ul>
                                                </nav>
                                            </div> --}}
        
                                        </div>
        
                                    </div>

                                    <script>
                                    function changePage(page){
                                        $.ajax({
                                            url: "/admin/comment",
                                            type: "POST",
                                            data: {
                                                "_token": "{{ csrf_token() }}",
                                                "page": page,
                                            },
                                            success: function(response){
                                                if(response.status === "success"){
                                                    $('#tableComment').html(response.html);
                                                    window.scrollTo(0, 0);
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
                                    .page-item.active .page-link {
                                        z-index: 3;
                                        color: #fff;
                                        background-color: #252b3b !important;
                                        border-color: #252b3b !important;
                                    }
                                    .page-link:hover {
                                        color: #252b3b !important;
                                    }
                                    /* td.name{
                                        max-width: 300px;
                                        white-space: normal;
                                    }
                                    td.email{
                                        max-width: 100px;
                                        white-space: normal;
                                    }
                                    td.is_admin{
                                        max-width: 200px;
                                        white-space: normal;
                                    } */
                                    #changeIcon:hover{
                                        color: #117fe4 !important;
                                    }
                                    </style>
                                    {{-- <script>
                                    //delete product
                                    function updateStatusComment(commentId, status, page){
                                        $.ajax({
                                            url: "/admin/comment",
                                            type: "PUT",
                                            data: {
                                                "_token": "{{ csrf_token() }}",
                                                "commentId": commentId,
                                                "status": status,
                                                "page": page,
                                            },
                                            success: function(response){
                                                if(response.status === "success"){
                                                    $('#tableComment').html(response.html);
                                                }
                                            },
                                            error: function(response){
                                                if (response.status === 'error') {
                                                    alert(response.message)
                                                }
                                            },
                                        });
                                    }
                                    
                                    </script> --}}

                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
@endsection   