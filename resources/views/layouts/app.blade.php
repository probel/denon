<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($meta['title']) ? strip_tags($meta['title']) : 'Denon' }}</title>
    <meta property="og:title" content="{{ isset($meta['title']) ? strip_tags($meta['title']) : 'Denon' }}" />
    <meta property="og:type" content="website" />
    @if (isset($meta['url']))
        <meta property="og:url" content="{{ $meta['url'] }}" />
    @endif
    @if (isset($meta['image']))
         <meta property="og:image" content="{{ $meta['image'] }}" />
    @endif
    @if(isset($meta['description']) && $meta['description'])
        <meta property="og:description" content="{{ $meta['description'] }}" />
        <meta content="{{ $meta['description'] }}" name="description"/>
    @endif
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    @if(isset($meta['keywords']) && $meta['keywords'])
        <meta content="{{ $meta['keywords'] }}" name="keywords"/>
    @endif
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body class="body loading @if (!\Request::is('/'))no-front @else front @endif @isset($view){{ $view }} @endisset">
    <div class="root">
        {{-- меню заголовок --}}
        @include('shared.header')
        @yield('content')

        @include('shared.footer')
    </div>

    @include('shared.popups')

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap&subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" crossorigin="anonymous">

    @yield('sctipts')
    <script src="{{ mix('js/app.js') }}" ></script>
</body>
</html>
