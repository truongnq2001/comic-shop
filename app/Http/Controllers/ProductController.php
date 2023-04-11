<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //display product table
    public function index()
    {
        return view('admin.createProduct');
    }

    //create
    public function create()
    {
        return "product";
    }

    //save
    public function store()
    {
        return "product";
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
