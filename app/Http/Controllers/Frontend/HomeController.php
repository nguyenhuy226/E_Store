<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('deleted_at')->get();

        $latestProducts = Product::orderBy('created_at', 'desc')->take(5)->get();

        return view('front.pages.index', ['categories' => $categories,'latesProducts' =>  $latestProducts ]);
    }
}
