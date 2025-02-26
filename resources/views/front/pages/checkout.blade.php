@extends('front.layout')

@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active">Checkout</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Start -->
    <div class="checkout">
        <div class="container-fluid">
            <form method="POST" action="{{ route('orderPost') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-inner">
                            <div class="billing-address">
                                <h2>Billing Address</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                        <input class="form-control @error('name') border-danger @enderror" type="text"
                                            placeholder="Name" name="name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input class="form-control @error('email') border-danger @enderror" type="text"
                                            placeholder="E-mail" name="email">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mobile No</label>
                                        <input class="form-control @error('phone') border-danger @enderror" type="text"
                                            placeholder="Mobile No" name="phone">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Address</label>
                                        <input class="form-control @error('address') border-danger @enderror" type="text"
                                            placeholder="Address" name="address">
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="newaccount"
                                                name="is_create" value=1 {{ old('is_create') ? 'checked' : '' }}
                                                onchange="if(this.checked){$('#create_panel').removeClass('d-none');}else{$('#create_panel').addClass('d-none');}">
                                            <label class="custom-control-label" for="newaccount">Create an account?</label>
                                        </div>
                                        <div class="col-md-12 {{ old('is_create') ? '' : 'd-none' }}" id="create_panel">
                                            <p>Enter the password for your account or log in above to use member features
                                            </p>
                                            <label>Passwork</label>
                                            <input class="form-control" type="password" placeholder="Passwork"
                                                name="passwork">
                                            @error('passwork')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="shipto"
                                                value="1" name="shipto" {{ old('shipto') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="shipto">Ship to different
                                                address</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="shipping-address" style="display: {{ old('shipto') ? 'block' : 'none' }};">
                                <h2>Shipping Address</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                        <input class="form-control" type="text" placeholder="Name" name="ship_name">
                                        @error('ship_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input class="form-control" type="text" placeholder="E-mail" name="ship_email">
                                        @error('ship_email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mobile No</label>
                                        <input class="form-control" type="text" placeholder="Mobile No"
                                            name="ship_phone">
                                        @error('ship_phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Address</label>
                                        <input class="form-control" type="text" placeholder="Address"
                                            name="ship_address">
                                        @error('ship_address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout-inner">
                            <div class="checkout-summary">
                                <h1>Cart Total</h1>
                                @foreach ($collection as $item)
                                    <p>{{ $i++ }}.
                                        {{ $item->name }}<span>{{ number_format($item->price * $item->buy_qty) }}</span>
                                    </p>
                                @endforeach
                                @php
                                    $subtotal = $collection->sum(function ($item) {
                                        return $item->price * $item->buy_qty;
                                    });
                                    $vat = $subtotal * 0.1;
                                    $total = $subtotal + $vat;
                                @endphp
                                <p class="sub-total">Sub Total<span>{{ number_format($subtotal) }}</span></p>
                                <p class="ship-cost">VAT(10%)<span>{{ number_format($vat) }}</span></p>
                                <h2>Grand Total<span>{{ number_format($total) }}</span></h2>
                            </div>

                            <div class="checkout-payment">
                                <div class="payment-methods">
                                    <h1>Payment Methods</h1>
                                    {{-- <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-1"
                                                name="payment">
                                            <label class="custom-control-label" for="payment-1">Paypal</label>
                                        </div>
                                        <div class="payment-content" id="payment-1-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci
                                                ac
                                                eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-2"
                                                name="payment">
                                            <label class="custom-control-label" for="payment-2">Payoneer</label>
                                        </div>
                                        <div class="payment-content" id="payment-2-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci
                                                ac
                                                eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-3"
                                                name="payment">
                                            <label class="custom-control-label" for="payment-3">Check Payment</label>
                                        </div>
                                        <div class="payment-content" id="payment-3-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci
                                                ac
                                                eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-4"
                                                name="payment">
                                            <label class="custom-control-label" for="payment-4">Direct Bank
                                                Transfer</label>
                                        </div>
                                        <div class="payment-content" id="payment-4-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci
                                                ac
                                                eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div> --}}
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-5"
                                                name="payment" value="COD">
                                            <label class="custom-control-label" for="payment-5">Cash on
                                                Delivery</label><br>
                                            @error('payment')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="payment-content" id="payment-5-show">
                                            <p>Make payment upon receipt</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout-btn">
                                    <button type="submit">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Checkout End -->
@endsection
