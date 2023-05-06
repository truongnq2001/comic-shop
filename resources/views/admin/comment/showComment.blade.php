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
                                    <h4 class="mb-sm-0">Danh sách bình luận</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">       
        
                                        <div class="table-rep-plugin" id="tableProduct">
                                            
                                                @include('admin.comment.listComment')
        
                                        </div>
        
                                    </div>

                                    <script>
                                    function changePage(page){
                                        $.ajax({
                                            url: "/admin/product",
                                            type: "POST",
                                            data: {
                                                "_token": "{{ csrf_token() }}",
                                                "page": page,
                                            },
                                            success: function(response){
                                                if(response.status === "success"){
                                                    $('#tableProduct').html(response.html);
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
                                    td.content{
                                        max-width: 300px;
                                        white-space: normal;
                                    }
                                    td.user{
                                        max-width: 100px;
                                        white-space: normal;
                                    }
                                    td.title{
                                        max-width: 200px;
                                        white-space: normal;
                                    }
                                    </style>
                                    <script>
                                    //format date
                                    function formatDate(dateString)
                                    {
                                        var date = new Date(dateString);

                                        var year = date.getFullYear();
                                        var month = ("0" + (date.getMonth() + 1)).slice(-2);
                                        var day = ("0" + date.getDate()).slice(-2);
                                        var hours = ("0" + date.getHours()).slice(-2);
                                        var minutes = ("0" + date.getMinutes()).slice(-2);
                                        var seconds = ("0" + date.getSeconds()).slice(-2);

                                        var formattedDate = year + "-" + month + "-" + day + " " + hours + ":" + minutes + ":" + seconds;

                                        return formattedDate;
                                    }
                                    //show list category
                                    function showListProduct(newProducts)
                                    {
                                        var tbodyHtml = '';
                                        for (var i = 0; i < newProducts.length; i++) {
                                            tbodyHtml += `<tr>
                                                            <td>` + (i+1) + `</td>
                                                            <td class="title">` + newProducts[i].title + `</td>
                                                            <td>
                                                                <img src="` + newProducts[i].image + `" alt="Ảnh truyện" style="object-fit: cover; width: 70px; height: 100px;">
                                                            </td>
                                                            <td class="author">` + newProducts[i].author + `</td>
                                                            <td class="category">` + newProducts[i].category.name + `</td>
                                                            <td>` + newProducts[i].price.toLocaleString('en-US') + ` VNĐ</td>
                                                            <td>` + formatDate(newProducts[i].updated_at) + `</td>
                                                            <td>` + formatDate(newProducts[i].created_at) + `</td>
                                                            <td>
                                                                <a href="/admin/product/edit/` + newProducts[i].id + `">
                                                                    <button class="btn btn-warning">Sửa</button>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <button id="deleteCategory" class="btn btn-danger" onclick="deleteProduct(` + newProducts[i].id + `)">Xóa</button>                                           
                                                            </td>      
                                                        </tr>`;
                                        }
                                        $('tbody').html(tbodyHtml);
                                    }
                                    //delete product
                                    function deleteProduct(productId){
                                        if(confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')){
                                            $.ajax({
                                                url: "/admin/product/" + productId,
                                                type: "DELETE",
                                                data: {
                                                    "_token": "{{ csrf_token() }}",
                                                },
                                                success: function(response){
                                                    if(response.status === "success"){
                                                        alert(response.message);
                                                        $('#tableProduct').html(response.html);
                                                    }
                                                },
                                                error: function(response){
                                                    if (response.status === 'error') {
                                                        alert(response.message)
                                                    }
                                                },
                                            });
                                        }
                                    }
                                    
                                    </script>

                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
@endsection                
