<thead class="table-light">
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Số lượng</th>
        <th>Cập nhật</th>
        <th>Ngày đăng</th>
    </tr>
</thead>
<tbody>
    @for ($i = 0; $i < count($categories); $i++)
    <tr>
        <th scope="row">{{ $i+1 }}</th>
        <td>{{ $categories[$i]->name }}</td>
        <td>{{ $categories[$i]->getTotalProducts() }}</td>
        <td>{{ $categories[$i]->updated_at }}</td>
        <td>{{ $categories[$i]->created_at }}</td>
        <td>
            <a style="cursor: pointer;">
                <i class="ri-edit-line" id="changeIcon" style="font-size: 21px; color: #505d69;"></i>
            </a>
        </td>
        <td>
            <a id="deleteCategory" onclick="deleteCategory({{ $categories[$i]->id }})" style="cursor: pointer;">
                <i class="ri-delete-bin-6-line" id="changeIcon" style="font-size: 21px;"></i>
            </a>   
        </td>                                       
    </tr>
    @endfor
</tbody>
<style>
    #changeIcon:hover{
        color: #117fe4 !important;
    }
</style>