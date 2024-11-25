<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller {
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
        // dd($items);
        return view('client.cart.cart')->with([
            'cart' => $cart,
            'items' => $items
        ]); 
    }

    public function add($productId, $quantity = 1) {
        
        if (!Session::has('cart')) {
            Session::put('cart', []);
        }
        $cart = Session::get('cart');
        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        if (array_key_exists($productId, $cart)) {
            // Nếu đã tồn tại, cập nhật số lượng
            $cart[$productId] += $quantity;
        } else {
            // Nếu chưa tồn tại, thêm mới sản phẩm vào giỏ hàng
            $cart[$productId] = $quantity;
        }
        // Lưu thông tin giỏ hàng mới vào session
        Session::put('cart', $cart);
        return redirect()->back()->with([
            'message' => 'thêm thành công'
        ]);
    }

    public function remove($productId) {
         // Lấy thông tin giỏ hàng từ session
        $cart = Session::get('cart', []);

        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
        if (array_key_exists($productId, $cart)) {
            // Nếu tồn tại, xóa sản phẩm khỏi giỏ hàng
            unset($cart[$productId]);

            // Cập nhật thông tin giỏ hàng mới vào session
            Session::put('cart', $cart);

            return redirect()->back()->with([
                'message' => 'xóa thành công'
            ]);
        } else {
            // Nếu không tồn tại, có thể thực hiện xử lý khác (ví dụ: thông báo lỗi)
            return redirect()->route('cart.index')->with('error', 'Sản phẩm không tồn tại trong giỏ hàng');
        }
    }
}
