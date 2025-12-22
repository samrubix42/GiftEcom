<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="ThemeZaa">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    @yield('meta_tags')
    <link rel="shortcut icon" href="{{ asset('asset/images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('asset/images/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('asset/images/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('asset/images/apple-touch-icon-114x114.png') }}">
    <!-- google fonts preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- slider revolution CSS files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/revolution/css/settings.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/revolution/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/revolution/css/navigation.css') }}">
    <!-- style sheets and font icons  -->
    <link rel="stylesheet" href="{{ asset('asset/css/vendors.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/icon.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/jewellery-store/jewellery-store.css') }}" />
    @livewireStyles
</head>

<body data-mobile-nav-style="classic">

    <livewire:public.includes.header />

    {{-- Main content slot --}}
    {{ $slot }}

    {{-- Footer include (provided by user) --}}
    <livewire:public.includes.footer />
    <div class="scroll-progress d-none d-xxl-block">
        <a href="#" class="scroll-top" aria-label="scroll">
            <span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point"></span></span>
        </a>
    </div>
    <script type="text/javascript" src="{{ asset('asset/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/vendors.min.js') }}"></script>

    <!-- slider revolution core javaScript files -->
    <script type="text/javascript" src="{{ asset('asset/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>

    <!-- slider revolution extension scripts. ONLY NEEDED FOR LOCAL TESTING -->
    <script type="text/javascript" src="{{ asset('asset/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
    <!-- Slider Revolution add on files -->
    <script type='text/javascript' src='{{ asset('asset/revolution/revolution-addons/particles/js/revolution.addon.particles.min.js') }}?ver=1.0.3'></script>
    <!-- Slider's main "init" script -->
    <script type="text/javascript">
        var revapi263,
                tpj;
        (function () {
            if (!/loaded|interactive|complete/.test(document.readyState))
                document.addEventListener("DOMContentLoaded", onLoad);
            else
                onLoad();
            function onLoad() {
                if (tpj === undefined) {
                    tpj = jQuery;
                    if ("off" == "on")
                        tpj.noConflict();
                }
                if (tpj("#jewellery-store-slider").revolution == undefined) {
                    revslider_showDoubleJqueryError("#jewellery-store-slider");
                } else {
                    revapi263 = tpj("#jewellery-store-slider").show().revolution({
                        sliderType: "standard",
                        /* sets the Slider's default timeline */
                        delay: 9000,
                        /* options are 'auto', 'fullwidth' or 'fullscreen' */
                        sliderLayout: 'fullscreen',
                        /* RESPECT ASPECT RATIO */
                        autoHeight: 'off',
                        /* options that disable autoplay */
                        stopLoop: 'off',
                        stopAfterLoops: -1,
                        stopAtSlide: -1,
                        navigation: {
                            keyboardNavigation: "on",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            mouseScrollReverse: "default",
                            onHoverStop: "off",
                            touch: {
                                touchenabled: "on",
                                touchOnDesktop: "on",
                                swipe_threshold: 75,
                                swipe_min_touches: 1,
                                swipe_direction: "horizontal",
                                drag_block_vertical: true
                            },
                            arrows: {
                                enable: true,
                                style: 'uranus',
                                tmp: '',
                                rtl: false,
                                hide_onleave: false,
                                hide_onmobile: true,
                                hide_under: 767,
                                hide_over: 9999,
                                hide_delay: 200,
                                hide_delay_mobile: 1200,
                                left: {
                                    h_align: "right",
                                    v_align: "top",
                                    h_offset: 0,
                                    v_offset: 0,
                                },
                                right: {
                                    h_align: "right",
                                    v_align: "bottom",
                                    h_offset: 0,
                                    v_offset: 0,
                                }
                            }
                        },
                        /* [DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
                        responsiveLevels: [1240, 1024, 768, 480],
                        /* [DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
                        gridwidth: [1220, 1024, 768, 480],
                        /* [DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
                        gridheight: [970, 970, 960, 720],
                        /* [DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
                        visibilityLevels: [1240, 1024, 1024, 480],
                        /* Lazy Load options are "all", "smart", "single" and "none" */
                        lazyType: "smart",
                        spinner: "spinner0",
                        shadow: 0,
                        shuffle: "off",
                        fullScreenAutoWidth: "off",
                        fullScreenAlignForce: "off",
                        fullScreenOffsetContainer: "nav, .header-top-bar",
                        fullScreenOffset: "-1",
                        disableProgressBar: "on",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                }
                ; /* END OF revapi call */
            }
            ;
        }()); /* END OF WRAPPING FUNCTION */
    </script>

    <script type="text/javascript" src="{{ asset('asset/js/main.js') }}"></script>
    @livewireScripts
</body>

</html>