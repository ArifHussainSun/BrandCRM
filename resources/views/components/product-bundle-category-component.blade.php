@forelse($categories as $category)

@php
$product_bundles = App\Models\ProductBundles::where('category_id', $category->id)->where('active',1)->with('category')->get();
@endphp
@forelse($product_bundles as $product_bundle)
@php
$ProductName = '';
$ProductDescription = '';
$BundleName = '';
$Category_name ='';
$amount = 0;
$discount = 0;
$discount_type = 0;
$discount_equal = 0;
$percenatge = 0;
$ProductPrice = '';
$ProductDiscount = '';
$BundleName = '';
$products_category =0;
$SubCategories = '';
@endphp

@forelse($products as $product)

                @php
                $selected_products = collect(json_decode($product_bundle->products));
                $product_bundle_title = $product_bundle->title;
                $products_discount = $product_bundle->discount;
                $products_discount_type = $product_bundle->discount_type;
                $products_discount = $product_bundle->discount;

                $products_category = $product_bundle->category->name;
                $bundle_name = $product_bundle->bundles_name;

                if($selected_products->contains($product->id) || $product_bundle_title == $product->id)
                {
                   
                $currency_sign = $product->countrycurrency->currency_symbol;
                
                $ProductName = $product->name;
                $ProductTitle = $product->title;
                $ProductDescription = $product->description;
                $BundleName = $product_bundle_title;
                $ProductPrice = $product->original_price;
                $ProductDiscount = $products_discount;
                $bundle_category = $products_category;
                $BundleName = $bundle_name;
                $amount = floatval($product->original_price);
                
                if($product_bundle->discount>1){
                    $total_amount = App\Http\Controllers\FrontendController::Product_bundle_discount($product_bundle->discount_type , $product_bundle->discount, $amount);

                } else {
                    $total_amount = App\Http\Controllers\FrontendController::Product_bundle_discount($product->discount_type , $product->discount, $amount);
                }

                if($product_bundle_title=='2 In 1' || ($product_bundle_title=='3 In 1')) { $MultiPriceClass  ="multi-price-ul";} else{ $MultiPriceClass = "";}
                if($ProductName=='Corporate Plan' || ($ProductName=='Premium Plan') || ($ProductName=='E-Commerce')) { $RecommendedPriceClass  ="recommended-price";} else{ $RecommendedPriceClass = "";}
                
                @endphp
<div class="col-lg-3 col-sm-6">
    <div class="single-pricing {{ $RecommendedPriceClass }}">
        <div class="price-head">
            <h4>{{ $ProductName }}</h4>
            <h6>{{ $currency_sign }}{{ $total_amount }}</h6>
            <p><span>{!! \Illuminate\Support\Str::words($ProductTitle) !!}</span></p>
        </div>
        <div class="pricing-link">
            <a href="{{ route('payment.generatelink',$product->id) }}" data-detail="USD-100-Item Name-Category" class="theme-btn pay-now-btn" rel="nofollow">Order Now<span class="flash-glow-effect"></span></a>
        </div>
        <div class="pricing-detail {{ $MultiPriceClass }}">
            {!! ($ProductDescription) !!}
        </div>
        <!--<div class="pricing-foot">
            <ul>
                <li><a href="javascript:void(0)" onclick="$zopim.livechat.window.show()"><i class="fas fa-comment-dots"></i> Live Chat Support</a></li>
                <li><a href="mailto:info@designcater.com"><i class="fa fa-at"></i> info@designcater.com</a></li>
            </ul>
        </div>-->
    </div>
</div>

@php
                }
                @endphp
                @empty
                @endforelse

                @empty
@endforelse
@empty
@endforelse