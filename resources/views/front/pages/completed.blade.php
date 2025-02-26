@extends('front.layout')

@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products') }}">Products</a></li>
                <li class="breadcrumb-item active">Completed</li>
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
                            <h1 class="text-center">order information</h1>
                            <p>Mã đơn hàng: <span>{{ $ordered->code }}</span></p>
                            <p>Trạng thái: <span>{{ $ordered->status_label }}</span></p>
                            <p>Ngày đặt: <span>{{ $ordered->created_date }}</span></p>
                            @php
                                // dd($carts);
                                $subtotal = 0;
                                $i = 1;
                            @endphp
                            <p class="sub-total fw-bold">products<span></span></p>
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
                            <p class="sub-total">Sub Total<span>{{ number_format($subtotal) }}</span></p>
                            <p class="ship-cost">VAT(10%)<span>{{ number_format($vat) }}</span></p>
                            <h2>Grand Total<span>{{ number_format($total) }}</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
@endsection
