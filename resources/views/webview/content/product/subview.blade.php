<style>
    #featureimageCt {
        height: 180px;
        width: auto;
        padding: 2px;
        padding-top: 0;
    }

    @media only screen and (max-width: 600px) {
        #featureimageCt {
            height: 180px;
            width: auto;
            padding: 2px;
            padding-top: 0;
        }
    }
</style>
<div class="pt-2 pb-2 row" id="cateoryPro" style="background: white;">
    <div class="container">
        <div class="row g-4">
            @forelse ($subcategoryproducts as $promotional)
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
                        <!-- <a href="{{ url('view-product/' . $promotional->ProductSlug) }}">
                            <img src="{{ asset($promotional->ProductImage) }}" alt="Product">
                        </a> -->
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


                        <div class="product-actions">
                            <button style="border:none;background:none;color:#fff;margin-bottom:-5px" class="quick-shop-btn"
                                type="button" data-product-id="{{ $promotional->id }}"><i class="fa-regular fa-eye"></i>
                                Quick
                                View</button>
                            <a href="{{ url('view-product/' . $promotional->ProductSlug) }}"><i
                                    class="fa-solid fa-cart-plus"></i> Buy Now</a>
                        </div>

                        <a href="{{ url('view-product/' . $promotional->ProductSlug) }}">
                            <div class="product-info d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="product-name">{{ $promotional->ProductName }}</div>
                                    <div class="product-price">
                                        ৳ {{ round(App\Models\Size::where('product_id',$promotional->id)->first()->SalePrice) }}</div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            @empty
            @endforelse

        </div>
    </div>

</div>
<script>
        $(document).ready(function () {
            $('.quick-shop-btn').on('click', function () {
                var productId = $(this).data('product-id');

                $('#quickShopModalBody').html('<p>Loading...</p>');

                $('#quickShopModal').modal('show');

                $.ajax({
                    url: '{{url("quick-shop")}}/' + productId, // your route
                    type: 'GET',
                    success: function (response) {
                        $('#quickShopModalBody').html(response);
                    },
                    error: function () {
                        $('#quickShopModalBody').html('<p>Something went wrong!</p>');
                    }
                });
            });
        });

    </script>
