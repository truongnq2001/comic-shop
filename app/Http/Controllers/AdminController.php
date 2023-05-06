<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

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
        ]);
    }
}
