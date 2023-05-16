<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CartController extends Controller
{
    //show
    public function show()
    {
        return view('pages/cart');
    }

    //show order
    public function showOrder()
    {
        return view('pages/order');
    }

    //show checkout
    public function showCheckout()
    {
        return view('pages/checkout');
    }

    //store checkout
    public function storeCheckout(Request $request)
    {
        dd($request->all());
    }

    //add cart
    public function addCart(Request $request)
    {
        $id = $request->productId;
        $product = Product::findOrFail($id);
        $item = [
            'id' => $id,
            'product' => $product,
            'quantity' => $request->quantity,
        ];

        if (session()->has('cart')) {
            $cart = session()->get('cart');
            $check = false;
            foreach ($cart as $key => $value) {
                if ($cart[$key]['id'] == $id) {
                    $check = true;
                    $cart[$key]['quantity'] += $request->quantity;
                    break;
                }
            }
            if (!$check) {
                $cart[count($cart)] = $item;
                session()->put('cart', $cart);
            } else{
                session()->put('cart', $cart);
            }
        } else {  
            session()->put('cart', [0 => $item]);
        }
        
        return Response::json([
            'status' => 'success',
            'message' => 'Thêm sản phẩm vào giỏ hàng thành công!',
            'session' => session('cart'),
        ]);
    }

    //update cart
    public function updateCart(Request $request)
    {
        $id = $request->productId;
        $quantity = $request->quantity;

        if (session()->has('cart')) {
            $cart = session()->get('cart');
            $check = false;
            foreach ($cart as $key => $value) {
                if ($cart[$key]['id'] == $id) {
                    $check = true;
                    $cart[$key]['quantity'] = $quantity;
                    break;
                }
            }
        }

        session()->put('cart', $cart);

        return Response::json([
            'status' => 'success',
            'message' => 'Cập nhật sản phẩm trong giỏ hàng thành công!',
        ]);
    }

    //delete cart
    public function deleteCart(Request $request)
    {
        $id = $request->productId;

        $cart = session()->get('cart');
        foreach ($cart as $key => $value) {
            if ($cart[$key]['id'] == $id) {
                unset($cart[$key]);
                $cart = array_values($cart);
                break;
            }
        }
        session()->put('cart', $cart);

        return Response::json([
            'status' => 'success',
            'message' => 'Xóa sản phẩm khỏi giỏ hàng thành công!',
            'session' => session('cart'),
        ]);
    }
}
