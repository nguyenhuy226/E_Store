@extends('front.layout')

@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">{{ __('menu.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products') }}">{{ __('menu.product') }}</a></li>
                <li class="breadcrumb-item active">{{ __('menu.cart') }}</li>
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
                                <button class="w-25 m-0 px-5"><a
                                        href="{{ route('products') }}">{{ __('cart.continueShopping') }}</a></button>
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
                                                <th>{{ __('cart.product') }}</th>
                                                <th>{{ __('cart.price') }}</th>
                                                <th>{{ __('cart.quantity') }}</th>
                                                <th>{{ __('cart.total') }}</th>
                                                <th>{{ __('cart.remove') }}</th>
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
                                                    <td>
                                                        {{-- <a onclick="return confirm('Bạn có muốn xóa item này không');"
                                                            href="{{ route('delete-cart', $item->id) }}"
                                                            class="text-white">
                                                            <button>
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </a> --}}
                                                        <a class="text-white btn" style="background-color: #ff6f61;"
                                                            onclick="return confirm('Bạn có muốn xóa item này không');"
                                                            href="{{ route('delete-item-cart', $item->id) }}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
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
                                <a href="{{ route('products') }}"> <button
                                        class="w-100">{{ __('cart.continueShopping') }}</button></a>
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
                                            <h1>{{ __('cart.summary') }}</h1>
                                            <p>{{ __('cart.sub') }}<span>{{ number_format($subtotal) }}</span></p>
                                            <p>VAT(10%)<span>{{ number_format($vat) }}</span></p>
                                            <h2>{{ __('cart.grand') }}<span>{{ number_format($subtotal + $vat) }}</span>
                                            </h2>
                                        </div>
                                        <div class="cart-btn">
                                            <a onclick="document.getElementById('cart_form').submit()">
                                                <button>{{ __('cart.update') }}
                                                </button></a>
                                            <button><a href="{{ route('checkout') }}"
                                                    class="text-white">{{ __('cart.checkout') }}</a></button>
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
