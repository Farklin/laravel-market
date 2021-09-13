<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title') </title>

    <link rel="stylesheet" href="{{ asset('static/font_awesome/css/all.css') }}">
    <link href="{{ asset('static/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('static/bootstrap/css/mdb.css') }}" rel="stylesheet">
    <link href="{{ asset('static/bootstrap/css/style.css') }}" rel="stylesheet">
    <link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>


</head>

<body>
    <nav class="navbar ">
    <a class="navbar-brand" href="#">Административная часть</a>
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
                        <div class="md-v-line"></div><i class="fas fa-bomb mr-5"></i><a href="{{route('admin.page.all')}}">Страницы </a> 
                    </li>
                    <li class="list-group-item">
                        <div class="md-v-line"></div><i class="fas fa-bomb mr-5"></i><a href="{{route('admin.order.all')}}">Заказы </a> 
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
    
</body>