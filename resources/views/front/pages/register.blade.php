@extends('front.layout')

@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ __('menu.home') }}</a></li>
                <li class="breadcrumb-item active">{{ __('menu.register') }}</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Login Start -->
    <div class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="register-form">
                        <form method="POST" action="{{ route('register') }}">
                            <div class="row">
                                @csrf
                                <div class="col-md-6">
                                    <label>{{ __('contact.name') }}</label>
                                    <input class="form-control @error('name') border-danger @enderror" type="text"
                                        placeholder="{{ __('login.username') }}" name="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>{{ __('contact.email') }}</label>
                                    <input class="form-control @error('email') border-danger @enderror" type="text"
                                        placeholder="{{ __('contact.email') }}" name="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>{{ __('checkout.phone') }}</label>
                                    <input class="form-control @error('phone') border-danger @enderror" type="text"
                                        placeholder="{{ __('checkout.phone') }}" name="phone">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>{{ __('login.password') }}</label>
                                    <input class="form-control @error('password') border-danger @enderror" type="password"
                                        placeholder="{{ __('login.password') }}" name="password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>{{ __('register.repassword') }}</label>
                                    <input class="form-control" @error('repassword') border-danger @enderror type="password"
                                        placeholder="{{ __('register.repassword') }}" name="repassword">
                                    @error('repassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn">{{ __('register.submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login End -->
@endsection
