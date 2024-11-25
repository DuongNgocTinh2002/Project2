<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {

    public function index() {
        $users = User::all();
        $products = Product::all();
        $categories = Category::all();
        $orders = Order::where('status', 0)->get();
        return view('admin.index')->with([
            'users' => $users,
            'products' => $products,
            'categories' => $categories,
            'orders' => $orders
        ]);
    }

    public function login() {
        return view('admin.login');
    }

    public function checkLogin(Request $request) {
        $credentials  = $request->only('email', 'password');
        $remember = !empty($request->only('remember'));

        if(Auth::guard('admin')->attempt($credentials, $remember)) {
            return redirect(route('admin'));
        }
        
        return back()->withErrors([
            'error' => 'Thông tin đăng nhập không hợp lệ.',
        ]);
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }

    public function user() {
        $users = User::with('orders')->get();
        return view('admin.user.index')->with([
            'users' =>$users
        ]);
    }
}
