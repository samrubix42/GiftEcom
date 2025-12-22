<div>
    <section class="position-relative z-index-1 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 md-mb-50px" data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 300, "delay": 0, "staggervalue": 100, "easing": "easeOutQuad" }'>
                    <img src="{{ asset('image/demo-jewellery-store-contact-01.jpg') }}" class="mb-13 md-mb-25px w-100" alt="">
                    <div class="row row-cols-1 row-cols-sm-3 justify-content-center text-center" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 300, "delay": 0, "staggervalue": 100, "easing": "easeOutQuad" }'>
                        <div class="col last-paragraph-no-margin xs-mb-40px">
                            <h3 class="alt-font fw-600 ls-minus-1px text-dark-gray mb-0">540</h3>
                            <p>Happy customer</p>
                        </div>
                        <div class="col last-paragraph-no-margin xs-mb-40px">
                            <h3 class="alt-font fw-600 ls-minus-1px text-dark-gray mb-0">98%</h3>
                            <p>Positive feedback</p>
                        </div>
                        <div class="col last-paragraph-no-margin">
                            <h3 class="alt-font fw-600 ls-minus-1px text-dark-gray mb-0">150</h3>
                            <p>Award winning</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 offset-xl-1 col-lg-7">
                    <h4 class="fw-500 alt-font ls-minus-1px text-dark-gray ls-minus-1px text-center text-lg-start">We'd love to hear from you.</h4>
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-md-2 justify-content-center mb-12 lg-mb-30px mx-0" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 300, "delay": 0, "staggervalue": 100, "easing": "easeOutQuad" }'>
                        <!-- start features box item -->
                        <div class="col icon-with-text-style-01 border-bottom border-end border-color-extra-medium-gray pt-6 pb-6 sm-border-end-0">
                            <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                                <div class="feature-box-icon me-20px">
                                    <i class="bi bi-telephone-outbound icon-medium text-dark-gray"></i>
                                </div>
                                <div class="feature-box-content">
                                    <span class="d-block">Get in touch with us?</span>
                                    <span class="fs-20 fw-500 alt-font text-dark-gray d-block"><a href="tel:+1 352 308 8999">+1 352 308 8999</a></span>
                                </div>
                            </div>
                        </div>
                        <!-- end features box item -->
                        <!-- start features box item -->
                        <div class="col icon-with-text-style-01 border-bottom border-color-extra-medium-gray pt-6 pb-6 ps-5">
                            <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                                <div class="feature-box-icon me-20px">
                                    <i class="bi bi-envelope-open icon-medium text-dark-gray"></i>
                                </div>
                                <div class="feature-box-content">
                                    <span class="d-block">How can help you?</span>
                                    <a href="mailto:hello@grayfoxgifts.com" class="fs-20 fw-500 alt-font text-dark-gray">hello@grayfoxgifts.com</a>
                                </div>
                            </div>
                        </div>
                        <!-- end features box item -->
                        <!-- start features box item -->
                        <div class="col icon-with-text-style-01 border-end border-color-extra-medium-gray pt-6 pb-6 sm-border-end-0 sm-border-bottom">
                            <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                                <div class="feature-box-icon me-20px">
                                    <i class="bi bi-geo-alt icon-medium text-dark-gray"></i>
                                </div>
                                <div class="feature-box-content">
                                    <span class="d-block">Are you ready for visit?</span>
                                    <span class="fs-20 fw-500 alt-font text-dark-gray d-block">16888 US Highway 441, Mt Dora, FL 32757, USA</span>
                                </div>
                            </div>
                        </div>
                        <!-- end features box item -->
                        <!-- start features box item -->
                        <div class="col icon-with-text-style-01 pt-6 pb-6 ps-5">
                            <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                                <div class="feature-box-icon me-20px">
                                    <i class="bi bi-chat-text icon-medium text-dark-gray"></i>
                                </div>
                                <div class="feature-box-content">
                                    <span class="d-block">Need live chat?</span>
                                    <a href="mailto:hello@grayfoxgifts.com" class="fs-20 fw-500 alt-font text-dark-gray">hello@grayfoxgifts.com</a>
                                </div>
                            </div>
                        </div>
                        <!-- end features box item -->
                    </div>
                    <div class="contact-form-style-03 bg-chablis-red p-13 position-relative overflow-hidden"
                        wire:ignore.self
                        data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 500, "delay": 200 }'>

                        <i class="bi bi-chat-text fs-140 text-cinderella-red position-absolute top-minus-30px right-minus-40px"></i>

                        <h2 class="fw-600 alt-font text-dark-gray ls-minus-1px fancy-text-style-4 mb-20px">
                            Say <span data-fancy-text='{ "effect": "rotate", "string": ["hello!", "hallå!", "salve!"] }'></span>
                        </h2>

                        <!-- Livewire Form -->
                        <form wire:submit.prevent="submit">

                            <!-- Name -->
                            <div class="position-relative form-group mb-20px">
                                <span class="form-icon text-dark-gray"><i class="bi bi-emoji-smile"></i></span>
                                <input type="text"
                                    wire:model.defer="name"
                                    class="ps-0 bg-transparent border-0 border-bottom fs-17 form-control"
                                    placeholder="Your name*" />
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <!-- Email -->
                            <div class="position-relative form-group mb-20px">
                                <span class="form-icon text-dark-gray"><i class="bi bi-envelope"></i></span>
                                <input type="email"
                                    wire:model.defer="email"
                                    class="ps-0 bg-transparent border-0 border-bottom fs-17 form-control"
                                    placeholder="Your email address*" />
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <!-- Phone -->
                            <div class="position-relative form-group mb-20px">
                                <span class="form-icon text-dark-gray"><i class="bi bi-telephone"></i></span>
                                <input type="tel"
                                    wire:model.defer="phone"
                                    class="ps-0 bg-transparent border-0 border-bottom fs-17 form-control"
                                    placeholder="Your phone" />
                            </div>

                            <!-- Message -->
                            <div class="position-relative form-group form-textarea mt-15px mb-0">
                                <textarea wire:model.defer="comment"
                                    class="ps-0 bg-transparent border-0 border-bottom fs-17 form-control"
                                    rows="3"
                                    placeholder="Your message"></textarea>
                                <span class="form-icon text-dark-gray"><i class="bi bi-chat-square-dots"></i></span>

                                @error('comment') <small class="text-danger">{{ $message }}</small> @enderror

                                <button class="btn btn-dark-gray btn-medium btn-round-edge btn-box-shadow mt-25px"
                                    type="submit"
                                    wire:loading.attr="disabled">
                                    <span wire:loading.remove>Send message</span>
                                    <span wire:loading>Sending...</span>
                                </button>
                            </div>

                            <!-- Success Message -->
                            @if (session()->has('success'))
                            <div class="alert alert-success mt-20px">
                                {{ session('success') }}
                            </div>
                            @endif
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="p-0">
        <div class="container-fluid p-0">
            <div class="row justify-content-center g-0">
                <div class="col-12">
                    <div id="map" class="map" data-map-options='{ "lat": -37.805688, "lng": 144.962312, "style": "night", "marker": { "type": "HTML", "class": "marker04", "color": "#f4decf" }, "popup": { "defaultOpen": false, "html": "<div class=infowindow><strong class=\"mb-3 d-inline-block alt-font\">Crafto Jewellery Store</strong><p class=\"alt-font\">16122 Collins street, Melbourne, Australia</p></div><div class=\"google-maps-link alt-font\"> <a aria-label=\"View larger map\" target=\"_blank\" jstcache=\"31\" href=\"https://maps.google.com/maps?ll=-37.805688,144.962312&amp;z=17&amp;t=m&amp;hl=en-US&amp;gl=IN&amp;mapclient=embed&amp;cid=13153204942596594449\" jsaction=\"mouseup:placeCard.largerMap\">VIEW LARGER MAP</a></div>" } }'></div>
                </div>
            </div>
        </div>
    </section>

</div>