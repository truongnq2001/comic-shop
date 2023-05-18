<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages/home',[
            'productNew' => Product::orderBy('created_at', 'desc')->take(8)->get(),
            'tddv' => Product::where('category_id', '=', '63')->orderBy('created_at', 'desc')->take(8)->get(),
            'doraemon' => Product::where('category_id', '=', '65')->orderBy('created_at', 'desc')->take(8)->get(),
        ]);
    }

    public function contactUs()
    {
        return view('pages.contact-us');
    }

    public function cart()
    {
        return view('pages/cart');
    }

    public function filter(Request $request)
    {
        //Truy vấn bảng sản phẩm
        $queryFilter = DB::table('products');

        $titleAge = '';
        $titleCategory = '';
        
        //Lọc theo đối tượng
        if ($request->age) {
            $titleAge = $this->switchAge($request->age);
            $queryFilter = $queryFilter->where('age', 'like', '%'.$this->switchAge($request->age).'%');
        }

        //Lọc theo danh mục
        if ($request->category) {
            $titleCategory = $this->switchCategory($request->category);
            $queryFilter = $queryFilter->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->where('categories.name', 'like', '%'.$this->switchCategory($request->category).'%');
        }

        //Lọc theo kết quả search
        if ($request->search) {
            $queryFilter = $queryFilter->where('title', 'like', '%'.$request->search.'%');
        }

        //Lọc theo tăng giảm dần(giá)
        if ($request->sort) {
            $queryFilter = $queryFilter->orderBy('price', $request->sort);
        }

        //Lọc theo giá
        if ($request->price) {
            $arrPriceFilter = $this->switchPrice($request->price);
            $queryFilter = $queryFilter->whereBetween('price', [$arrPriceFilter[0], $arrPriceFilter[1]]);
        }

        return view('pages/filter',[
            'getCategory' => $request->category,
            'getAge' => $request->age,
            'getSort' => $request->sort,
            'getPrice' => $request->price,
            'getSearch' => $request->search,
            'titleAge' => $titleAge,
            'titleCategory' => $titleCategory,
            'productsFilter' => $queryFilter->orderBy('created_at', 'desc')->paginate(12),
        ]);
    }

    public function product(int $id)
    {
        $categoryIdDetail = Product::find($id)->category_id;
        $relatedProducts = DB::table('products')
                            ->where('category_id', $categoryIdDetail)
                            ->where('id', '<>', $id)
                            ->take(5)->get();

        $commentList = new CommentController();

        return view('pages/detail', [
            'product' => Product::find($id),
            'relatedProducts' => $relatedProducts,
            'commentList' => $commentList->show($id)->paginate(3),
        ]);
    }

    public function switchPrice($requestPrice)
    {
        switch ($requestPrice) {
            case '0-15000':
                $priceFilter = [0, 15000];
                break;
            
            case '15000-50000':
                $priceFilter = [15000, 50000];
                break;

            case '50000-100000':
                $priceFilter = [50000, 100000];
                break;
            
            case '100000-max':
                $priceFilter = [100000, 999999];
                break;

        }
        return $priceFilter;
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
