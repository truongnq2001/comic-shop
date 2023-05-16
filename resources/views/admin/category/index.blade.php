@extends('admin.dashboard')
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="font-weight: bold;">DANH SÁCH CÁC DANH MỤC</h4>                       
                        <div class="table">
                            <table class="table mb-0" id="tableCategory">
    
                                @include('admin.category.listCategory')
                               
                            </table>
                        </div>
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
                            function showListCategory(newCategories)
                            {
                                var tbodyHtml = '';
                                for (var i = 0; i < newCategories.length; i++) {
                                    tbodyHtml += '<tr>' +
                                        '<th scope="row">' + (i+1) + '</th>' +
                                        '<td>' + newCategories[i].name + '</td>' +
                                        '<td>20</td>' +
                                        '<td>' + formatDate(newCategories[i].updated_at) + '</td>' +
                                        '<td>' + formatDate(newCategories[i].created_at) + '</td>' +
                                        '<td><button class="btn btn-warning">Sửa</button></td>' +
                                        '<td><button onclick="deleteCategory(' + newCategories[i].id + ')" class="btn btn-danger">Xóa</button></td>' +
                                        '</tr>';
                                }
                                $('tbody').html(tbodyHtml);
                            }

                            //delete category
                            function deleteCategory(categoryId) 
                            {
                                if(confirm('Bạn có chắc chắn muốn xóa danh mục này không?'))
                                {
                                    $.ajax({
                                        url: "/admin/category/" + categoryId, 
                                        type: "DELETE",
                                        data: {
                                            "_token": "{{ csrf_token() }}" 
                                        },
                                        success: function(response) {
                                            console.log(response);
                                            // delete success
                                            if (response.status === 'success') {
                                                $('#tableCategory').html(response.html);
                                            }
                                        },
                                        error: function(response) {
                                            // delete fail
                                            // console.log(response);
                                            alert(response.responseJSON.message);
                                        }
                                    });
                                }
                            };                                   
                            </script>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="font-weight: bold;">DANH SÁCH CÁC DANH MỤC THEO SỐ LƯỢNG TRUYỆN</h4>                       
                        <div class="table">
                            <table class="table table-striped mb-0">
    
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Số lượng</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="height: 63.03px;">
                                        <th scope="row">1</th>
                                        <td>Cổ trang</td>
                                        <td>20</td>
                                        
                                    </tr>
                                    <tr style="height: 63.03px;">
                                        <th scope="row">2</th>
                                        <td>Thiếu nhi</td>
                                        <td>18</td>
                                        
                                    </tr>
                                    <tr style="height: 63.03px;">
                                        <th scope="row">3</th>
                                        <td>Thể thao</td>
                                        <td>16</td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
    
                    </div>
                </div>
            </div> --}}
            
        </div>
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Tạo danh mục mới</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                                <div id="inputCreateCategory" class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Tên danh mục mới</label>
                                    <div class="col-sm-10">
                                        <input id="nameInput" name="name" class="form-control" type="text" id="example-text-input">
                                        <span id="messageErrorCreate" style="color: red;"></span>
                                    </div>
                                </div>
                                <!-- end row -->
                                
                                <div class="row mb-3">
                                    <button onclick="createCategory()" class="btn btn-primary" style="width: 135px; margin: 0 auto;">Thêm danh mục</button>
                                </div>
                                <!-- end row -->
                            <script>
                            //refresh input
                            function refreshInput()
                            {
                                var refreshInputCategory = `<div class="row mb-3">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label">Tên danh mục mới</label>
                                                            <div class="col-sm-10">
                                                                <input id="nameInput" name="name" class="form-control" type="text" id="example-text-input">
                                                                <span id="messageErrorCreate" style="color: red;"></span>
                                                            </div>
                                                        </div>`;
                                $('#inputCreateCategory').html(refreshInputCategory);
                            }
                            //create category
                            function createCategory() 
                            {
                                var inputValue = $('#nameInput').val();
                                $.ajax({
                                    url: "/admin/category/create", 
                                    type: "POST",
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        "name" :  inputValue,
                                    },
                                    success: function(response) {
                                        // delete success
                                        if (response.status === 'success') {
                                            // alert(response.message)
                                            $('#tableCategory').html(response.html);
                                            refreshInput();
                                        }
                                    },
                                    error: function(response) {
                                        // delete fail
                                        // alert(response.responseJSON.message);
                                        var messageError = '<span id="messageErrorCreate" style="color: red;">'
                                                            + response.responseJSON.message +
                                                            '</span>';
                                        $('#messageErrorCreate').html(messageError);
                                    }
                                });
                            };                              
                            </script>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>    
@endsection