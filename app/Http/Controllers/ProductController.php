<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //display product table
    public function index()
    {
        return view('admin.product.showProduct',[
            'products' => Product::with('category')->orderBy('created_at', 'desc')->get(),
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
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'ibsn_code' => 'required',
            'author' => 'required|max:255',
            'category_id' => 'required',
            'age' => 'required',
            'price' => 'required',
            'size' => 'required',
            'number_of_pages' => 'required',
            'format' => 'required',
            'weight' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]);

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
    public function update(Request $request, int $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'ibsn_code' => 'required',
            'author' => 'required|max:255',
            'category_id' => 'required',
            'age' => 'required',
            'price' => 'required',
            'size' => 'required',
            'number_of_pages' => 'required',
            'format' => 'required',
            'weight' => 'required',
            'urlImageHidden' => 'required',
            'description' => 'required',
        ]);

        $imageURL = '';

        //check $request->image không có giá trị thì sẽ nhận $request->urlImageHidden
        if ($request->hasFile('image')) {
            //Xóa ảnh đã lưu
            $this->deleteImageSaved($id);

            $imageName = 'images/' . time() . rand(0,9999) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public', $imageName);

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
        try {
            //Xóa ảnh đã lưu
            $this->deleteImageSaved($id);

            //Xóa sản phẩm
            Product::findOrFail($id)->delete();

            return Response::json([
                'status' => 'success',
                'message' => 'Xóa sản phẩm thành công!',
                'products' => Product::with('category')->orderBy('created_at', 'desc')->get(),
            ], 200);
        } catch (\Exception $e) {
            return Response::json([
                'status' => 'error',
                'message' => 'Đã xảy ra lỗi khi xóa sản phẩm!',
            ], 500);
        }
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
