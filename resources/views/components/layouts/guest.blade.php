<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ config('settings.brand_name', 'Panel') }}
        | {{ $title ?? (trim($__env->yieldContent('title')) ?: 'Auth') }}
    </title>

    <!-- ===============================
        TABLER CSS
    =============================== -->
    <link href="{{ asset('tabler/theme/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/theme/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/theme/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/theme/css/tabler-vendors.min.css') }}" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />

    <!-- Custom Styles (optional) -->
    <link rel="stylesheet" href="{{ asset('tabler/theme/style.css') }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('tabler/theme/img/') }}" type="image/x-icon">

    @livewireStyles
    @stack('styles')
</head>

<body class="layout-fluid">

    <!-- ===============================
        GUEST CONTENT
    =============================== -->
    <div class="page page-center">
        <div class="container container-tight py-4">
            {{ $slot }}
        </div>
    </div>

    <!-- ===============================
        TABLER JS
    =============================== -->
    <script src="{{ asset('tabler/theme/js/tabler.min.js') }}"></script>

    @livewireScripts
    @stack('scripts')

</body>

</html>
