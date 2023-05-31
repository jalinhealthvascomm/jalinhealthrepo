<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? "Jalin Health" }}</title>
    <meta name="keywords" content="{{ $seoKeyword ?? '' }}" />
    <meta name="description" content="{{ $seoDescription ?? '' }}" />
    {{-- <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png"> --}}
    <link rel="icon" type="image/png" href="/images/logo.png">

    @stack('header')
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <!-- Font Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Roboto -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400;1,500&display=swap"
        rel="stylesheet">

    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/share.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/js/axios.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

    </style>
    <script>
        if ("scrollRestoration" in history) {
            history.scrollRestoration = "manual";
        }

        window.scrollTo(0, 0);

    </script>
</head>

<body class="antialiased ">

    @include('components.header')

    <main>
        @yield('content')
    </main>
    @include('components.footer')
    @stack('footer-js')
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/globalfunc.js') }}"></script>

</body>

</html>
