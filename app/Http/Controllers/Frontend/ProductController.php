<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function index()
    {
        $list = Product::where('is_active', 1)->orderBy('price', 'desc')->paginate(9);
        return view('front.pages.products', [
            'productsList' => $list,
        ]);
    }
    public function detail(Request $request, $id)
    {
        $item = Product::where(['is_active' => 1, 'id' => $id])->first();
        if (!$item) {
            return redirect()->route('products');
        }
        $relates = Product::where(['is_active' => 1])->where('id', '!=', $id)->take(5)->orderByRaw('rand() ASC')->get();
        $categories = Category::whereNull('deleted_at')->get();
        return view('front.pages.product-detail', ['item' => $item, 'relates' => $relates, 'categories' => $categories]);
    }
    public function wishlist()
    {
        return view('front.pages.wishlist');
    }
}
