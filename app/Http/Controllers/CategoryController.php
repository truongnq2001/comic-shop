<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    //show
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', [
            'categories' => $categories,
        ]);
    }

    //store
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ],[
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'name.max' => 'Tên danh mục không được vượt quá 255 ký tự',
        ]);

        //store
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        //render html
        $view = view('admin.category.listCategory',[
            'categories' => Category::all(),
        ])->render();

        //response
        return Response::json([
            'status' => 'success',
            'message' => 'Thêm danh mục thành công!',
            'html' => $view,
        ],200);
    }

    //destroy
    public function destroy(int $id)
    {
        Category::findOrFail($id)->delete();

        $view = view('admin.category.listCategory',[
            'categories' => Category::all(),
        ])->render();

        return Response::json([
            'status' => 'success',
            'message' => 'Xóa danh mục thành công!',
            'html' => $view,
        ], 200);
    }
}
