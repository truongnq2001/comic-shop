<div class="card card-outline-secondary my-4 col-12">
    <div class="card-header">
        <h2 id="numComment">Bình luận về sản phẩm ({{ $commentList->total() }})</h2>
    </div>
    <div class="card-body">
        <div id="commentContainer">
            @if (!$commentList)
            <p style="text-align: center;">Chưa có bình luận nào</p> 
            @endif
            @foreach ($commentList as $item)
            <div class="media mb-3">
                <div class="mr-2"> 
                    <img class="rounded-circle border p-1" src="/images/user-avatar.png" style="width: 70px;" alt="Generic placeholder image">
                </div>
                <div class="media-body" style="width: 80%;">
                    <p style="font-size: 16px;">{{ $item->content }}</p>
                    <div style="display: flex;">
                        <p class="text-muted" style="font-size: 13px;">Đăng bởi <span style="font-weight: bold;">{{ $item->user->name }}</span> vào lúc {{ $item->created_at }}</p>
                        @if (isset(Auth::user()->id) && $item->user_id == Auth::user()->id)
                        <p class="deleteComment" style="margin-left: 20px; display: flex; justify-content: center; align-items: center;">
                            <i data-toggle="modal" data-target="#exampleModalCenter{{ $item->id }}" style="cursor: pointer;" class="fa-solid fa-trash"></i>
                        </p>
                        <div class="modal fade" id="exampleModalCenter{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLongTitle">Comic Shop</h3>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc chắn muốn xóa bình luận này không?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal" onclick="deleteComment({{ $item->product_id }}, {{ $item->id }})">Có</button>
                                        <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal">Không</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            @endforeach
        </div>
        @if ($commentList)
        <a id="loadMore" onclick="loadComment()" data-product-id="{{ $productId }}" data-page="2" @if ($commentTotal <= 3) hidden @endif>Xem thêm</a>
        @endif
        <style>
            #loadMore{
                color: black; 
                display: flex; 
                justify-content: center; 
                cursor: pointer;
            }
            #loadMore:hover{
                color:#b0b435 !important;
            }
        </style>
        <div class="form-group" id="contentComment">
            <label for="exampleFormControlTextarea1">Nội dung</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
            <p id="emptyComment" style="color: red;"></p>
        </div>
        @if (isset(Auth::user()->id))
        <a onclick="addComment({{ $productId }}, {{ Auth::user()->id }})" class="btn hvr-hover" style="cursor: pointer;">Bình luận</a>
        @else
        <a data-toggle="modal" data-target="#exampleModalCenter" class="btn hvr-hover" style="cursor: pointer;">Bình luận</a>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle">Comic Shop</h3>
                    </div>
                    <div class="modal-body">
                        Vui lòng đăng nhập để bình luận!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <style>
        .deleteComment>i:hover{
            color: #b0b435;
        }
        </style>
        <style>
            #closeModal{
                background: black;
            }
            #closeModal:focus{
                background: #b0b435;
                box-shadow: none;
                border-color: #b0b435;
            }
            #closeModal:hover{
                background: #b0b435;
                border-color: #b0b435;
            }
            </style>
        <script>
            function refreshComment(productId, commentArray, userLogin){
                var comment = '';
                commentArray.forEach(element => {
                    if (userLogin == element.user_id) {
                        comment += `<div class="media mb-3">
                                <div class="mr-2"> 
                                    <img class="rounded-circle border p-1" src="/images/user-avatar.png" style="width: 70px;" alt="Generic placeholder image">
                                </div>
                                <div class="media-body" style="width: 80%;">
                                    <p style="font-size: 16px;">`+ element.content +`</p>
                                    <div style="display: flex;">
                                        <p class="text-muted" style="font-size: 13px;">Đăng bởi <span style="font-weight: bold;">`+ element.user_name +`</span> vào lúc `+ element.created_at +`</p>
                                        <p class="deleteComment" style="margin-left: 20px; display: flex; justify-content: center; align-items: center;">
                                            <i data-toggle="modal" data-target="#exampleModalCenter" style="cursor: pointer;" class="fa-solid fa-trash"></i>
                                        </p>
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title" id="exampleModalLongTitle">Comic Shop</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        Bạn có chắc chắn muốn xóa bình luận này không?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal" onclick="deleteComment(`+ productId +`, `+ element.id +`, `+ userLogin +`)">Có</button>
                                                        <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal">Không</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>`;
                    } else{
                        comment += `<div class="media mb-3">
                                <div class="mr-2"> 
                                    <img class="rounded-circle border p-1" src="/images/user-avatar.png" style="width: 70px;" alt="Generic placeholder image">
                                </div>
                                <div class="media-body" style="width: 80%;">
                                    <p style="font-size: 16px;">`+ element.content +`</p>
                                    <div style="display: flex;">
                                        <p class="text-muted" style="font-size: 13px;">Đăng bởi <span style="font-weight: bold;">`+ element.user_name +`</span> vào lúc `+ element.created_at +`</p>
                                    </div>
                                </div>
                            </div>
                            <hr>`;
                    }
                });
                $('#commentContainer').html(comment);
                if (commentArray.length == 0) {
                    $('#commentContainer').html(`<p style="text-align: center;">Chưa có bình luận nào</p>`);
                }
                $('#contentComment').html(`<label for="exampleFormControlTextarea1">Nội dung</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            <p id="emptyComment" style="color: red;"></p>`);
                $('#numComment').html(`<h2 id="numComment">Bình luận về sản phẩm (`+ commentArray.length +`)</h2>`);
            }  
            
            function loadComment(){
                $.ajax({
                url: "/comment/load_more",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "content": $('#exampleFormControlTextarea1').val(),
                    "productId": $('#loadMore').data('product-id'),
                    "page": $('#loadMore').data('page'),
                },
                success: function(response){
                    if(response.status === "success"){
                        $('#commentContainer').append(response.html);
                        $('#loadMore').data('page', parseInt(response.page) + 1);
                        if (response.page == 'max') {
                            $('#loadMore').hide();
                        }
                    }
                },
                error: function(response){
                    if (response.status === 'error') {
                        // alert(response.message)
                    }
                }, 
            });    
            }

            function addComment(productId, userId){
            
            if (!$('#exampleFormControlTextarea1').val()){
                return $('#emptyComment').html(`Vui lòng nhập nội dung để bình luận.`);
            }

            $.ajax({
                url: "/comment/add",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "content": $('#exampleFormControlTextarea1').val(),
                    "productId": productId,
                    "userId": userId,
                },
                success: function(response){
                    if(response.status === "success"){
                        $('#commentBox').html(response.html);
                    }
                },
                error: function(response){
                    if (response.status === 'error') {
                        // alert(response.message)
                    }
                }, 
            });    
        }  

        function deleteComment(productId, commentId){
            $.ajax({
                url: "/comment/delete",
                type: "DELETE",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "content": $('#exampleFormControlTextarea1').val(),
                    "commentId": commentId,
                    "productId": productId,
                },
                success: function(response){
                    if(response.status === "success"){
                        $('#commentBox').html(response.html);
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
    </div>
</div>
