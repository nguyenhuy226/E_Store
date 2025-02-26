<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('front.pages.login');
    }
    public function contact()
    {
        return view('front.pages.contact');
        // return view('front.pages.testmail');
    }
    public function logout()
    {
        return redirect()->route('home');
    }
}
