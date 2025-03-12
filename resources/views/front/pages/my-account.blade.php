@extends('front.layout')

@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ __('menu.home') }}</a></li>
                <li class="breadcrumb-item active">{{ __('menu.myaccount') }}</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- My Account Start -->
    @if (session('update') || session('current_password'))
        <div class="alert alert-success">
            {{ session('update') }}
            {{ session('current_password') }}
        </div>
    @endif
    <div class="my-account">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab"
                            role="tab"><i class="fa fa-tachometer-alt"></i>{{ __('account.dashboard') }}</a>
                        <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i
                                class="fa fa-shopping-bag"></i>{{ __('account.orders') }}</a>
                        <a class="nav-link" id="payment-nav" data-toggle="pill" href="#payment-tab" role="tab"><i
                                class="fa fa-credit-card"></i>{{ __('account.paymentmethod') }}</a>
                        <a class="nav-link" id="address-nav" data-toggle="pill" href="#address-tab" role="tab"><i
                                class="fa fa-map-marker-alt"></i>{{ __('account.address') }}</a>
                        <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i
                                class="fa fa-user"></i>{{ __('acccount.details') }}</a>
                        <a class="nav-link" href="{{ route('logout') }}"><i
                                class="fa fa-sign-out-alt"></i>{{ __('account.logout') }}</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel"
                            aria-labelledby="dashboard-nav">
                            <h4>{{ __('account.dashboard') }}</h4>
                            <p>
                                Hello {{ auth()->user()->name }}
                            </p>
                        </div>
                        <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>{{ __('account.code') }}</th>
                                            <th>{{ __('account.date') }}</th>
                                            <th>{{ __('account.price') }}</th>
                                            <th>{{ __('account.status') }}</th>
                                            <th>{{ __('account.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach (auth()->user()->orders as $order)
                                            {{ $i += 1 }}
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $order->code }}</td>
                                                <td>{{ $order->created_date }}</td>
                                                <td>{{ $order->total_amount }}</td>
                                                <td>{{ $order->status_label }}</td>
                                                <td><button class="btn">View</button></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                            <h4>{{ __('account.paymentmethod') }}</h4>
                            <p>
                                THANH TOÁN KHI NHẬN HÀNG
                            </p>
                        </div>
                        <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                            <h4>{{ __('account.address') }}</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Payment Address</h5>
                                    <p>
                                        @if (auth()->user()->address)
                                            {{ auth()->user()->address }}
                                        @else
                                            không có
                                        @endif
                                    </p>
                                    <p>Mobile: {{ auth()->user()->phone }}</p>
                                    <button class="btn">{{ __('account.editAddress') }}</button>
                                </div>
                                <div class="col-md-6">
                                    <h5>Shipping Address</h5>
                                    <p>
                                        @if (auth()->user()->ship_address)
                                            {{ auth()->user()->ship_address }}
                                        @else
                                            không có
                                        @endif
                                    </p>
                                    <p>Mobile: @if (auth()->user()->ship_phone)
                                            {{ auth()->user()->ship_phone }}
                                        @else
                                            không có
                                        @endif
                                    </p>
                                    <button class="btn">{{ __('account.editAddress') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                            <h4>{{ __('acccount.details') }}</h4>
                            <form action="{{ route('update-account') }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="{{ __('contact.name') }}"
                                            value=" {{ auth()->user()->name }}" name="name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="{{ __('checkout.phone') }}"
                                            value=" {{ auth()->user()->phone }}" name="phone">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="{{ __('contact.email') }}"
                                            value=" {{ auth()->user()->email }}" name="email">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text"
                                            placeholder="{{ __('account.address') }}"
                                            value=" {{ auth()->user()->address }}" name="address">
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn">{{ __('account.update') }}</button>
                                        <br><br>
                                    </div>
                                </div>
                            </form>
                            <h4>{{ __('account.changepassword') }}</h4>
                            <form action="{{ route('change-password') }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="password"
                                            placeholder="{{ __('account.currentpassword') }}" name="password">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text"
                                            placeholder="{{ __('account.newpassword') }}" name="new_password">
                                        @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text"
                                            placeholder="{{ __('account.confirm') }}" name="newpassword_confirmation">
                                        @error('newpassword_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn">{{ __('account.save') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- My Account End -->
@endsection
