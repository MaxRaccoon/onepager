<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />

    @yield('head')
</head>
<body>
    @yield('body')
    <footer>&nbsp;</footer>
    <script src="{{ asset("assets/scripts/frontend.js") }}" type="text/javascript"></script>
</body>
</html>
