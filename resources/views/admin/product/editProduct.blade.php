@extends('admin.dashboard')
@section('content')
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">{{ $products->title }}</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Sản phẩm</a></li>
                                            <li class="breadcrumb-item active">Cập nhật sản phẩm</li>
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
                                    <form action="{{ route('admin.product.update', ['id' => $products->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Tên truyện</label>
                                            <div class="col-sm-10">
                                                <input id="nameInput" name="title" class="form-control" type="text" style="width: 40%;" value="{{ $products->title }}"  placeholder="VD: Conan tập 7" required>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="row mb-3">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Mã ISBN</label>
                                            <div class="col-sm-10">
                                                <input id="ibsnInput" name="ibsn_code" class="form-control" type="text" style="width: 40%;" value="{{ $products->ibsn_code }}" placeholder="VD: 978-604-2-28521-6" required>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="row mb-3">
                                            <label for="example-email-input" class="col-sm-2 col-form-label">Tác giả</label>
                                            <div class="col-sm-10">
                                                <input id="authorInput" name="author" class="form-control" type="text" style="width: 40%;" value="{{ $products->author }}" placeholder="VD: Gege Akutami" required>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Thể loại</label>
                                            <div class="col-sm-10">
                                                <select id="categoryInput" name="category_id" class="form-select" style="width: 20%;" aria-label="Default select example" required>
                                                    <option value="" selected="">Chọn thể loại</option>
                                                    @foreach ($categories as $item)
                                                        <option value="{{ $item->id }}" @if($item->name == $products->category->name) selected @endif>{{ $item->name }}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Đối tượng</label>
                                            <div class="col-sm-10">
                                                <select id="ageInput" name="age" class="form-select" style="width: 20%;" aria-label="Default select example" required>
                                                    <option value="" selected="">Chọn độ tuổi</option>
                                                    <option value="Nhà trẻ - mẫu giáo (0-6 tuổi)" @if("Nhà trẻ - mẫu giáo (0-6 tuổi)" == $products->age) selected @endif>Nhà trẻ - mẫu giáo (0-6 tuổi)</option>
                                                    <option value="Nhi đồng (6-11 tuổi)" @if("Nhi đồng (6-11 tuổi)" == $products->age) selected @endif>Nhi đồng (6-11 tuổi)</option>
                                                    <option value="Thiếu niên (11 - 15 tuổi)" @if("Thiếu niên (11 - 15 tuổi)" == $products->age) selected @endif>Thiếu niên (11 - 15 tuổi)</option>
                                                    <option value="Cha mẹ đọc cùng con" @if("Cha mẹ đọc cùng con" == $products->age) selected @endif>Cha mẹ đọc cùng con</option>
                                                    <option value="Tuổi mới lớn (15 - 18 tuổi)" @if("Tuổi mới lớn (15 - 18 tuổi)" == $products->age) selected @endif>Tuổi mới lớn (15 - 18 tuổi)</option>
                                                    <option value="Thanh niên (trên 18 tuổi)" @if("Thanh niên (trên 18 tuổi)" == $products->age) selected @endif>Thanh niên (trên 18 tuổi)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="row mb-3">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Giá tiền</label>
                                            <div class="col-sm-10" style="display: flex; align-items: center;">
                                                <input id="priceInput" name="price" class="form-control" type="number" value="{{ $products->price }}" placeholder="VD: 150000" style="width: 20%;" required>
                                                <p style="margin-left: 10px; margin-bottom: 0px;">VNĐ</p>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="row mb-3">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Khuôn khổ</label>
                                            <div class="col-sm-10" style="display: flex; align-items: center;">
                                                <input id="sizeInput" name="size" class="form-control" type="text" value="{{ $products->size }}" placeholder="VD: 11.3x17.6" style="width: 20%;" required>
                                                <p style="margin-left: 10px; margin-bottom: 0px;">cm</p>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="row mb-3">
                                            <label for="example-number-input" class="col-sm-2 col-form-label">Số trang</label>
                                            <div class="col-sm-10">
                                                <input id="numberInput" name="number_of_pages" class="form-control" type="number" value="{{ $products->number_of_pages }}" style="width: 10%;" required>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="row mb-3">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Định dạng</label>
                                            <div class="col-sm-10">
                                                <input id="formatInput" name="format" class="form-control" type="text" value="{{ $products->format }}" style="width: 20%;" placeholder="VD: bìa mềm,.." required>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="row mb-3">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Trọng lượng</label>
                                            <div class="col-sm-10" style="display: flex; align-items: center;">
                                                <input id="weightInput" name="weight" class="form-control" type="number" value="{{ $products->weight }}" style="width: 20%;" required>
                                                <p style="margin-left: 10px; margin-bottom: 0px;">gram</p>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <div class="row mb-3">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Ảnh</label>
                                            <div class="col-sm-10">
                                                <div id="display-preview-img">
                                                    <img id="preview-img" src="{{ $products->image }}" alt="">
                                                </div>
                                                <input id="hiddenInput" name="urlImageHidden" class="form-control upload-img" value="{{ $products->image }}" type="text" hidden>
                                                <div class="containerURL">
                                                    <input id="imageInput" name="image" class="form-control upload-img" type="file" accept="image/*" onchange="previewImage()" multiple>
                                                </div>
                                                <p style="margin: 5px 0px;">hoặc</p>
                                                <div id="changeTypeInput">
                                                    <button class="previewURL" onclick="showInputURL()">Dùng URL</button>
                                                </div>
                                                <style>
                                                .previewURL{
                                                    align-items: center;
                                                    padding: 0.47rem 0.75rem;
                                                    font-size: .9rem;
                                                    font-weight: 400;
                                                    line-height: 1.5;
                                                    color: #505d69;
                                                    text-align: center;
                                                    white-space: nowrap;
                                                    background-color: #eff2f7;
                                                    border: 1px solid #ced4da;
                                                    border-radius: 0.25rem;
                                                }
                                                </style>
                                                <script>

                                                function showInputURL()
                                                {
                                                    var inputURL =`<div class="input-group mb-2" style="width: 50%; margin-top: 15px;">
                                                                        <div class="input-group-prepend">
                                                                        <div class="input-group-text">URL</div>
                                                                        </div>
                                                                        <input name="image" type="text" class="form-control inputURLImg" id="inlineFormInputGroup" placeholder="Nhập link ảnh">
                                                                        <button class="previewURL" type="button" onclick="previewImgURL()">Preview ảnh</button>
                                                                    </div>`;
                                                    $('.containerURL').html(inputURL);
                                                    $('#changeTypeInput').html('<button class="previewURL" type="button" onclick="showUploadFile()">Upload ảnh</button>');
                                                }

                                                function showUploadFile()
                                                {
                                                    var inputURL =`<input id="imageInput" name="image" class="form-control upload-img" type="file" accept="image/*" onchange="previewImage()" multiple>`;
                                                    $('.containerURL').html(inputURL);
                                                    $('#changeTypeInput').html('<button class="previewURL" type="button" onclick="showInputURL()">Dùng URL</button>');
                                                }

                                                function previewImgURL()
                                                {
                                                    var imageURL = $('.inputURLImg').val();
                                                    if(imageURL != ''){
                                                        $('.display-preview-img').css('border', 'none');
                                                        $('#display-preview-img').html(`<img id="preview-img" src="` + imageURL + `" alt="">`);
                                                    }
                                                }
                                                </script>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <style>
                                        #display-preview-img{
                                            width: 150px;
                                            height: 215px;
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
                                            height: 215px;
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
                                                <textarea id="descriptionInput" name="description" required="" class="form-control" rows="5" style="height: 159px;" required>{{ $products->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <button type="submit" class="btn btn-success" style="width: 125px; margin: 0 auto;">Cập nhật</button>
                                        </div>
                                    </form>
                                    <script>
                                        function createProduct()
                                        {
                                            var imageInput = $('#imageInput')[0];
                                            var file = imageInput.files[0];
                                            var reader = new FileReader();

                                            reader.onloadend = function() {
                                                var imageData = reader.result.split(',')[1];
                                                $.ajax({
                                                url: "/admin/product/create", 
                                                type: "POST",
                                                data: {
                                                    "_token": "{{ csrf_token() }}", 
                                                    "title" : $('#nameInput').val(),
                                                    "ibsn_code" : $('#ibsnInput').val(),
                                                    "author" : $('#authorInput').val(),
                                                    "category_id" : $('#categoryInput').val(),
                                                    "age" : $('#ageInput').val(),
                                                    "price" : $('#priceInput').val(),
                                                    "size" : $('#sizeInput').val(),
                                                    "number_of_pages" : $('#numberInput').val(),
                                                    "format" : $('#formatInput').val(),
                                                    "weight" : $('#weightInput').val(),
                                                    "image" : imageData,
                                                    "description" : $('#descriptionInput').val(),
                                                },
                                                success: function(response) {

                                                },
                                                error: function(response) {
                                                    
                                                }
                                                });
                                            }
                                        }    
                                        </script>
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