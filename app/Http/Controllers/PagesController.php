<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
    
}
