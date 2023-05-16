<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    //display product table
    public function index()
    {
        return view('admin.product.showProduct',[
            'products' => Product::with('category')->orderBy('created_at', 'desc')->paginate(8),
            'page' => 1,
        ]);
    }

    //change page
    public function changePage(Request $request)
    {
        $view = view('admin.product.listProduct', [
            'products' => Product::with('category')
                            ->orderBy('created_at', 'desc')
                            ->paginate(8, ['*'], 'page', $request->page),
            'page' => $request->page,
            ])->render();
        
        return Response::json([
            'status' => 'success',
            'message' => 'Chuyển trang thành công',
            'html' => $view,
        ]);
    }

    //create
    public function create()
    {
        return view('admin.product.createProduct',[
            'categories' => Category::all(),
        ]);
    }

    //save
    public function store(ProductStoreRequest $request)
    {
        $imageURL = '';

        if ($request->hasFile('image')) {
            $imageName = 'images/' . time() . rand(0,9999) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public', $imageName);

            $imageURL = Storage::url($imageName);
        }else{
            $imageURL = $request->image;
        }

        Product::create([
            'title' => $request->title,
            'ibsn_code' => $request->ibsn_code,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'age' => $request->age,
            'price' => $request->price,
            'size' => $request->size,
            'number_of_pages' => $request->number_of_pages,
            'format' => $request->format,
            'weight' => $request->weight,
            'image' => $imageURL,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Tạo sản phẩm mới thành công!');
    }

    //edit
    public function edit(int $id)
    {
        return view('admin.product.editProduct',[
            'categories' => Category::all(),
            'products' => Product::findOrFail($id),
        ]);
    }

    //update
    public function update(ProductUpdateRequest $request, int $id)
    {
        $imageURL = '';

        //check $request->image không có giá trị thì sẽ nhận $request->urlImageHidden
        if ($request->hasFile('image')) {
            //Xóa ảnh đã lưu
            $this->deleteImageSaved($id);

            $imageName = 'images/' . time() . rand(0,9999) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public', $imageName);
            microtime();
            Str::uuid();

            $imageURL = Storage::url($imageName);
        }else if($request->image != ''){
            //Xóa ảnh đã lưu
            $this->deleteImageSaved($id);

            $imageURL = $request->image;
        }else{
            $imageURL = $request->urlImageHidden;
        }

        Product::where('id', $id)->update([
            'title' => $request->title,
            'ibsn_code' => $request->ibsn_code,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'age' => $request->age,
            'price' => $request->price,
            'size' => $request->size,
            'number_of_pages' => $request->number_of_pages,
            'format' => $request->format,
            'weight' => $request->weight,
            'image' => $imageURL,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Cập nhật sản phẩm thành công!');
    }

    //destroy
    public function destroy(int $id)
    {
            //Xóa ảnh đã lưu
            $this->deleteImageSaved($id);

            //Xóa sản phẩm
            Product::findOrFail($id)->delete();

            $view = view('admin.product.listProduct', [
                'products' => Product::with('category')->orderBy('created_at', 'desc')->paginate(8),
                ])->render();

            return Response::json([
                'status' => 'success',
                'message' => 'Xóa sản phẩm thành công!',
                'html' => $view,
            ], 200);
    }

    //delete image saved
    private function deleteImageSaved(int $id){
        $imagePath = Product::findOrFail($id)->image;
        $newImagePath = str_replace('/storage/', 'app/public/', $imagePath);
        $standardImagePath = storage_path($newImagePath);
        if (file_exists($standardImagePath)) {
            unlink($standardImagePath);
        }
    }
}
