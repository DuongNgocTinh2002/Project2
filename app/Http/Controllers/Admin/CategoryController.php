<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create() {
        return view('admin.category.create');
    }

    public function store(Request $request) {
        $data = $request->all();
        $data['is_active'] = empty($data['is_active']) ? false : true;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $fileName);
            $data['image'] = $fileName;
        }
        Category::create($data);
        return redirect()->back()->with('message', 'tạo thành công');
    }

    public function delete($id) {
        $category = Category::find($id);
        $filePath = public_path('uploads/' . $category->image);
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $products = Product::where('category_id', $id)->get();
        if(count($products) > 0) {
            foreach ($products as $product) {
                $images = ProductImage::where('product_id', $product->id)->get();
                foreach ($images as $image) {
                    $filePath = public_path('uploads/' . $image->name);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                        $image->delete();
                    }
                }
                Product::destroy($id);
            }
        }
      
        Category::destroy($id);
        return redirect()->back()->with('message', 'xóa thành công');
    }

    public function edit($id) {
        $category = Category::findOrFail($id);

        return view('admin.category.edit')->with([
            'category' => $category
        ]);
    }

    public function update($id, Request $request) {
        $category = Category::find($id);
        $data = $request->all();
        $data['is_active'] = empty($data['is_active']) ? false : true;

        if($request->hasFile('image')) {
            $filePath = public_path('uploads/' . $category->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $fileName);
            $data['image'] = $fileName;
        }
        $category->update($data);
        return redirect(route('admin.category'))->with([
            'message' => 'cập nhật thành công'
        ]);
    }
}
