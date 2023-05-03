<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages/home',[
            'productNew' => Product::orderBy('created_at', 'desc')->take(8)->get(),
        ]);
    }

    public function cart()
    {
        return view('pages/cart');
    }

    public function filter(Request $request)
    {
        //Truy vấn bảng sản phẩm
        $queryFilter = DB::table('products');
        
        //Lọc theo đối tượng
        if ($request->age) {
            $queryFilter = $queryFilter->where('age', 'like', '%'.$this->switchAge($request->age).'%');
        }

        //Lọc theo danh mục
        if ($request->category) {
            $queryFilter = $queryFilter->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->where('categories.name', 'like', '%'.$this->switchCategory($request->category).'%');
        }

        //Lọc theo tăng giảm dần(giá)
        if ($request->sort) {
            $queryFilter = $queryFilter->orderBy('price', $request->sort);
        }
        // $str = 'Thiếu niên (11 - 15 tuổi)';
        // dd( DB::table('products')->where('age', 'like', '%'.$str.'%')->get());
        return view('pages/filter',[
            'getCategory' => $request->category,
            'getAge' => $request->age,
            'getSort' => $request->sort,
            'getPrice' => $request->price,
            'productsFilter' => $queryFilter->get(),
        ]);
    }

    public function product(int $id)
    {
        $categoryIdDetail = Product::find($id)->category_id;
        $relatedProducts = DB::table('products')
                            ->where('category_id', $categoryIdDetail)
                            ->where('id', '<>', $id)
                            ->take(5)->get();

        return view('pages/detail', [
            'product' => Product::find($id),
            'relatedProducts' => $relatedProducts,
        ]);
    }

    public function switchCategory($requestCategory)
    {
        switch ($requestCategory) {
            case 'co-trang':
                $categoryFilter = 'Cổ trang';
                break;
            
            case 'thieu-nhi':
                $categoryFilter = 'Thiếu nhi';
                break;

            case 'the-thao':
                $categoryFilter = 'Thể thao';
                break;
            
            case 'than-dong-dat-viet':
                $categoryFilter = 'Thần đồng đất việt';
                break;

            case 'conan':
                $categoryFilter = 'Conan';
                break;
            
            case 'doraemon':
                $categoryFilter = 'Doraemon';
                break;

            case 'khac':
                $categoryFilter = 'Khác';
                break;
        }
        return $categoryFilter;
    }

    public function switchAge($requestAge)
    {
        switch ($requestAge) {
            case 'mau-giao':
                $ageFilter = 'Nhà trẻ - mẫu giáo (0-6 tuổi)';
                break;
            
            case 'nhi-dong':
                $ageFilter = 'Nhi đồng (6-11 tuổi)';
                break;

            case 'thieu-nien':
                $ageFilter = 'Thiếu niên (11 - 15 tuổi)';
                break;
            
            case 'cha-me-doc-cung-con':
                $ageFilter = 'Cha mẹ đọc cùng con';
                break;

            case 'moi-lon':
                $ageFilter = 'Tuổi mới lớn (15 - 18 tuổi)';
                break;
            
            case 'thanh-nien':
                $ageFilter = 'Thanh niên (trên 18 tuổi)';
                break;
        }
        return $ageFilter;
    }
    
}
