<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title') </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('static/font_awesome/css/all.css') }}">
    <link href="{{ asset('static/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('static/bootstrap/css/mdb.css') }}" rel="stylesheet">
    <link href="{{ asset('static/bootstrap/css/style.css') }}" rel="stylesheet">
    
    <link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>


</head>

<body>
    <nav class="navbar ">
    <a class="navbar-brand" href="#">Административная часть</a>
        <div class="header-meta d-flex clearfix justify-content-end">
            <div class="favourite-area">
                <a href="{{route('home')}}"><i class="fa fa-eye"></i> Сайт</a>
            </div>
        </div>
    </nav>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="md-v-line"></div><i class="fas fa-laptop mr-4 pr-3"></i><a href="{{route('admin.category.all')}}">Категории</a> 
                    </li>
                    <li class="list-group-item">
                        <div class="md-v-line"></div><i class="fas fa-bomb mr-5"></i><a href="{{route('admin.product.all')}}">Товары </a> 
                    </li>
                    <li class="list-group-item">
                        <div class="md-v-line"></div><i class="fas fa-book mr-5"></i><a href="{{route('admin.page.all')}}">Страницы </a> 
                    </li>
                    <li class="list-group-item">
                        <div class="md-v-line"></div><i class="fas fa-shopping-cart mr-5"></i><a href="{{route('admin.order.all')}}">Заказы </a> 
                    </li>
                    <li class="list-group-item">
                        <div class="md-v-line"></div><i class="fas fa-users mr-5"></i><a href="{{route('admin.subscribers.all')}}">Подписчики</a> 
                    </li>
                    <li class="list-group-item">
                        <div class="md-v-line"></div><i class="fa fa-comments mr-5"></i><a href="{{route('admin.comment.all')}}">Отзывы</a> 
                    </li>
                
                
                    <li class="list-group-item">
                        <div class="md-v-line" disabled></div><i class="fas fa-cogs mr-5"></i>Настройки
                    </li>
                </ul>
            </div>
            <div class="col-md-8 p-5">
                @yield('content')
            </div>
        </div>
       
    </div>


    <script src="{{ asset('theme/js/jquery/jquery-2.2.4.min.js') }}" async></script>
    <script src="{{ asset('theme/js/popper.min.js') }}"></script>
    <script src="{{ asset('theme/js/jquery/jquery-ui.js') }}"></script>
    <script src="{{ asset('theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/js/plugins.js') }}"></script>
    <script src="{{ asset('theme/js/classy-nav.min.js') }}"></script>
    <script src="{{ asset('theme/js/active.js') }}"></script>
    <script src="{{ asset('theme/js/global.js') }}"></script>


</body>