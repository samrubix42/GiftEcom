<div>
 <section class="top-space-margin border-top border-color-extra-medium-gray pt-20px pb-20px ps-35px pe-35px lg-ps-25px lg-pe-25px md-ps-15px md-pe-15px sm-ps-0 sm-pe-0">
            <div class="container-fluid">
                <div class="row align-items-center"> 
                    <div class="col-12 breadcrumb breadcrumb-style-01 fs-15 alt-font">
                        <ul>
                            <li><a href="demo-jewellery-store.html">Home</a></li>
                            <li><a href="demo-jewellery-store-shop.html">Shop</a></li>
                            <li>Diamond gold bangle</li>
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
                                <div class="swiper-container product-image-thumb slider-vertical" wire:ignore data-slider-options='{ "spaceBetween": 15, "slidesPerView": "auto", "direction": "vertical", "watchOverflow": true, "navigation": { "nextEl": ".swiper-thumb-next", "prevEl": ".swiper-thumb-prev" } }' data-thumb-slider-md-direction="horizontal">
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
                            <div class="me-10px xs-me-0">
                                <a href="#tab" class="section-link ls-minus-1px icon-small">
                                    <i class="bi bi-star-fill text-golden-yellow"></i>
                                    <i class="bi bi-star-fill text-golden-yellow"></i>
                                    <i class="bi bi-star-fill text-golden-yellow"></i>
                                    <i class="bi bi-star-fill text-golden-yellow"></i>
                                    <i class="bi bi-star-fill text-golden-yellow"></i>
                                </a>
                            </div>
                            <a href="#tab" class="me-25px text-dark-gray fw-500 section-link xs-me-0">165 Reviews</a>
                            <div><span class="text-dark-gray fw-500">SKU: </span>{{ $selectedVariant->sku ?? optional($product->defaultVariant)->sku }}</div>
                            <div><span class="text-dark-gray fw-500">Stock: </span>{{ $selectedVariant->stock ?? 'N/A' }}</div>
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
                                    <del class="text-medium-gray me-10px fw-400">${{ number_format($original,2) }}</del>${{ number_format($price,2) }}
                                @elseif($price)
                                    ${{ number_format($price,2) }}
                                @else
                                    -
                                @endif
                            </span>
                        </div>
                        <p>{{ $product->description }}</p>
                        @if($product->variants->count())
                        <div class="d-flex align-items-center mb-20px">
                            <label class="text-dark-gray alt-font me-15px fw-500">Options</label>
                            <ul class="shop-color mb-0 d-flex list-unstyled">
                                @foreach($product->variants as $variant)
                                    <li class="me-2">
                                        <button type="button" class="btn btn-outline-secondary {{ $selectedVariant && $selectedVariant->id === $variant->id ? 'active' : '' }}" wire:click.prevent="selectVariant({{ $variant->id }})">
                                            {{ $variantLabels[$variant->id] ?? $variant->sku }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                   
                        <div class="row mb-20px">
                            <div class="col-auto icon-with-text-style-08">
                                <div class="feature-box feature-box-left-icon-middle d-inline-flex align-middle">
                                    <div class="feature-box-icon me-10px">  
                                        <i class="feather icon-feather-repeat align-middle text-dark-gray"></i>
                                    </div>
                                    <div class="feature-box-content">
                                        <a href="#" class="alt-font fw-500 text-dark-gray d-block">Compare</a> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto icon-with-text-style-08">
                                <div class="feature-box feature-box-left-icon-middle d-inline-flex align-middle">
                                    <div class="feature-box-icon me-10px">  
                                        <i class="feather icon-feather-mail align-middle text-dark-gray"></i>
                                    </div>
                                    <div class="feature-box-content">
                                        <a href="#" class="alt-font fw-500 text-dark-gray d-block">Ask a question</a> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto icon-with-text-style-08">
                                <div class="feature-box feature-box-left-icon-middle d-inline-flex align-middle">
                                    <div class="feature-box-icon me-10px">  
                                        <i class="feather icon-feather-share-2 align-middle text-dark-gray"></i>
                                    </div>
                                    <div class="feature-box-content">
                                        <a href="#" class="alt-font fw-500 text-dark-gray d-block">Share</a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-20px h-1px w-100 bg-extra-medium-gray d-block"></div>
                        <div class="row mb-15px">
                            <div class="col-12 icon-with-text-style-08">
                                <div class="feature-box feature-box-left-icon d-inline-flex align-middle">
                                    <div class="feature-box-icon me-10px">  
                                        <i class="feather icon-feather-truck top-8px position-relative align-middle text-dark-gray"></i>
                                    </div>
                                    <div class="feature-box-content">
                                        <span><span class="alt-font text-dark-gray fw-500">Estimated delivery:</span> March 03 - March 07</span> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 icon-with-text-style-08 mb-10px">
                                <div class="feature-box feature-box-left-icon d-inline-flex align-middle">
                                    <div class="feature-box-icon me-10px">  
                                        <i class="feather icon-feather-archive top-8px position-relative align-middle text-dark-gray"></i>
                                    </div>
                                    <div class="feature-box-content">
                                        <span><span class="alt-font text-dark-gray fw-500">Free shipping & returns:</span> On all orders over $50</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-very-light-gray ps-30px pe-30px pt-25px pb-25px mb-20px xs-p-25px border-radius-4px">
                            <span class="alt-font fs-17 fw-500 text-dark-gray mb-15px d-block lh-initial">Guarantee safe and secure checkout</span>
                            <div>
                                <a href="#"><img src="images/visa.svg" class="h-30px me-5px mb-5px" alt=""></a>
                                <a href="#"><img src="images/mastercard.svg" class="h-30px me-5px mb-5px" alt=""></a>
                                <a href="#"><img src="images/american-express.svg" class="h-30px me-5px mb-5px" alt=""></a>
                                <a href="#"><img src="images/discover.svg" class="h-30px me-5px mb-5px" alt=""></a>
                                <a href="#"><img src="images/diners-club.svg" class="h-30px me-5px mb-5px" alt=""></a>
                                <a href="#"><img src="images/union-pay.svg" class="h-30px" alt=""></a>  
                            </div>
                        </div>
                        <div>
                            <div class="w-100 d-block"><span class="text-dark-gray alt-font fw-500">Category:</span> <a href="#">Tanishq,</a> <a href="#">Bangle</a></div>
                            <div><span class="text-dark-gray alt-font fw-500">Tags: </span><a href="#">Bangle,</a> <a href="#">Gold,</a> <a href="#">Diamond</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
   
</div>
