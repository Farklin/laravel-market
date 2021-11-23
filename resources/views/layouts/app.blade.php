<!DOCTYPE html>
<html prefix="og: https://ogp.me/ns#" lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('description')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="yandex-verification" content="67dd06b83d5149d7" />
    <link rel="icon" href="/theme/img/core-img/favicon.ico">
    <link rel="stylesheet" href="{{ asset('static/font_awesome/css/all.css') }}">
    <link href="{{ asset('static/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('static/bootstrap/css/mdb.css') }}" rel="stylesheet">
    <link href="{{ asset('static/bootstrap/css/style.css') }}" rel="stylesheet">
    <link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>
    <link href="{{ asset('theme/css/core-style.css') }}" rel="stylesheet">
    <link rel="canonical" href="{{url()->current()}}"/>
    <script src="//code-ya.jivosite.com/widget/R80LXmTcNu" async></script>
    <title>@yield('title')</title>
    @yield('opengraph')
</head>
<body>
    <script src="{{ asset('theme/js/jquery/jquery-2.2.4.min.js') }}"></script>
    @include('layouts/header')
    @include('catalog/basket/modal')
    @yield('content')
    @include('layouts/footer')
    <script src="{{ asset('theme/js/popper.min.js') }}"></script>
    <script src="{{ asset('theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/js/plugins.js') }}"></script>
    <script src="{{ asset('theme/js/classy-nav.min.js') }}"></script>
    <script src="{{ asset('theme/js/active.js') }}"></script>
</body>
</html>