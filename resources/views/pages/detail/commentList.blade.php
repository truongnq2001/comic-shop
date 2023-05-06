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
                            <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal" onclick="deleteComment({{ $item->product_id }}, {{ $item->id }}, {{ Auth::user()->id }})">Có</button>
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