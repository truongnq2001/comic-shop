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
                                                        <th data-priority="6">Giá tiền</th>
                                                        <th data-priority="6">Ngày cập nhật</th>
                                                        <th data-priority="6">Ngày tạo</th>
                                                        <th data-priority="6">Sửa</th>
                                                        <th data-priority="6">Xóa</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @for ($i = 0; $i < count($products); $i++)
                                                        <tr>
                                                            <td>{{ $i+1 }}</td>
                                                            <td class="title">{{ $products[$i]->title }}</td>
                                                            <td>
                                                                <img src="{{ asset($products[$i]->image) }}" alt="Ảnh truyện" style="object-fit: cover; width: 70px; height: 100px;">
                                                            </td>
                                                            <td class="author">{{ $products[$i]->author }}</td>
                                                            <td class="category">{{ $products[$i]->category->name }}</td>
                                                            <td>{{ number_format($products[$i]->price, 0, ',', ',')}} VNĐ</td>
                                                            <td>{{ $products[$i]->updated_at }}</td>
                                                            <td>{{ $products[$i]->created_at }}</td>
                                                            <td>
                                                                <a href="/admin/product/edit/{{$products[$i]->id}}">
                                                                    <button class="btn btn-warning">Sửa</button>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <button id="deleteCategory" class="btn btn-danger" onclick="deleteProduct({{ $products[$i]->id }})">Xóa</button>                                           
                                                            </td>      
                                                        </tr>
                                                    @endfor
                                                    </tbody>
                                                    <style>
                                                        td.title{
                                                            max-width: 300px;
                                                            white-space: normal;
                                                        }
                                                        td.author{
                                                            max-width: 100px;
                                                            white-space: normal;
                                                        }
                                                        td.category{
                                                            max-width: 120px;
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
                                                                        showListProduct(response.products);
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
