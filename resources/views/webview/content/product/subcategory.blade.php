@extends('webview.master')

@section('maincontent')
    @section('title')
        {{ env('APP_NAME') }}-{{ $subcategorysingle->sub_category_name }}
    @endsection
    <style>
        #checked {
            color: orange;
        }

        .star {
            font-size: 8px !important;
        }
    </style>

    <!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class="pt-2 breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="p-0 breadcrumb-inner">
                            <ul class="mb-0 list-inline list-unstyled">
                                <li><a href="#"
                                        style="text-transform: capitalize !important;color: #888;padding-right: 12px;font-size: 12px;">Home
                                        > subcategory > <span class="active"></span>{{ $subcategorysingle->sub_category_name }}</span>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.breadcrumb-inner -->
                </div>
            </div>
            <!-- /.container -->
        </div>
        <div class='container'>
            <div class='row'>
                <!-- /.sidebar -->
                <div class='col-md-12' id="cateoryPro">
                    <div class="container p-0">
                        <div class="pt-2 pb-2 row" style="background: white;">
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
                                @if(isset($firstpro))
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
                                @endif
                            @empty
                            @endforelse








                        </div>
                        <div class="text-center auto-load" style="display: none;">
                            <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="60" viewBox="0 0 100 100"
                                enable-background="new 0 0 0 0" xml:space="preserve">
                                <path fill="#000"
                                    d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                                        from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                                </path>
                            </svg>
                        </div>
                    </div>

                </div>
                <!-- /.col -->
            </div>

            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
        <!-- /.container -->

    </div>



    <script>

        var ENDPOINT = "{{ url('category-info-ajax') }}";
        var page = 1;

        $(window).scroll(function () {
            page++;
            infinteLoadMore(page);
        });


        function infinteLoadMore(page) {
            $.ajax({
                url: ENDPOINT + "?page=" + page,
                datatype: "html",
                type: "get",
                beforeSend: function () {
                    $('.auto-load').show();
                }
            })
                .done(function (response) {
                    if (response.html == '') {
                        $('.auto-load').html("");
                        return;
                    }

                    $('.auto-load').hide();
                    $("#data-wrapper").append(response.html);
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    console.log('Server error occured');
                });
        }

    </script>

    <style>
        @media only screen and (max-width: 768px) {
            #cateoryProSidebar {
                padding-right: 0;
            }

            #cateoryPro {
                padding-left: 0;
            }
        }

        #cateoryProSidebar {
            padding-left: 0;
        }

        #cateoryPro {
            padding-right: 0px;
        }

        .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-heading .accordion-toggle.collapsed:after {
            color: #636363;
            content: "\f067";
            font-family: fontawesome;
            font-weight: normal;
        }

        .sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-heading .accordion-toggle:after {
            content: "\f068";
            float: right;
            font-family: fontawesome;
        }

        .widget-title {
            font-size: 16px;
            text-align: center;
            border-bottom: 1px solid #e9e9e9;
            padding-bottom: 10px;
            margin: 0;
        }

        .list {
            list-style: none;
        }

        #liaside {
            color: #858585;
            font-weight: bold;
        }

        .breadcrumb {
            padding: 5px 0;
            border-bottom: 1px solid #e9e9e9;
            background-color: #fafafa;
        }
    </style>

@endsection
