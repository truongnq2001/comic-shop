<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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
Route::get('/product/{id}', [PagesController::class, 'product'])->name('product');

//Cart
Route::get('/cart', [CartController::class, 'show'])->name('cart');
Route::post('/cart/add', [CartController::class, 'addCart'])->name('cart.add')->middleware('auth');
Route::delete('/cart/delete', [CartController::class, 'deleteCart'])->name('cart.delete')->middleware('auth');

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
    Route::group(['prefix' => 'product'], function(){
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.show');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('/create', [ProductController::class, 'store'])->name('admin.product.store');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::put('/edit/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    });
    //category
    Route::group(['prefix' => 'category'], function(){
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.show');
        Route::post('/create', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    });
});

