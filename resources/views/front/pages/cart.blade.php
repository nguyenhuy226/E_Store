@extends('front.layout')

@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products') }}">Products</a></li>
                <li class="breadcrumb-item active">Cart</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Cart Start -->
    <div class="cart-page">
        <div class="container-fluid">
            <div class="row">
                @if ($collection->isEmpty())
                    <div class="col-lg-12 text-center pb-5">
                        <img src="{{ asset('front/img/emptycart.png') }}"
                            class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                            alt=""><br>
                        <div class="cart-summary ">
                            <div class="cart-btn">
                                <button class="w-25 m-0 px-5"><a href="{{ route('products') }}">Mua hàng tiếp</a></button>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-8">
                        <div class="cart-page-inner mb-0">
                            <form id="cart_form" method="post" action="{{ route('upadte-cart') }}">
                                @method('PUT')
                                @csrf
                                <div class="table-responsive">
                                    @if (session('er'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{!! session('er') !!}</strong>
                                        </div>
                                    @endif
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody class="align-middle">
                                            @foreach ($collection as $item)
                                                <tr>
                                                    <td>
                                                        <div class="img">
                                                            <a href="#"><img
                                                                    src="{{ asset('front/img/product-' . $item->id . '.jpg') }}"
                                                                    alt="Image"></a>
                                                            <p>{{ $item->name }}</p>
                                                        </div>
                                                    </td>
                                                    <td>{{ number_format($item->price) }}</td>
                                                    <td>
                                                        <div class="qty">
                                                            <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                            <input name="qtys[{{ $item->id }}]" type="text"
                                                                value="{{ $item->buy_qty }}">
                                                            <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                        </div>
                                                    </td>
                                                    <td>{{ number_format($item->price * $item->buy_qty) }}</td>
                                                    <td><button><a {
                                                        {onclick="return confirm('Bạn có muốn xóa item này không')"}}
                                                                href="{{ route('delete-item-cart', $item->id) }}"
                                                                class="text-white"><i class="fa fa-trash"></i></a></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>

                        <div class="cart-summary mb-4">
                            <div class="cart-btn d-flex justify-content-end">
                                <a href="{{ route('products') }}"> <button class="w-100">Mua hàng tiếp</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- <div class="coupon">
                                        <input type="text" placeholder="Coupon Code">
                                        <button>Apply Code</button>
                                    </div> --}}
                                </div>
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            @php
                                                $subtotal = $collection->sum(function ($item) {
                                                    return $item->price * $item->buy_qty;
                                                });
                                                $vat = $subtotal * 0.1;
                                            @endphp
                                            <h1>Cart Summary</h1>
                                            <p>Sub Total<span>{{ number_format($subtotal) }}</span></p>
                                            <p>VAT(10%)<span>{{ number_format($vat) }}</span></p>
                                            <h2>Grand Total<span>{{ number_format($subtotal + $vat) }}</span></h2>
                                        </div>
                                        <div class="cart-btn">
                                            <a onclick="document.getElementById('cart_form').submit()"> <button>Update
                                                    cart</button></a>
                                            <button><a href="{{ route('checkout') }}"
                                                    class="text-white">Checkout</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection
