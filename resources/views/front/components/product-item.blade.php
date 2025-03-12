<div class="product-item">
    <div class="product-title">
        <a href="{{ route('product-detail', ['id' => $product->id]) }}">{{ $product->name }}</a>
        <div class="ratting">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </div>
    </div>
    <div class="product-image">
        <a href="product-detail.html">
            <img src="{{ asset('front/img/product-' . $product->id . '.jpg') }}" alt="Product Image">
        </a>
        <div class="product-action">
            <a href="{{ route('add-to-cart', $product->id) }}"><i class="fa fa-cart-plus"></i></a>
            <a href="#"><i class="fa fa-heart"></i></a>
            <a href="#"><i class="fa fa-search"></i></a>
        </div>
    </div>
    <div class="product-price">
        <h3><span>$</span>{{ $product->price }}</h3>
        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
    </div>
</div>
