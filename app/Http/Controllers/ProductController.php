<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //display product table
    public function index()
    {
        return view('admin.product.showProduct');
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
        dd($request->all());
    }

    //edit
    public function edit()
    {
        return "product";
    }

    //destroy
    public function destroy()
    {
        return "product";
    }
}
