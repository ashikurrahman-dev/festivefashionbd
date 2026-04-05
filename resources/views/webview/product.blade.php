<div class="container">
    <div class="row g-3">
        @forelse ($categoryproducts as $promotional)
            @php
                $relatedProducts = json_decode($promotional->RelatedProductIds, true);
                $firstRelatedId = $relatedProducts[0]['productID'] ?? null;

                $firstpro = null;
                if ($firstRelatedId) {
                    $firstpro = App\Models\Product::with([
                        'sizes' => function ($query) {
                            $query->select('id', 'product_id', 'Discount', 'RegularPrice', 'SalePrice')
                                ->take(1);
                        },
                    ])
                        ->where('id', $firstRelatedId)
                        ->select('id', 'ProductName')
                        ->first();
                }
                $firstImage = json_decode(App\Models\Product::find($firstRelatedId)->PostImage, true)[0] ?? null;
                
            @endphp
            <div class="col-6 col-md-3">
                <div class="card product-card">
                    <div class="sale-discount-badge">{{ round((($firstpro->sizes[0]->RegularPrice - $firstpro->sizes[0]->SalePrice) / $firstpro->sizes[0]->RegularPrice) * 100) }}%</div>
                    <a href="{{ url('view-product/' . $promotional->ProductSlug) }}"
                        class="product-image {{ !empty($firstImage) ? 'has-hover-img' : '' }}">

                            <img class="img-default"
                                src="{{ asset($promotional->ProductImage) }}"
                                alt="Product">

                            @if(!empty($firstImage))
                                <img class="img-hover"
                                    src="{{ asset('public/images/product/slider/'.$firstImage) }}"
                                    alt="Product">
                            @endif

                    </a>

                    <a href="{{ url('view-product/' . $promotional->ProductSlug) }}">
                        <div class="product-info ">
                            <div>
                                <div class="product-name" style="text-align:center;">
                                    {{ $promotional->ProductName }}
                                </div>
                                <div class="product-price" style="text-align:center;">
                                    <del style="color: #555875;font-size: 14px;">
                                        {{ round($firstpro->sizes[0]->RegularPrice) }}৳
                                    </del>
                                    {{ round($firstpro->sizes[0]->SalePrice) }}৳
                                </div>
                            </div>
                        </div>
                    </a>

                    <div class="product-btn-wrap">
                        <!-- <button type="button" class="btn quick-add-to-cart-btn quick-shop-btn d-flex justify-content-center" data-product-id="{{ $promotional->id }}">
                            Add to Cart
                        </button> -->

                        <a href="{{ url('view-product/' . $promotional->ProductSlug) }}"
                            class="mt-1 btn quick-buy-now-btn w-100">
                            Buy Now
                        </a>
                    </div>
                </div>

            </div>
        @empty
        @endforelse

    </div>
</div>
