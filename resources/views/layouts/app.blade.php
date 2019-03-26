<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/styles.css">
        @yield('styles')
        
        <title>{{ ( isset($seo_title) ? $seo_title : "" ) . " | e-Gov Lostisland" }}</title>
    </head>
    <body class="@yield('body_class')">

        @auth("government")
            @include('layouts.navigation.government')
        @endauth
        @auth("citizen")
            @include('layouts.navigation.citizen')
        @endauth

        @yield('content')

        @auth("government")
            @include('layouts.footer')
        @endauth
        @auth("citizen")
            @include('layouts.footer')
        @endauth

        <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/scripts.js"></script>
        @yield('scripts')
    </body>
</html>