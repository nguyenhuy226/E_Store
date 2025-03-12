<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('front.pages.login');
    }

    public function loginpost(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => ['email', 'required'],
            'password' => ['required', 'max:25']
        ]);

        $cer = Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember);

        // dd($cer);
        if ($cer) {
            // dd(Auth::user()->status);
            if (Auth::user()->status == 1) {
                return redirect()->route('home');
            } else {
                Auth::logout();
                return  redirect()->back()->with(['er' => 'tài khoản của bạn đã bị khóa']);
            }
        } else {
            return  redirect()->back()->with(['er' => 'đăng nhập thất bại']);
        }
    }

    public function register()
    {
        return view('front.pages.register');
    }
    public function registerpost(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'max:11'],
            'password' => ['required', 'min:6', 'max:50'],
            'repassword' => ['required', 'same:password']
        ]);
        $validate['password'] = Hash::make($request->password);
        Customer::create($validate);
        return redirect()->route('login');
    }

    public function contact()
    {
        return view('front.pages.contact');
        // return view('front.pages.testmail');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
