<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //show order
    public function show()
    {
        $idUserCurrent = Auth::user()->id;

        return view('pages/order', [
            'orders' => Order::where('user_id', '=', $idUserCurrent)->get(),
        ]);
    }

    //show order
    public function showOrderAdmin()
    {
        return view('admin.order.showOrder', [
            'orders' => Order::all(),
        ]);
    }

    //store checkout
    public function storeCheckout(Request $request)
    {
        $randomId = time().rand(0,99);

        Order::create([
            'user_id' => $request->user_id,
            'phone_number' => $request->phonenumber,
            'address_detail' => $request->address,
            'city' => $request->city,
            'district' => $request->district,
            'ward' => $request->ward,
            'payment_method' => $request->paymentMethod,
            'shipping' => $request->shipping,
            'total_money' => $request->total_money,
            'order_id_show' => $randomId,
        ]);

        $arrProduct = explode(' ', $request->arrProduct);

        for ($i=0; $i < count($arrProduct)/2; $i++) { 
            OrderDetail::create([
                'order_id' => Order::where('order_id_show', '=', $randomId)->first()->id,
                'product_id' => $arrProduct[$i*2],
                'quantity' => $arrProduct[$i*2+1],
            ]);
        }

        //delete cart
        session()->forget('cart');

        return redirect( route('order.show') );
    }
}
