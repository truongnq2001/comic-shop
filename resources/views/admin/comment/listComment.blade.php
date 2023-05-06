<table id="tech-companies-1" class="table">
    <thead>
    <tr>
        <th>STT</th>
        <th data-priority="1">Nội dung</th>
        <th data-priority="3">Tên người dùng</th>
        <th data-priority="1">Tên truyện</th>
        <th data-priority="6">Ngày cập nhật</th>
        <th data-priority="6">Ngày tạo</th>
        <th data-priority="6">Trạng thái</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($comments as $key => $item)
        <tr>
            <td>{{ 1 }}</td>
            <td class="content">{{ $item->content }}</td>
            <td class="user">{{ $item->user->name }}</td>
            <td class="title">{{ $item->product->title }}</td>
            <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('H:i:s d-m-Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('H:i:s d-m-Y') }}</td>
            <td>
                <select class="form-select" aria-label="Default select example">
                    <option @if ($item->status == 0) selected @endif>Hiển thị</option>
                    <option @if ($item->status == 1) selected @endif>Ẩn</option>
                  </select>                                           
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
</div> --}}