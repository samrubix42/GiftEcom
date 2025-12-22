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
                    <div class="mb-15px">
                        <button type="button" class="btn btn-outline-secondary btn-black btn-sm" wire:click="$dispatch('openEnquire', {id:{{ $product->id }} })">Enquire</button>
                    </div>
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
    <section id="tab" class="pb-0 pt-4 sm-pt-40px">
        <div class="container">
            <div class="row">
                <div class="col-12 tab-style-04">
                    <ul class="nav nav-tabs border-0 justify-content-center alt-font fs-20">
                        <li class="nav-item"><a data-bs-toggle="tab" href="#tab_five1"
                                class="nav-link active">Description<span class="tab-border bg-dark-gray"></span></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab_five2">Additional
                                information<span class="tab-border bg-dark-gray"></span></a></li>

                    </ul>
                    <div class="mb-5 h-1px w-100 bg-extra-medium-gray sm-mt-10px xs-mb-8"></div>
                    <div class="tab-content">
                        <!-- start tab content -->
                        <div class="tab-pane fade in active show" id="tab_five1">
                            <div class="row">
                                <div class="col-12">
                                    <div class="rich-text tinymce-content">
                                        {!! $product->long_description ?? $product->description ?? '<p>No description available.</p>' !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end tab content -->
                        <!-- start tab content -->
                        <div class="tab-pane fade in" id="tab_five2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="rich-text tinymce-content">
                                        {!! $product->additional_information ?? '<p>No additional information available.</p>' !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end tab content -->
                        <!-- start tab content -->
                        <div class="tab-pane fade in" id="tab_five3">
                            <div class="row">
                                <div class="col-md-6 last-paragraph-no-margin sm-mb-30px">
                                    <div class="fs-20 alt-font text-dark-gray mb-20px fw-500">Shipping information</div>
                                    <p class="mb-0"><span class="fw-500 text-dark-gray">Standard:</span> Arrives in 5-8
                                        business days</p>
                                    <p><span class="fw-500 text-dark-gray">Express:</span> Arrives in 2-3 business days
                                    </p>
                                    <p class="w-80 md-w-100">These shipping rates are not applicable for orders shipped
                                        outside of the US. Some oversized items may require an additional shipping
                                        charge. Free Shipping applies only to merchandise taxes and gift cards do not
                                        count toward the free shipping total.</p>
                                </div>
                                <div class="col-md-6 last-paragraph-no-margin">
                                    <div class="fs-20 alt-font text-dark-gray mb-20px fw-500">Return information</div>
                                    <p class="w-80 md-w-100">Orders placed between 10/1/2023 and 12/23/2023 can be
                                        returned by 2/27/2023.</p>
                                    <p class="w-80 md-w-100">Return or exchange any unused or defective merchandise by
                                        mail or at one of our US or Canada store locations. Returns made within 30 days
                                        of the order delivery date will be issued a full refund to the original form of
                                        payment.</p>
                                </div>
                            </div>
                        </div>
                        <!-- end tab content -->
                        <!-- start tab content -->
                        <div class="tab-pane fade in" id="tab_five4">
                            <div class="row align-items-center mb-6 sm-mb-10">
                                <div class="col-lg-4 col-md-12 col-sm-7 md-mb-30px text-center text-lg-start">
                                    <h5 class="alt-font text-dark-gray fw-500 mb-0 w-85 lg-w-100"><span
                                            class="fw-600">25,000+</span> people are like our product and say good
                                        story.</h5>
                                </div>
                                <div
                                    class="col-lg-2 col-md-4 col-sm-5 text-center sm-mb-20px p-0 md-ps-15px md-pe-15px">
                                    <div class="border-radius-4px bg-very-light-gray p-30px xl-p-20px">
                                        <h1 class="mb-5px alt-font text-dark-gray fw-600">4.9</h1>
                                        <span class="text-golden-yellow icon-small d-block ls-minus-2px mb-5px">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                        </span>
                                        <span
                                            class="ps-15px pe-15px pt-10px pb-10px lh-normal bg-dark-gray text-white fs-12 fw-600 text-uppercase border-radius-4px d-inline-block text-center">2,488
                                            Reviews</span>
                                    </div>
                                </div>
                                <div class="col-9 col-lg-4 col-md-5 col-sm-8 progress-bar-style-02">
                                    <div class="ps-20px md-ps-0">
                                        <div class="text-dark-gray mb-15px fw-500">Average customer ratings</div>
                                        <!-- start progress bar item -->
                                        <div class="progress mb-20px border-radius-6px">
                                            <div class="progress-bar bg-green m-0" role="progressbar" aria-valuenow="95"
                                                aria-valuemin="0" aria-valuemax="100" aria-label="rating"></div>
                                        </div>
                                        <!-- end progress bar item -->
                                        <!-- start progress bar item -->
                                        <div class="progress mb-20px border-radius-6px">
                                            <div class="progress-bar bg-green m-0" role="progressbar" aria-valuenow="66"
                                                aria-valuemin="0" aria-valuemax="100" aria-label="rating"></div>
                                        </div>
                                        <!-- end progress bar item -->
                                        <!-- start progress bar item -->
                                        <div class="progress mb-20px border-radius-6px">
                                            <div class="progress-bar bg-green m-0" role="progressbar" aria-valuenow="40"
                                                aria-valuemin="0" aria-valuemax="100" aria-label="rating"></div>
                                        </div>
                                        <!-- end progress bar item -->
                                        <!-- start progress bar item -->
                                        <div class="progress mb-20px border-radius-6px">
                                            <div class="progress-bar bg-green m-0" role="progressbar" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="100" aria-label="rating"></div>
                                        </div>
                                        <!-- end progress bar item -->
                                        <!-- start progress bar item -->
                                        <div class="progress sm-mb-0 border-radius-6px">
                                            <div class="progress-bar bg-green m-0" role="progressbar" aria-valuenow="05"
                                                aria-valuemin="0" aria-valuemax="100" aria-label="rating"></div>
                                        </div>
                                        <!-- end progress bar item -->
                                    </div>
                                </div>
                                <div class="col-3 col-lg-2 col-md-3 col-sm-4 mt-45px">
                                    <div class="mb-15px lh-0 xs-lh-normal xs-mb-5px">
                                        <span class="text-golden-yellow fs-15 ls-minus-2px d-none d-sm-inline-block">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                        </span>
                                        <span class="fs-13 text-dark-gray fw-600 ms-10px xs-ms-0">80%</span>
                                    </div>
                                    <div class="mb-15px lh-0 xs-lh-normal xs-mb-5px">
                                        <span class="text-golden-yellow fs-15 ls-minus-2px d-none d-sm-inline-block">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="feather icon-feather-star"></i>
                                        </span>
                                        <span class="fs-13 text-dark-gray fw-600 ms-10px xs-ms-0">10%</span>
                                    </div>
                                    <div class="mb-15px lh-0 xs-lh-normal xs-mb-5px">
                                        <span class="text-golden-yellow fs-15 ls-minus-2px d-none d-sm-inline-block">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="feather icon-feather-star"></i>
                                            <i class="feather icon-feather-star"></i>
                                        </span>
                                        <span class="fs-13 text-dark-gray fw-600 ms-10px xs-ms-0">05%</span>
                                    </div>
                                    <div class="mb-15px lh-0 xs-lh-normal xs-mb-5px">
                                        <span class="text-golden-yellow fs-15 ls-minus-2px d-none d-sm-inline-block">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="feather icon-feather-star"></i>
                                            <i class="feather icon-feather-star"></i>
                                            <i class="feather icon-feather-star"></i>
                                        </span>
                                        <span class="fs-13 text-dark-gray fw-600 ms-10px xs-ms-0">03%</span>
                                    </div>
                                    <div class="lh-0 xs-lh-normal">
                                        <span class="text-golden-yellow fs-15 ls-minus-2px d-none d-sm-inline-block">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="feather icon-feather-star"></i>
                                            <i class="feather icon-feather-star"></i>
                                            <i class="feather icon-feather-star"></i>
                                            <i class="feather icon-feather-star"></i>
                                        </span>
                                        <span class="fs-13 text-dark-gray fw-600 ms-10px xs-ms-0">02%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0 mb-4 md-mb-35px">
                                <div
                                    class="col-12 border-bottom border-color-extra-medium-gray pb-40px mb-40px xs-pb-30px xs-mb-30px">
                                    <div class="d-block d-md-flex w-100 align-items-center">
                                        <div class="w-300px md-w-250px sm-w-100 sm-mb-10px text-center">
                                            <img src="https://placehold.co/200x200"
                                                class="rounded-circle w-90px mb-10px" alt="">
                                            <span class="text-dark-gray fw-500 d-block">Herman miller</span>
                                            <div class="fs-14 lh-18">06 April 2023</div>
                                        </div>
                                        <div
                                            class="w-100 last-paragraph-no-margin sm-ps-0 position-relative text-center text-md-start">
                                            <span
                                                class="text-golden-yellow ls-minus-2px mb-5px sm-me-10px sm-mb-0 d-inline-block d-md-block">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </span>
                                            <a href="#"
                                                class="w-65px bg-light-red border-radius-15px fs-13 text-dark-gray fw-500 text-center position-absolute sm-position-relative d-inline-block d-md-block right-0px top-0px"><i
                                                    class="fa-solid fa-heart text-red me-5px"></i><span>08</span></a>
                                            <p class="w-85 sm-w-100 sm-mt-15px">Lorem ipsum dolor sit sed do eiusmod
                                                tempor incididunt labore enim ad minim veniam, quis nostrud exercitation
                                                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                                dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                                nulla pariatur.</p>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-12 border-bottom border-color-extra-medium-gray pb-40px mb-40px xs-pb-30px xs-mb-30px">
                                    <div class="d-block d-md-flex w-100 align-items-center">
                                        <div class="w-300px md-w-250px sm-w-100 sm-mb-10px text-center">
                                            <img src="https://placehold.co/200x200"
                                                class="rounded-circle w-90px mb-10px" alt="">
                                            <span class="text-dark-gray fw-500 d-block">Wilbur haddock</span>
                                            <div class="fs-14 lh-18">26 April 2023</div>
                                        </div>
                                        <div
                                            class="w-100 last-paragraph-no-margin sm-ps-0 position-relative text-center text-md-start">
                                            <span
                                                class="text-golden-yellow ls-minus-2px mb-5px sm-me-10px sm-mb-0 d-inline-block d-md-block">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </span>
                                            <a href="#"
                                                class="w-65px bg-light-red border-radius-15px fs-13 text-dark-gray fw-500 text-center position-absolute sm-position-relative d-inline-block d-md-block right-0px top-0px"><i
                                                    class="fa-solid fa-heart text-red me-5px"></i><span>06</span></a>
                                            <p class="w-85 sm-w-100 sm-mt-15px">Lorem ipsum dolor sit sed do eiusmod
                                                tempor incididunt labore enim ad minim veniamnisi ut aliquip ex ea
                                                commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                                                occaecat cupidatat non proident.</p>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-12 border-bottom border-color-extra-medium-gray pb-40px mb-40px xs-pb-30px xs-mb-30px">
                                    <div class="d-block d-md-flex w-100 align-items-center">
                                        <div class="w-300px md-w-250px sm-w-100 sm-mb-10px text-center">
                                            <img src="https://placehold.co/200x200"
                                                class="rounded-circle w-90px mb-10px" alt="">
                                            <span class="text-dark-gray fw-500 d-block">Colene landin</span>
                                            <div class="fs-14 lh-18">28 April 2023</div>
                                        </div>
                                        <div
                                            class="w-100 last-paragraph-no-margin sm-ps-0 position-relative text-center text-md-start">
                                            <span
                                                class="text-golden-yellow ls-minus-2px mb-5px sm-me-10px sm-mb-0 d-inline-block d-md-block">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </span>
                                            <a href="#"
                                                class="w-65px bg-light-red border-radius-15px fs-13 text-dark-gray fw-500 text-center position-absolute sm-position-relative d-inline-block d-md-block right-0px top-0px"><i
                                                    class="fa-regular fa-heart text-red me-5px"></i><span>00</span></a>
                                            <p class="w-85 sm-w-100 sm-mt-15px">Lorem ipsum dolor sit sed do eiusmod
                                                tempor incididunt labore enim adquis nostrud exercitation ullamco
                                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                                pariatur. Excepteur sint occaecat cupidatat non proident.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 last-paragraph-no-margin text-center">
                                    <a href="#"
                                        class="btn btn-link btn-hover-animation-switch btn-extra-large text-dark-gray">
                                        <span>
                                            <span class="btn-text">Show more reviews</span>
                                            <span class="btn-icon"><i class="fa-solid fa-chevron-down"></i></span>
                                            <span class="btn-icon"><i class="fa-solid fa-chevron-down"></i></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="p-7 lg-p-5 sm-p-7 bg-very-light-gray">
                                        <div class="row justify-content-center mb-30px sm-mb-10px">
                                            <div class="col-md-9 text-center">
                                                <h4 class="alt-font text-dark-gray fw-600 mb-20px">Add a review</h4>
                                            </div>
                                        </div>
                                        <form action="email-templates/contact-form.php" method="post"
                                            class="row contact-form-style-02">
                                            <div class="col-lg-5 col-md-6 mb-20px">
                                                <label class="form-label mb-15px">Your name*</label>
                                                <input class="input-name border-radius-4px form-control required"
                                                    type="text" name="name" placeholder="Enter your name">
                                            </div>
                                            <div class="col-lg-5 col-md-6 mb-20px">
                                                <label class="form-label mb-15px">Your email address*</label>
                                                <input class="border-radius-4px form-control required" type="email"
                                                    name="email" placeholder="Enter your email address">
                                            </div>
                                            <div class="col-lg-2 mb-20px">
                                                <label class="form-label">Your rating*</label>
                                                <div>
                                                    <span class="ls-minus-1px icon-small d-block mt-20px md-mt-0">
                                                        <i class="feather icon-feather-star text-golden-yellow"></i>
                                                        <i class="feather icon-feather-star text-golden-yellow"></i>
                                                        <i class="feather icon-feather-star text-golden-yellow"></i>
                                                        <i class="feather icon-feather-star text-golden-yellow"></i>
                                                        <i class="feather icon-feather-star text-golden-yellow"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-20px">
                                                <label class="form-label mb-15px">Your review</label>
                                                <textarea class="border-radius-4px form-control" cols="40" rows="4"
                                                    name="comment" placeholder="Your message"></textarea>
                                            </div>
                                            <div class="col-lg-9 md-mb-25px">
                                                <div
                                                    class="position-relative terms-condition-box text-start is-invalid mt-10px">
                                                    <label class="d-inline-block">
                                                        <input type="checkbox" name="terms_condition"
                                                            id="terms_condition" value="1"
                                                            class="terms-condition check-box align-middle required">
                                                        <span class="box fs-15">I accept the crafto terms and conditions
                                                            and I have read the privacy policy.</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 text-start text-lg-end">
                                                <input type="hidden" name="redirect" value="">
                                                <button
                                                    class="btn btn-dark-gray btn-small btn-box-shadow btn-round-edge submit"
                                                    type="submit" aria-label="submit">Submit review</button>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-results mt-20px d-none"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end tab content -->
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
                    <p>Celebrate life’s special moments with a meaningful gift that speaks from the heart. Ideal for surprising loved ones and creating memories that last long after the occasion.</p>
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
    <!-- Enquiry modal Livewire component -->
    <livewire:public.shop.enquire />

</div>