<table id="tech-companies-1" class="table">
    <thead>
    <tr>
        <th>STT</th>
        <th data-priority="1">Tên truyện</th>
        {{-- <th data-priority="3">Ảnh</th> --}}
        <th data-priority="1">Tác giả</th>
        <th data-priority="3">Thể loại</th>
        <th data-priority="6">Giá tiền</th>
        <th data-priority="6">Ngày cập nhật</th>
        <th data-priority="6">Ngày tạo</th>
        <th data-priority="6"></th>
        <th data-priority="6"></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($products as $key => $item)
        <tr>
            <td>{{ $key + 1 + ($page - 1)*$products->perPage() }}</td>
            <td class="title">{{ $item->title }}</td>
            {{-- <td>
                <img src="{{ asset($item->image) }}" alt="Ảnh truyện" style="object-fit: cover; width: 70px; height: 100px;">
            </td> --}}
            <td class="author">{{ $item->author }}</td>
            <td class="category">{{ $item->category->name }}</td>
            <td>{{ number_format($item->price, 0, ',', ',')}} VNĐ</td>
            <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('H:i:s d-m-Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('H:i:s d-m-Y') }}</td>
            <td>
                <a href="/admin/product/edit/{{$item->id}}">
                    <i class="ri-edit-line" id="changeIcon" style="font-size: 21px; color: #505d69;"></i>
                </a>
            </td>
            <td>
                <a id="deleteCategory" onclick="deleteProduct({{ $item->id }})" style="cursor: pointer;">
                    <i class="ri-delete-bin-6-line" id="changeIcon" style="font-size: 21px;"></i>
                </a>                                           
            </td>      
        </tr>
        @endforeach
    </tbody>
</table>
<style>
#changeIcon:hover{
    color: #117fe4 !important;
}
</style>

<div style="justify-content: center; display: flex;">
    <nav aria-label="...">
        <ul class="pagination">
          <li @if ($page == 1) class="page-item disabled" @else class="page-item" @endif>
            <a class="page-link" onclick="changePage({{ $page-1 }})" style="cursor: pointer;">Trước</a>
          </li>
          @for ($i = 1; $i <= $products->lastPage(); $i++)
            <li @if ($i == $page) class="page-item active" @else class="page-item" @endif onclick="changePage({{ $i }})" style="cursor: pointer;">
                <a class="page-link">{{ $i }}</a>
            </li>
          @endfor
          <li @if ($page == $products->lastPage()) class="page-item disabled" @else class="page-item" @endif>
            <a class="page-link" onclick="changePage({{ $page+1 }})" style="cursor: pointer;">Sau</a>
          </li>
        </ul>
    </nav>
</div>