<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/cart', [PagesController::class, 'cart'])->name('cart');

//Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');

Route::post('/register', [AuthController::class, 'postRegister'])->name('register')->middleware('guest');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login')->middleware('guest');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

//Admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    //product
    Route::group(['prefix' => 'product', 'middleware' => 'admin'], function(){
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.show');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
    });
    //category
    Route::group(['prefix' => 'category', 'middleware' => 'admin'], function(){
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.show');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
    });
});

