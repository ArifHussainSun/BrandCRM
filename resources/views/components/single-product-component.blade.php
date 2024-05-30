@php
    $ProductName = $product->name;
    $ProductDescription = $product->description;
    $currency_sign = $product->countrycurrency->currency_symbol;
    $ProductPrice = $product->original_price;
    $ProductCategory = $product->category->name;

    $amount = floatval($product->original_price);
    $total_amount = App\Http\Controllers\FrontendController::Product_bundle_discount($product->discount_type , $product->discount, $amount);


@endphp

<div class="single-pricing big-pricing">
    <div class="row">
        <div class="col-12">
            <div class="price-head big-pkg-head">
                <h4>{{ $ProductName }}</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="price-head">
                <h6>{{ $currency_sign }}{{ $total_amount }}</h6>
                <p><span>{{ $ProductName }}</span></p>
            </div>
            <div class="pricing-link">
        <a href="{{ route('payment.generatelink',$product->id) }}" data-detail="USD-100-Item Name-Category" class="theme-btn pay-now-btn" rel="nofollow">Order Now<span class="flash-glow-effect"></span></a>
            </div>
        </div>
        {!! $ProductDescription !!}
    </div>
</div>