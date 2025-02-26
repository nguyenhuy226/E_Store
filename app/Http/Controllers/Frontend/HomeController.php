<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        // $list = DB::table('products')->get();
        return view('front.pages.index');
        // return view('front.pages.testmail');
    }
}
