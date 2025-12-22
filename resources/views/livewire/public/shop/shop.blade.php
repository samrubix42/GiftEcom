<div>
    @livewire('public.shop.enquire')
    <style>
        /* Jewelry Product Display Styling */
        .column-layer {
            background-size: cover !important;
            background-position: center !important;
        }

        /* Slider jewelry images - Square format for hero display */
        .tp-caption.tp-resizeme img {
            width: 450px !important;
            height: 450px !important;
            object-fit: contain;
            object-position: center;
            background: #f8f8f8;
            padding: 20px;
            border-radius: 8px;
        }

        /* Category images - Landscape for category banners */
        .category-image {
            position: relative;
            overflow: hidden;
            padding-bottom: 75%;
            /* 4:3 aspect ratio */
            background: #f8f8f8;
        }

        .category-image img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            transition: transform 0.3s ease;
        }

        .category-box:hover .category-image img {
            transform: scale(1.05);
        }

        /* Product listing images - Portrait for jewelry showcase */
        .shop-image {
            position: relative;
            overflow: hidden;
            padding-bottom: 125%;
            /* 4:5 aspect ratio - ideal for jewelry */
            background: #ffffff;
        }

        .shop-image img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center;
            padding: 15px;
            transition: transform 0.3s ease;
        }

        .shop-box:hover .shop-image img {
            transform: scale(1.08);
        }

        /* Ensure product cards have consistent height */
        .shop-box {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .shop-footer {
            margin-top: auto;
        }

        /* Responsive adjustments for jewelry display */
        @media (max-width: 991px) {
            .tp-caption.tp-resizeme img {
                width: 350px !important;
                height: 350px !important;
                padding: 15px;
            }

            .category-image {
                padding-bottom: 80%;
            }

            .shop-image {
                padding-bottom: 130%;
            }

            .shop-image img {
                padding: 12px;
            }
        }

        @media (max-width: 575px) {
            .tp-caption.tp-resizeme img {
                width: 270px !important;
                height: 270px !important;
                padding: 10px;
            }

            .category-image {
                padding-bottom: 85%;
            }

            .shop-image {
                padding-bottom: 135%;
            }

            .shop-image img {
                padding: 10px;
            }
        }
    </style>
    <style>
        /* Jewelry Product Display Styling */
        .column-layer {
            background-size: cover !important;
            background-position: center !important;
        }

        /* Slider jewelry images - Square format for hero display */
        .tp-caption.tp-resizeme img {
            width: 450px !important;
            height: 450px !important;
            object-fit: contain;
            object-position: center;
            background: #f8f8f8;
            padding: 20px;
            border-radius: 8px;
        }

        /* Category images - Landscape for category banners */
        .category-image {
            position: relative;
            overflow: hidden;
            padding-bottom: 75%;
            /* 4:3 aspect ratio */
            background: #f8f8f8;
        }

        .category-image img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            transition: transform 0.3s ease;
        }

        .category-box:hover .category-image img {
            transform: scale(1.05);
        }

        /* Product listing images - Portrait for jewelry showcase */
        .shop-image {
            position: relative;
            overflow: hidden;
            padding-bottom: 125%;
            /* 4:5 aspect ratio - ideal for jewelry */
            background: #ffffff;
        }

        .shop-image img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center;
            padding: 15px;
            transition: transform 0.3s ease;
        }

        .shop-box:hover .shop-image img {
            transform: scale(1.08);
        }

        /* Ensure product cards have consistent height */
        .shop-box {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .shop-footer {
            margin-top: auto;
        }

        /* Responsive adjustments for jewelry display */
        @media (max-width: 991px) {
            .tp-caption.tp-resizeme img {
                width: 350px !important;
                height: 350px !important;
                padding: 15px;
            }

            .category-image {
                padding-bottom: 80%;
            }

            .shop-image {
                padding-bottom: 130%;
            }

            .shop-image img {
                padding: 12px;
            }
        }

        @media (max-width: 575px) {
            .tp-caption.tp-resizeme img {
                width: 270px !important;
                height: 270px !important;
                padding: 10px;
            }

            .category-image {
                padding-bottom: 85%;
            }

            .shop-image {
                padding-bottom: 135%;
            }

            .shop-image img {
                padding: 10px;
            }
        }
    </style>
    <!-- start page title -->
    <section class="half-section top-space-margin cover-background" style="background-image: url('{{ asset('image/demo-jewellery-store-about-title-bg.jpg') }}');">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center position-relative page-title-extra-large">
                    <div class="d-flex flex-column extra-very-small-screen" data-anime='{ "el": "childs", "translateY": [0, 0], "opacity": [0,1], "duration": 300, "delay": 0, "staggervalue": 100, "easing": "easeOutQuad" }'>
                        <div class="mt-auto">
                            <h1 class="fw-500 text-dark-gray alt-font mb-0 ls-minus-2px">Shop collection</h1>
                        </div>
                        <div class="fs-16 fw-500 alt-font text-dark-gray justify-content-center breadcrumb breadcrumb-style-01 mt-auto">
                            <ul>
                                <li><a href="{{ route('home') }}" class="text-dark-gray text-medium-gray-hover">Home</a></li>
                                <li>Shop</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->
    <!-- start section -->
    <section class="ps-6 pe-6 lg-ps-3 lg-pe-3 sm-ps-0 sm-pe-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ul class="shop-modern shop-wrapper grid grid-4col md-grid-3col sm-grid-2col xs-grid-1col gutter-extra-large text-center" data-anime='{ "el": "childs", "translateY": [15, 0], "translateX": [-15, 0], "opacity": [0,1], "duration": 500, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                        <li class="grid-sizer"></li>
                        @forelse($products as $product)
                        @php
                        $defaultVariant = $product->defaultVariant ?? $product->variants->first();
                        $price = $defaultVariant ? $defaultVariant->price : 0;
                        $salePrice = $defaultVariant && $defaultVariant->sale_price ? $defaultVariant->sale_price : null;
                        $primaryImage = $product->images->where('is_primary', true)->first() ?? $product->images->first();
                        @endphp
                        <!-- start shop item -->
                        <li class="grid-item">
                            <div class="shop-box mb-10px">
                                <div class="shop-image mb-25px">
                                    <a href="{{ url('/product/' . $product->slug) }}">
                                        <img src="{{ $primaryImage ? asset('storage/' . $primaryImage->image_path) : 'https://placehold.co/600x765' }}" alt="{{ $product->name }}">
                                        @if($product->is_featured)
                                        <span class="lable">Featured</span>
                                        @endif
                                    </a>
                                    <div class="shop-buttons-wrap">
                                        <a wire:click="$dispatch('openEnquire', { id: {{ $product->id }} })"
                                            class="alt-font btn btn-small btn-box-shadow btn-dark-gray btn-round-edge left-icon add-to-cart">
                                            <i class="feather icon-feather-shopping-bag"></i><span class="quick-view-text button-text">Enquire</span>
                                        </a>
                                    </div>
                                    <div class="shop-hover d-flex justify-content-center">
                                        <ul>
                                            <li>
                                            </li>
                                            <li>
                                                <a href="{{ url('/product/' . $product->slug) }}" class="bg-white w-40px h-40px text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px box-shadow-large" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick shop"><i class="feather icon-feather-eye fs-16"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="shop-footer text-center">
                                    <a href="{{ url('/product/' . $product->slug) }}" class="text-dark-gray fs-19 fw-500">{{ $product->name }}</a>
                                    <div class="price">
                                        @if($salePrice)
                                        <del>₹{{ number_format($price, 2) }}</del>₹{{ number_format($salePrice, 2) }}
                                        @else
                                        ₹{{ number_format($price, 2) }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- end shop item -->
                        @empty
                        <li class="col-12">
                            <div class="text-center py-5">
                                <p class="fs-18 text-medium-gray">No products available.</p>
                            </div>
                        </li>
                        @endforelse
                    </ul>

                    <div class="w-100 d-flex mt-4 justify-content-center" data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 600, "delay":100, "staggervalue": 150, "easing": "easeOutQuad" }'>
                        {{ $products->links('vendor.livewire.pagination-links') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
</div>