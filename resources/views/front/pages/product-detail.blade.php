@extends('front.layout')

@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">{{ $item->category->name }}</a></li>
                <li class="breadcrumb-item active">{{ $item->product_name }}</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Detail Start -->
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product-detail-top">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <div class="product-slider-single normal-slider">
                                    @foreach ($relates as $relate)
                                        <img src="{{ asset('front/img/product-' . $relate->id . '.jpg') }}"
                                            alt="Product Image">
                                    @endforeach

                                </div>
                                <div class="product-slider-single-nav normal-slider">
                                    @foreach ($relates as $relate)
                                        <div class="slider-nav-img"><img
                                                src="{{ asset('front/img/product-' . $relate->id . '.jpg') }}"
                                                alt="Product Image"></div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="product-content">
                                    <div class="title">
                                        <h2>{{ $item->product_name }}</h2>
                                    </div>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="price">
                                        <h4>{{ __('productdetail.price') }}:</h4>
                                        <p>{{ $item->price }} <span>$149</span></p>
                                    </div>
                                    <div class="quantity">
                                        <h4>{{ __('productdetail.quantity') }}:</h4>
                                        <div class="qty">
                                            <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                            <input type="text" value="1">
                                            <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="p-size">
                                        <h4>{{ __('productdetail.size') }}:</h4>
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn">S</button>
                                            <button type="button" class="btn">M</button>
                                            <button type="button" class="btn">L</button>
                                            <button type="button" class="btn">XL</button>
                                        </div>
                                    </div>
                                    <div class="p-color">
                                        <h4>{{ __('productdetail.color') }}:</h4>
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn">White</button>
                                            <button type="button" class="btn">Black</button>
                                            <button type="button" class="btn">Blue</button>
                                        </div>
                                    </div>
                                    <div class="action">
                                        <a class="btn" href="{{ route('add-to-cart', $item->id) }}"><i
                                                class="fa fa-shopping-cart"></i>{{ __('productdetail.cart') }}</a>
                                        <a class="btn" href="#"><i
                                                class="fa fa-shopping-bag"></i>{{ __('productdetail.buy') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row product-detail-bottom">
                        <div class="col-lg-12">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill"
                                        href="#description">{{ __('productdetail.des') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill"
                                        href="#specification">{{ __('productdetail.specification') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill"
                                        href="#reviews">{{ __('productdetail.reviews') }} (1)</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="description" class="container tab-pane active">
                                    <h4>{{ __('productdetail.des') }}</h4>
                                    <p>
                                        {{ $item->description }}
                                    </p>
                                </div>
                                <div id="specification" class="container tab-pane fade">
                                    <h4>{{ __('productdetail.specification') }} </h4>
                                    <ul>
                                        <li>Lorem ipsum dolor sit amet</li>
                                        <li>Lorem ipsum dolor sit amet</li>
                                        <li>Lorem ipsum dolor sit amet</li>
                                        <li>Lorem ipsum dolor sit amet</li>
                                        <li>Lorem ipsum dolor sit amet</li>
                                    </ul>
                                </div>
                                <div id="reviews" class="container tab-pane fade">
                                    <div class="reviews-submitted">
                                        <div class="reviewer">Phasellus Gravida - <span>01 Jan 2020</span></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p>
                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                            doloremque laudantium, totam rem aperiam.
                                        </p>
                                    </div>
                                    <div class="reviews-submit">
                                        <h4>Give your Review:</h4>
                                        <div class="ratting">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <div class="row form">
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Name">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="email" placeholder="Email">
                                            </div>
                                            <div class="col-sm-12">
                                                <textarea placeholder="Review"></textarea>
                                            </div>
                                            <div class="col-sm-12">
                                                <button>Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($relates->isNotEmpty())
                        <div class="product">
                            <div class="section-header">
                                <h1>{{ __('productdetail.related') }}</h1>
                            </div>

                            <div class="row align-items-center product-slider product-slider-3">
                                @foreach ($relates as $relate)
                                    <div class="col-lg-3">
                                        {{-- @include('front.components.product-item', [
                                            'product' => $relate,
                                        ]) --}}
                                        @include('front.components.product-item', [
                                            'product' => $relate,
                                        ])
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Side Bar Start -->
                <div class="col-lg-4 sidebar">
                    <div class="sidebar-widget category">
                        <h2 class="title">{{ __('productdetail.category') }}</h2>
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                @foreach ($categories as $category)
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i
                                                class="{{ $category->image_share }}"></i>{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>

                    <div class="sidebar-widget widget-slider">
                        <div class="sidebar-slider normal-slider">
                            @foreach ($relates as $relate)
                                {{-- @include('front.componets.product-item', [
                                    'product' => $relate,
                                ]) --}}
                                @include('front.components.product-item', [
                                    'product' => $relate,
                                ])
                            @endforeach
                        </div>
                    </div>

                    <div class="sidebar-widget brands">
                        <h2 class="title">{{ __('product.brands') }}</h2>
                        <ul>
                            <li><a href="#">Nulla </a><span>(45)</span></li>
                            <li><a href="#">Curabitur </a><span>(34)</span></li>
                            <li><a href="#">Nunc </a><span>(67)</span></li>
                            <li><a href="#">Ullamcorper</a><span>(74)</span></li>
                            <li><a href="#">Fusce </a><span>(89)</span></li>
                            <li><a href="#">Sagittis</a><span>(28)</span></li>
                        </ul>
                    </div>

                    <div class="sidebar-widget tag">
                        <h2 class="title">{{ __('product.tag') }}</h2>
                        <a href="#">Lorem ipsum</a>
                        <a href="#">Vivamus</a>
                        <a href="#">Phasellus</a>
                        <a href="#">pulvinar</a>
                        <a href="#">Curabitur</a>
                        <a href="#">Fusce</a>
                        <a href="#">Sem quis</a>
                        <a href="#">Mollis metus</a>
                        <a href="#">Sit amet</a>
                        <a href="#">Vel posuere</a>
                        <a href="#">orci luctus</a>
                        <a href="#">Nam lorem</a>
                    </div>
                </div>
                <!-- Side Bar End -->
            </div>
        </div>
    </div>
    <!-- Product Detail End -->

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
@endsection
