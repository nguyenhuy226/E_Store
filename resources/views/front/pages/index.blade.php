@extends('front.layout')

@section('content')
    <!-- Main Slider Start -->

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <nav class="navbar bg-light">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-home"></i>{{ __('menu.home') }}</a>
                            </li>
                            @foreach ($categories as $category)
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i
                                            class="{{ $category->description }}"></i>{{ $category->name }} </a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <div class="col-md-6">
                    <div class="header-slider normal-slider">
                        <div class="header-slider-item">
                            <img src="{{ asset('front/img/slider-1.jpg') }}" alt="Slider Image" />
                            <div class="header-slider-caption">
                                <p>Some text goes here that describes the image</p>
                                <a class="btn" href=""><i
                                        class="fa fa-shopping-cart"></i>{{ __('home.shopnow') }}</a>
                            </div>
                        </div>
                        <div class="header-slider-item">
                            <img src="{{ asset('front/img/slider-2.jpg') }}" alt="Slider Image" />
                            <div class="header-slider-caption">
                                <p>Some text goes here that describes the image</p>
                                <a class="btn" href=""><i
                                        class="fa fa-shopping-cart"></i>{{ __('home.shopnow') }}</a>
                            </div>
                        </div>
                        <div class="header-slider-item">
                            <img src="{{ asset('front/img/slider-3.jpg') }}" alt="Slider Image" />
                            <div class="header-slider-caption">
                                <p>Some text goes here that describes the image</p>
                                <a class="btn" href=""><i
                                        class="fa fa-shopping-cart"></i>{{ __('home.shopnow') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="header-img">
                        <div class="img-item">
                            <img src="{{ asset('front/img/category-1.jpg') }}" />
                            <a class="img-text" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                        <div class="img-item">
                            <img src="{{ asset('front/img/category-2.jpg') }}" />
                            <a class="img-text" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Slider End -->

    <!-- Brand Start -->
    <div class="brand">
        <div class="container-fluid">
            <div class="brand-slider">
                <div class="brand-item"><img src="{{ asset('front/img/brand-1.png') }}" alt=""></div>
                <div class="brand-item"><img src="{{ asset('front/img/brand-2.png') }}" alt=""></div>
                <div class="brand-item"><img src="{{ asset('front/img/brand-3.png') }}" alt=""></div>
                <div class="brand-item"><img src="{{ asset('front/img/brand-4.png') }}" alt=""></div>
                <div class="brand-item"><img src="{{ asset('front/img/brand-5.png') }}" alt=""></div>
                <div class="brand-item"><img src="{{ asset('front/img/brand-6.png') }}" alt=""></div>
            </div>
        </div>
    </div>
    <!-- Brand End -->

    <!-- Feature Start-->
    <div class="feature">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fab fa-cc-mastercard"></i>
                        <h2>{{ __('policy.payment') }}</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur elit
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-truck"></i>
                        <h2>{{ __('policy.delivery') }}</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur elit
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-sync-alt"></i>
                        <h2>{{ __('policy.return') }}</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur elit
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-comments"></i>
                        <h2>{{ __('policy.support') }}</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur elit
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End-->

    <!-- Category Start-->
    <div class="category">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="category-item ch-400">
                        <img src="{{ asset('front/img/category-3.jpg') }}" />
                        <a class="category-name" href="">
                            <p>Some text goes here that describes the image</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-item ch-250">
                        <img src="{{ asset('front/img/category-4.jpg') }}" />
                        <a class="category-name" href="">
                            <p>Some text goes here that describes the image</p>
                        </a>
                    </div>
                    <div class="category-item ch-150">
                        <img src="{{ asset('front/img/category-5.jpg') }}" />
                        <a class="category-name" href="">
                            <p>Some text goes here that describes the image</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-item ch-150">
                        <img src="{{ asset('front/img/category-6.jpg') }}" />
                        <a class="category-name" href="">
                            <p>Some text goes here that describes the image</p>
                        </a>
                    </div>
                    <div class="category-item ch-250">
                        <img src="{{ asset('front/img/category-7.jpg') }}" />
                        <a class="category-name" href="">
                            <p>Some text goes here that describes the image</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-item ch-400">
                        <img src="{{ asset('front/img/category-8.jpg') }}" />
                        <a class="category-name" href="">
                            <p>Some text goes here that describes the image</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Category End-->

    <!-- Call to Action Start -->
    <div class="call-to-action">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1>{{ __('home.queries') }}</h1>
                </div>
                <div class="col-md-6">
                    <a href="tel:0123456789">+012-345-6789</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->

    <!-- Featured Product Start -->
    <div class="featured-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1>{{ __('home.featured') }}</h1>
            </div>
            <div class="row align-items-center product-slider product-slider-4">
                @foreach ($latesProducts as $product)
                    <div class="col-lg-3">
                        @include('front.components.product-item', [
                            'product' => $product,
                        ])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Featured Product End -->

    <!-- Newsletter Start -->
    <div class="newsletter">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h1>{{ __('home.Subscribe') }}</h1>
                </div>
                <div class="col-md-6">
                    <div class="form">
                        <input type="email" value="Your email here">
                        <button>Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter End -->

    <!-- Recent Product Start -->
    <div class="recent-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1>{{ __('home.Recent') }}</h1>
            </div>
            <div class="row align-items-center product-slider product-slider-4">
                @foreach ($latesProducts as $product)
                    <div class="col-lg-3">
                        @include('front.components.product-item', [
                            'product' => $product,
                        ])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Recent Product End -->

    <!-- Review Start -->
    <div class="review">
        <div class="container-fluid">
            <div class="row align-items-center review-slider normal-slider">
                <div class="col-md-6">
                    <div class="review-slider-item">
                        <div class="review-img">
                            <img src="{{ asset('front/img/review-1.jpg') }}" alt="Image">
                        </div>
                        <div class="review-text">
                            <h2>Customer Name</h2>
                            <h3>Profession</h3>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo
                                finibus luctus et vitae lorem
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="review-slider-item">
                        <div class="review-img">
                            <img src="{{ asset('front/img/review-2.jpg') }}" alt="Image">
                        </div>
                        <div class="review-text">
                            <h2>Customer Name</h2>
                            <h3>Profession</h3>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo
                                finibus luctus et vitae lorem
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="review-slider-item">
                        <div class="review-img">
                            <img src="{{ asset('front/img/review-3.jpg') }}" alt="Image">
                        </div>
                        <div class="review-text">
                            <h2>Customer Name</h2>
                            <h3>Profession</h3>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo
                                finibus luctus et vitae lorem
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Review End -->
@endsection
