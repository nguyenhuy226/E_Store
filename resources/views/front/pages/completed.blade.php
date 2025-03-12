@extends('front.layout')

@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">{{ __('menu.home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products') }}">{{ __('menu.product') }}</a></li>
                <li class="breadcrumb-item active">{{ __('completed.complete') }}</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Start -->
    <div class="checkout">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="checkout-inner">
                        <div class="checkout-summary" style="padding-right: 400px; padding-left:400px">
                            <h1 class="text-center">{{ __('completed.orderinformation') }}</h1>
                            <p>{{ __('completed.code') }}: <span>{{ $ordered->code }}</span></p>
                            <p>{{ __('completed.status') }}: <span>{{ $ordered->status_label }}</span></p>
                            <p>{{ __('completed.booking') }}: <span>{{ $ordered->created_date }}</span></p>
                            @php
                                // dd($carts);
                                $subtotal = 0;
                                $i = 1;
                            @endphp
                            <p class="sub-total fw-bold">{{ __('cart.product') }}<span></span></p>
                            @foreach ($carts as $item)
                                @php
                                    $subtotal += $item->price * $item->buy_qty;
                                @endphp
                                <p>{{ $i++ }}.
                                    {{ $item->name }}<span>{{ number_format($item->price * $item->buy_qty) }}</span>
                                </p>
                            @endforeach
                            @php
                                $vat = $subtotal * 0.1;
                                $total = $subtotal + $vat;
                            @endphp
                            <p class="sub-total">{{ __('cart.sub') }}<span>{{ number_format($subtotal) }}</span></p>
                            <p class="ship-cost">VAT(10%)<span>{{ number_format($vat) }}</span></p>
                            <h2>{{ __('cart.grand') }}<span>{{ number_format($total) }}</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
@endsection
