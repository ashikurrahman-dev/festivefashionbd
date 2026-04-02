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
                ;
            @endphp
            <div class="col-6 col-md-2">
                <div class="card product-card">
                    <div class="sale-discount-badge">{{ round((($firstpro->sizes[0]->RegularPrice - $firstpro->sizes[0]->SalePrice) / $firstpro->sizes[0]->RegularPrice) * 100) }}%</div>
                    <a href="{{ url('view-product/' . $promotional->ProductSlug) }}">
                        <img src="{{ asset($promotional->ProductImage) }}" alt="Product">
                    </a>

                    <a href="{{ url('view-product/' . $promotional->ProductSlug) }}">
                        <div class="product-info d-flex justify-content-between align-items-center">
                            <div>
                                <div class="product-name">{{ $promotional->ProductName }}</div>
                                <div class="product-price">
                                    ৳ {{ round($firstpro->sizes[0]->SalePrice) }}</div>
                            </div>
                        </div>
                    </a>

                    <div class="product-btn-wrap">
                        <button type="button" class="btn quick-add-to-cart-btn quick-shop-btn d-flex justify-content-center" data-product-id="{{ $promotional->id }}">
                            Add to Cart
                        </button>

                        <a href="{{ url('view-product/' . $promotional->ProductSlug) }}" class="btn quick-buy-now-btn d-flex justify-content-center">
                            Buy Now
                        </a>
                    </div>
                </div>

            </div>
        @empty
        @endforelse

    </div>
</div>
