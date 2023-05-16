<table id="tech-companies-1" class="table">
    <thead>
    <tr>
        <th>STT</th>
        <th data-priority="1">Nội dung</th>
        <th data-priority="3">Tên người dùng</th>
        <th data-priority="1">Tên truyện</th>
        <th data-priority="6">Ngày cập nhật</th>
        <th data-priority="6">Ngày tạo</th>
        <th data-priority="6">Hiển thị</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($comments as $key => $item)
        <tr>
            <td>{{ $key + 1 + ($page - 1)*$comments->perPage() }}</td>
            <td class="content">{{ $item->content }}</td>
            <td class="user">{{ $item->user->name }}</td>
            <td class="title">{{ $item->product->title }}</td>
            <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('H:i:s d-m-Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('H:i:s d-m-Y') }}</td>
            <td style="text-align: center;">
                @if ($item->status == 0) 
                <i class="ri-eye-fill" id="changeIcon" onclick="updateStatusComment({{ $item->id }}, 1, {{ $page }})" style="cursor: pointer; font-size: 20px;"></i> 
                @else 
                <i class="ri-eye-off-fill" id="changeIcon" onclick="updateStatusComment({{ $item->id }}, 0, {{ $page }})" style="cursor: pointer; font-size: 20px;"></i> 
                @endif
            </td>
            <td>
              <a id="deleteCategory" style="cursor: pointer;">
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
</div>