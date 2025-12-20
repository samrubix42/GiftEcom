<div>
    <section class="top-space-margin border-top border-color-extra-medium-gray pt-20px pb-20px ps-35px pe-35px lg-ps-25px lg-pe-25px md-ps-15px md-pe-15px sm-ps-0 sm-pe-0">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12 breadcrumb breadcrumb-style-01 fs-15 alt-font">
                    <ul>
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('shop')}}">Shop</a></li>
                        <li>{{ $product->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <!-- end section -->
    <!-- start section -->
    <section class="pt-60px md-pt-30px pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 pe-50px md-pe-15px md-mb-40px">
                    <div class="row overflow-hidden position-relative">
                        <div class="col-12 col-lg-10 position-relative order-lg-2 product-image ps-30px md-ps-15px">
                            <div class="swiper product-image-slider" data-slider-options='{ "spaceBetween": 10, "loop": true, "autoplay": { "delay": 2000, "disableOnInteraction": false }, "watchOverflow": true, "navigation": { "nextEl": ".slider-product-next", "prevEl": ".slider-product-prev" }, "thumbs": { "swiper": { "el": ".product-image-thumb", "slidesPerView": "auto", "spaceBetween": 15, "direction": "vertical", "navigation": { "nextEl": ".swiper-thumb-next", "prevEl": ".swiper-thumb-prev" } } } }' data-thumb-slider-md-direction="horizontal">
                                <div class="swiper-wrapper">
                                    @if($selectedImage)
                                    <div class="swiper-slide gallery-box">
                                        <a href="{{ $this->imageUrl($selectedImage) }}" data-group="lightbox-gallery" title="{{ $product->name }}">
                                            <img class="w-100" src="{{ $this->imageUrl($selectedImage) }}" alt="{{ $product->name }}" style="max-height:760px; width:auto; object-fit:contain; display:block; margin:0 auto;">
                                        </a>
                                    </div>
                                    @endif

                                    @foreach($product->images as $image)
                                    @if(!$selectedImage || $selectedImage !== $image->image_path)
                                    <div class="swiper-slide gallery-box">
                                        <a href="{{ $this->imageUrl($image->image_path) }}" data-group="lightbox-gallery" title="{{ $product->name }}">
                                            <img class="w-100" src="{{ $this->imageUrl($image->image_path) }}" alt="{{ $product->name }}" style="max-height:760px; width:auto; object-fit:contain; display:block; margin:0 auto;">
                                        </a>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 order-lg-1 position-relative single-product-thumb">
                            <div class="swiper-container product-image-thumb slider-vertical" wire:ignore.self data-slider-options='{ "spaceBetween": 15, "slidesPerView": "auto", "direction": "vertical", "watchOverflow": true, "navigation": { "nextEl": ".swiper-thumb-next", "prevEl": ".swiper-thumb-prev" } }' data-thumb-slider-md-direction="horizontal">
                                <div class="swiper-wrapper">
                                    @foreach($product->images as $img)
                                    <div class="swiper-slide">
                                        <img class="w-100" src="{{ $this->imageUrl($img->image_path) }}" alt="{{ $product->name }}" style="max-height:140px; width:auto; object-fit:cover; cursor:pointer; display:block; margin:0 auto;" wire:click="selectImage('{{ $img->image_path }}')" />
                                    </div>
                                    @endforeach

                                    @if($selectedVariant && $selectedVariant->images->count())
                                    @foreach($selectedVariant->images as $vimg)
                                    @if(!$product->images->firstWhere('image_path', $vimg->image_path))
                                    <div class="swiper-slide">
                                        <img class="w-100" src="{{ $this->imageUrl($vimg->image_path) }}" alt="{{ $product->name }}" style="max-height:140px; width:auto; object-fit:cover; cursor:pointer; display:block; margin:0 auto;" wire:click="selectImage('{{ $vimg->image_path }}')" />
                                    </div>
                                    @endif
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 product-info">
                    <span class="fw-500 text-dark-gray d-block">{{ $product->brand->name ?? '' }}</span>
                    <h5 class="alt-font text-dark-gray fw-600 mb-10px">{{ $product->name }}</h5>
                    <div class="d-block d-sm-flex align-items-center mb-20px">

                        <div><span class="text-dark-gray fw-500">SKU: </span>{{ $selectedVariant->sku ?? optional($product->defaultVariant)->sku }}</div>
                        <!-- <div><span class="text-dark-gray fw-500">Stock: </span>{{ $selectedVariant->stock ?? 'N/A' }}</div> -->
                        @if($selectedVariant && $selectedVariant->attributes->count())
                        <div class="mt-2">
                            @foreach($selectedVariant->attributes as $attr)
                            <span class="badge bg-light text-dark me-1">{{ optional($attr->attribute)->name }}: {{ optional($attr->value)->value }}</span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="product-price mb-10px">
                        @php
                        $price = $selectedVariant
                        ? ($selectedVariant->sale_price ?? $selectedVariant->price)
                        : (optional($product->defaultVariant)->sale_price ?? optional($product->defaultVariant)->price ?? null);

                        $original = $selectedVariant
                        ? ($selectedVariant->price ?? null)
                        : (optional($product->defaultVariant)->price ?? null);
                        @endphp
                        <span class="text-dark-gray fs-28 xs-fs-24 fw-600 ls-minus-1px">
                            @if($price && $original && $price < $original)
                                <del class="text-medium-gray me-10px fw-400">₹{{ number_format($original,2) }}</del>₹{{ number_format($price,2) }}
                                @elseif($price)
                                ₹{{ number_format($price,2) }}
                                @else
                                -
                                @endif
                        </span>
                    </div>
                    <p>{{ $product->description }}</p>
                    @if($product->variants->count())
                    <div class="mb-20px">
                        <label class="text-dark-gray alt-font me-15px fw-500 d-block mb-2">Options</label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($product->variants as $variant)
                            @php $isActive = $selectedVariant && $selectedVariant->id === $variant->id; @endphp
                            <button
                                type="button"
                                class="btn btn-sm {{ $isActive ? 'btn-dark' : 'btn-outline-secondary' }} border-radius-4px d-flex align-items-center"
                                wire:click.prevent="selectVariant({{ $variant->id }})"
                                aria-pressed="{{ $isActive ? 'true' : 'false' }}"
                                title="{{ $variantLabels[$variant->id] ?? $variant->sku }}">
                                <span class="me-2">{{ $variantLabels[$variant->id] ?? $variant->sku }}</span>
                                @if($variant->sale_price || $variant->price)
                                <span class="badge bg-white text-dark border ms-1">₹{{ number_format($variant->sale_price ?? $variant->price,2) }}</span>
                                @endif
                            </button>
                            @endforeach
                        </div>
                    </div>
                    @endif


                    <div class="mb-20px h-1px w-100 bg-extra-medium-gray d-block"></div>

                    <div class="bg-very-light-gray ps-30px pe-30px pt-25px pb-25px mb-20px xs-p-25px border-radius-4px">
                        <span class="alt-font fs-17 fw-500 text-dark-gray mb-15px d-block lh-initial">Guarantee safe and secure checkout</span>
                        <div>
                            <a href="#"><img src="{{asset('asset/images/visa.svg')}}" class="h-30px me-5px mb-5px" alt=""></a>
                            <a href="#"><img src="{{asset('asset/images/mastercard.svg')}}" class="h-30px me-5px mb-5px" alt=""></a>
                            <a href="#"><img src="{{asset('asset/images/american-express.svg')}}" class="h-30px me-5px mb-5px" alt=""></a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- end section -->
    <!-- start section -->
    <section>
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-xl-5 col-lg-6 col-md-8 text-center last-paragraph-no-margin">
                    <h3 class="fw-500 ls-minus-1px text-dark-gray mb-10px">You may also like</h3>
                    <p>Lorem ipsum dolor amet consectetur adipiscing dictum placerat diam in vestibulum vivamus in eros.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Related Products -->
                    @if(!empty($relatedProducts) && $relatedProducts->count())
                    <section class="pt-40px pb-60px">
                        <div class="container">
                            <div class="row gx-3 gy-4">
                                @foreach($relatedProducts as $rp)
                                @php
                                $rpImage = $rp->images->first()->image_path ?? optional($rp->defaultVariant)->images->first()->image_path ?? null;
                                $rpPrice = optional($rp->defaultVariant)->sale_price ?? optional($rp->defaultVariant)->price ?? null;
                                @endphp
                                <div class="col-6 col-sm-4 col-md-3">
                                    <div class="border border-color-extra-light p-15px h-100 d-flex flex-column justify-content-between bg-white">
                                        <a href="{{ url('product/'.$rp->slug) }}" class="d-block mb-12px" style="display:block; text-align:center;">
                                            <div style="height:220px; display:flex; align-items:center; justify-content:center;">
                                                <img src="{{ $this->imageUrl($rpImage) }}" alt="{{ $rp->name }}" style="max-height:100%; max-width:100%; object-fit:contain;" />
                                            </div>
                                        </a>
                                        <div class="d-block mt-10px">
                                            <a href="{{ url('product/'.$rp->slug) }}" class="alt-font d-block text-dark-gray fw-500 mb-8px" style="display:block; min-height:44px; overflow:hidden; text-overflow:ellipsis;">
                                                <span style="display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">{{ $rp->name }}</span>
                                            </a>
                                            <div class="text-dark-gray fw-600">
                                                @if($rpPrice)
                                                ₹{{ number_format($rpPrice,2) }}
                                                @else
                                                -
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    @endif
                </div>
            </div>
        </div>
    </section>

</div>