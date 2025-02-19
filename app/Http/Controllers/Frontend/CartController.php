<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $collection = collect(session('carts'));
        // dd($collection);
        return view('front.pages.cart', ['collection' => $collection]);
    }

    public function order()
    {
        $collection = collect(session('carts'));
        if ($collection->isEmpty())
            return redirect()->route('cart');
        return view('front.pages.checkout', ['collection' => $collection, 'i' => 1]);
    }

    public function orderPost(Request $request)
    {
        $carts = collect(session('carts'));
        if ($carts->isEmpty())
            return redirect()->route('cart');
        $validate = [
            "name" => ['required', 'max:20'],
            "email" => ['required', 'max:20', 'email'],
            "phone" => ['required', 'max:11', 'min:10'],
            "address" => ['required', 'max:255'],
            "payment" => ['required', 'in:COD']
        ];
        //tạo khách nếu có
        if ($request->is_create) {
            $validate['passwork'] = ['required', 'max:20', 'min:6'];
        }
        if ($request->shipto) {
            $validate['ship_name'] = ['required', 'max:20'];
            $validate['ship_phone'] = ['required', 'max:11', 'min:10'];
            $validate['ship_email'] = ['required', 'max:20', 'email'];
            $validate['ship_address'] = ['required', 'max:255'];
        }
        $validateData = $request->validate($validate, [
            "name.required" => "name không được để trống"
        ]);
        $customer = Customer::create($validateData);


        $fillable = $validateData;
        $fillable['code'] = rand(100000, 999999);
        $fillable['customer_id'] = $customer->id;
        $order = Order::create($fillable);
        $total_amount = 0;
        foreach ($carts as $item) {
            $fillItem = [
                'product_id' => $item->id,
                'order_id' => $order->id,
                'qty' => $item->buy_qty,
                'price' => $item->price
            ];
            $total_amount += $item->buy_qty * $item->price;
            OrderDetail::create($fillItem);
        }

        // làm thông báo
        $order->status = 1;
        $order->created_date = now();
        $order->total_amount = $total_amount + ($total_amount * 0.1);
        $order->save();
        session(['carts' => []]);
        // dd($order, $carts, session('carts'));
        // dd(session('carts'));
        // dd($order);
        if ($order) {
            return redirect()->route('completed')->with([
                'ordered' => $order,
            ]);
        }
    }

    public function completed()
    {
        $ordered = session('ordered');
        // $cartsItem = session('cartsItem');
        dd($ordered);

        if (!$ordered)
            return redirect()->route('cart');
        return view('front.pages.completed', ['ordered' => $ordered]);
    }

    public function addItem(Request $request, $id)
    {
        $item = Product::where(['is_active' => 1, 'id' => $id])->where('qty', '>', 0)->first();
        if (!$item)
            return redirect()->route('products');
        // tiến hành thêm vào giỏ
        $carts = session('carts');
        if (isset($carts[$item->id])) {
            $carts[$item->id]->buy_qty += 1;
        } else {
            $cartsItem = new \stdClass();
            $cartsItem->id = $item->id;
            $cartsItem->name = $item->product_name;
            $cartsItem->image = $item->product_image;
            $cartsItem->qty = $item->qty;
            $cartsItem->price = $item->price;
            $cartsItem->buy_qty = 1;
            $carts[$item->id] = $cartsItem;
        }

        // tiến hành ghi dữ liệu vào carts session
        session(['carts' => $carts]);
        // dd($carts);
        return redirect()->route('cart');
    }

    public function deleteItem(Request $request, $id)
    {
        $carts = session('carts');
        if (isset($carts[$id])) {
            unset($carts[$id]);
        }
        // tiến hành ghi dữ liệu vào carts session
        session(['carts' => $carts]);

        return redirect()->route('cart');
    }

    public function update(Request $request)
    {
        $carts = collect(session('carts'));
        if ($carts->isEmpty())
            return redirect()->route('cart');

        $er = '';
        foreach ($request->qtys as $id => $qty) {
            $q = abs($qty);
            if ($q <= $carts[$id]->qty)
                $carts[$id]->buy_qty = $q;
            else
                $er .= $carts[$id]->name . ' không đủ hàng</br>';
        }
        return redirect()->route('cart')->with(['er' => $er]);
    }

    public function emty()
    {
        session(['carts' => []]);
    }
}
