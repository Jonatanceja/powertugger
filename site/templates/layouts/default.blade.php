<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
    <link rel="manifest" href="/images/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>{{ $site->title() }} | {{ $page->title() }}</title>
    @if ($image = $site->opengraph()->toFile())
    <meta property="og:image" content="{{ $image->url() }}" />   
    @endif
    <meta name="description" content="{{ $site->description() }}">
    <title>{{ $site->title() }} | {{ $page->title() }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="/build/assets/app.1a4d19a8.css" rel="stylesheet">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="/resources/css/animate.css">
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js"
      defer
    ></script>
    <script src="/resources/js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
    <!-- Google -->
    {!! $site->analytics() !!} 
    <!-- Facebook -->
    {!! $site->pixel() !!}
    @stack('styles')
</head>

<body>
    @include('partials.header')
    @yield('content')
    @stack('scripts')
    @include('partials.footer')
</body>

</html>
