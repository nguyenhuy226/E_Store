@extends('front.layout')

@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ __('menu.home') }}</a></li>
                <li class="breadcrumb-item active">{{ __('menu.login') }}</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Login Start -->
    <div class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-form">
                        <form method="POST" action="{{ route('loginpost') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>{{__('login.username')}}</label>
                                    <input class="form-control @error('email') border-danger @enderror" type="text"
                                        name="email" placeholder="{{__('login.username')}}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>{{__('login.password')}}</label>
                                    <input class="form-control @error('password') border-danger @enderror" type="password"
                                        name="password" placeholder="{{__('login.password')}}">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="newaccount" name="remember"
                                            value="1">
                                        <label class="custom-control-label" for="newaccount">{{__('login.keep')}}</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn">{{__('login.submit')}}</button>
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
