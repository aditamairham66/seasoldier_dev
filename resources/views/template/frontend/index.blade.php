<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Seasoldier : @yield('title_page')</title>
    <meta content="@yield('description')" name="description">
    <meta content="@yield('keywords')" name="keywords">

    @include('template.frontend.plugin.css')

    @stack('head')

</head>

<body class="@yield('background')">

@include('template.frontend.header')

@yield('content')

@include('template.frontend.footer')

@include('template.frontend.loader')

@include('template.frontend.plugin.js')

@stack('bottom')

</body>

</html>
