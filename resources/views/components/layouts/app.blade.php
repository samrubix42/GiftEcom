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
    <link rel="stylesheet" href="{{ asset('asset/travel-agency/travel-agency.css') }}" />
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

    <script type="text/javascript" src="{{ asset('asset/js/main.js') }}"></script>
    @livewireScripts
</body>

</html>