<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyAccountController extends Controller
{
    public function index(Request $request)
    {
        return view('front.pages.my-account');
    }

    public function update_account(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,' . Auth::user()->id],
            'phone' => ['required'],
            'address' => ['required'],
        ]);
        $customer = Customer::findOrFail(Auth::user()->id);
        $customer->update($validate);

        return redirect()->route('my-account')->with(['update' => 'cập nhật thành công']);
    }

    public function change_password(Request $request)
    {
        $validate = $request->validate([
            'password' => ['required'],
            'new_password' => ['required', 'min:8', 'confirmed']
        ]);

        if (!Hash::check($validate['password'], Auth::user()->password)) {
            return back()->with(['current_password' => 'Mật khẩu hiện tại không chính xác.']);
        }

        $user = Customer::findOrFail(Auth::user()->id);
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('my-account')->with(['update' => 'thay đổi mật khẩu thành công']);
    }
}
