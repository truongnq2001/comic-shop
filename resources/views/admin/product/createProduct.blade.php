@extends('admin.dashboard')
@section('content')
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Tạo sản phẩm mới</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Sản phẩm</a></li>
                                            <li class="breadcrumb-item active">Tạo sản phẩm mới</li>
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

                                    <form action="{{ route('admin.product.store') }}" method="post">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Tên truyện</label>
                                            <div class="col-sm-10">
                                                <input name="title" class="form-control" type="text" style="width: 40%;"  placeholder="VD: Conan tập 7" id="example-text-input">
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="row mb-3">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Mã ISBN</label>
                                            <div class="col-sm-10">
                                                <input name="ibsn_code" class="form-control" type="text" style="width: 40%;" placeholder="VD: 978-604-2-28521-6" id="example-search-input">
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="row mb-3">
                                            <label for="example-email-input" class="col-sm-2 col-form-label">Tác giả</label>
                                            <div class="col-sm-10">
                                                <input name="author" class="form-control" type="text" style="width: 40%;" placeholder="VD: Gege Akutami" id="example-email-input">
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Thể loại</label>
                                            <div class="col-sm-10">
                                                <select name="category_id" class="form-select" style="width: 20%;" aria-label="Default select example">
                                                    <option selected="">Chọn thể loại</option>
                                                    @foreach ($categories as $item)
                                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Đối tượng</label>
                                            <div class="col-sm-10">
                                                <select name="object_id" class="form-select" style="width: 20%;" aria-label="Default select example">
                                                    <option selected="">Chọn độ tuổi</option>
                                                    <option value="1">Nhà trẻ - mẫu giáo (0-6 tuổi)</option>
                                                    <option value="2">Nhi đồng (6-11 tuổi)</option>
                                                    <option value="3">Thiếu niên (11 - 15 tuổi)</option>
                                                    <option value="4">Cha mẹ đọc cùng con</option>
                                                    <option value="5">Tuổi mới lớn (15 - 18 tuổi)</option>
                                                    <option value="6">Thanh niên (trên 18 tuổi)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="row mb-3">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Giá tiền</label>
                                            <div class="col-sm-10" style="display: flex; align-items: center;">
                                                <input name="price" class="form-control" type="text" placeholder="VD: 150000" style="width: 20%;" id="example-tel-input">
                                                <p style="margin-left: 10px; margin-bottom: 0px;">VNĐ</p>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="row mb-3">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Khuôn khổ</label>
                                            <div class="col-sm-10" style="display: flex; align-items: center;">
                                                <input name="size" class="form-control" type="text" placeholder="VD: 11.3x17.6" style="width: 20%;" id="example-tel-input">
                                                <p style="margin-left: 10px; margin-bottom: 0px;">cm</p>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="row mb-3">
                                            <label for="example-number-input" class="col-sm-2 col-form-label">Số trang</label>
                                            <div class="col-sm-10">
                                                <input name="number_of_pages" class="form-control" type="number" style="width: 10%;" value="30" id="example-number-input">
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="row mb-3">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Định dạng</label>
                                            <div class="col-sm-10">
                                                <input name="format" class="form-control" type="text" style="width: 20%;" placeholder="VD: bìa mềm,.." id="example-tel-input">
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="row mb-3">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Trọng lượng</label>
                                            <div class="col-sm-10" style="display: flex; align-items: center;">
                                                <input name="weight" class="form-control" type="text" placeholder="VD: 150" style="width: 20%;" id="example-tel-input">
                                                <p style="margin-left: 10px; margin-bottom: 0px;">gram</p>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="row mb-3">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Ảnh</label>
                                            <div class="col-sm-10">
                                                <div id="display-preview-img">
                                                    <img id="preview-img" src="" alt="" hidden>
                                                </div>
                                                <input name="image" class="form-control upload-img" type="file" accept="image/*" id="formFileMultiple" onchange="previewImage()" multiple>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <style>
                                        #display-preview-img{
                                            width: 150px;
                                            height: 175px;
                                            border: 2px dashed #ced4da;
                                            border-radius: 19px;
                                        }   
                                        .upload-img{
                                            width: 500px;
                                            margin-top: 15px;
                                        }
                                        #preview-img{
                                            object-fit: cover;
                                            width: 150px;
                                            height: 175px;
                                            border-radius: 19px;
                                        }
                                        </style>
                                        <script>
                                            function previewImage() {
                                            var file = event.target.files[0]; // Lấy file ảnh được chọn
                                            var reader = new FileReader(); // Tạo đối tượng FileReader để đọc dữ liệu ảnh

                                            // Đọc dữ liệu ảnh và sau đó hiển thị nó dưới dạng hình ảnh trực tiếp trên trình duyệt
                                            reader.onload = function(e) {
                                                document.getElementById('preview-img').src = e.target.result;
                                            };
                                           
                                            document.getElementById('preview-img').removeAttribute('hidden');
                                            document.getElementById('display-preview-img').style.border = 'none';
                                            reader.readAsDataURL(file);
                                            }
                                        </script>
                                        <div class="row mb-3">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Mô tả</label>
                                            <div class="col-sm-10" style="display: flex; align-items: center;">
                                                <textarea name="description" required="" class="form-control" rows="5" style="height: 159px;"></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <button type="submit" class="btn btn-primary" style="width: 125px; margin: 0 auto;">Tạo sản phẩm</button>
                                        </div>
                                    </form>
                                        <!-- end row -->
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