<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //dashboard
    public function dashboard(){
        return view('admin.overview',[
            'products' => Product::orderBy('updated_at', 'desc')->take(10)->get(),
            'productTotal' => Product::count(),
            'categories' => Category::all(),
            'categoryTotal' => Category::count(),
            'userTotal' => User::count(),
            'orderTotal' => Order::count(),
            'bestSellers' => DB::select(
                            'SELECT o.product_id, SUM(o.quantity) AS total_num, p.title, p.price, p.author, p.age, c.name AS category 
                            FROM `orders_detail` AS o 
                            JOIN `products` AS p ON o.product_id = p.id 
                            JOIN `categories` AS c ON p.category_id = c.id 
                            GROUP BY o.product_id, p.title, p.price, p.author, p.age, c.name  
                            ORDER BY total_num DESC LIMIT 10'),
        ]);
    }
}
