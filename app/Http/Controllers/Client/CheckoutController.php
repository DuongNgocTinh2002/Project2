<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller {
    public function index() {
        $cart = Session::get('cart', []);
        $items = [];
        foreach ($cart as $productId => $quantity) {
            $product = Product::with('images')->find($productId);
            array_push($items, [
                'product' => $product,
                'quantity' => $quantity
            ]);
        }

        return view('client.checkout.index')->with([
            'cart' => $cart,
            'items' => $items
        ]);
    }

    public function checkout(Request $request) {
        $data = $request->all();

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'status' => 0,
            ...$data
        ]);
        $cart = Session::get('cart', []);

        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);           
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $quantity * $product->price
            ]);            
        }
        //đặt xong thì xóa giỏ
        Session::put('cart', []);
        return redirect(route('home'))->with([
            'message' => 'đặt hàng thành công'
        ]);
    }
}
