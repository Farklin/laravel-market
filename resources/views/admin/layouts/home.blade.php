<!DOCTYPE html>
<html lang="ru" xml:lang="ru" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="ru">

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
            <div class="col-md-3 col-3 position-fixed">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a  href="{{route('admin.category.all')}}"> <i class="fas fa-laptop mr-4 pr-3"></i><span class="d-none d-md-inline-block">Категории</span></a> 
                    </li>
                    <li class="list-group-item">
                       <a  href="{{route('admin.product.all')}}"> <i class="fas fa-bomb mr-5"></i><span class="d-none d-md-inline-block">Товары</span> </a> 
                    </li>
                    <li class="list-group-item">
                       <a  href="{{route('admin.page.all')}}"> <i class="fas fa-book mr-5"></i><span class="d-none d-md-inline-block">Страницы</span> </a> 
                    </li>
                    <li class="list-group-item">
                       <a  href="{{route('admin.order.all')}}"><i class="fas fa-shopping-cart mr-5"></i><span class="d-none d-md-inline-block">Заказы </span></a> 
                    </li>
                    <li class="list-group-item">
                       <a  href="{{route('admin.subscribers.all')}}"><i class="fas fa-users mr-5"></i><span class="d-none d-md-inline-block">Подписчики</span></a> 
                    </li>
                    <li class="list-group-item">
                       <a  href="{{route('admin.comment.all')}}"><i class="fa fa-comments mr-5"></i><span class="d-none d-md-inline-block">Отзывы</span></a> 
                    </li>

                    <li class="list-group-item">
                        <div class="md-v-line" disabled></div><i class="fas fa-cogs mr-5"></i><a ><span class="d-none d-md-inline-block"> Настройки</span> </a>
                    </li>
                </ul>
            </div>
           
            <div class="offset-md-3 offset-3 col-md-8 col-9">
                @yield('content')
            </div>
        </div>
       
    </div>


    <script src="{{ asset('theme/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('theme/js/popper.min.js') }}"></script>
    <script src="{{ asset('theme/js/jquery/jquery-ui.js') }}"></script>
    <script src="{{ asset('theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/js/plugins.js') }}"></script>
    <script src="{{ asset('theme/js/classy-nav.min.js') }}"></script>
    <script src="{{ asset('theme/js/active.js') }}"></script>
    <script src="{{ asset('theme/js/global.js') }}"></script>

    <script>
        // Изменение последовательности картинок в товарах
$('#images-product').sortable({
    revert: 100,
    cursor: "move",
    update: function() {

        sorting = []
        $('#images-product .image-value').each(function(index, item) {
            sorting.push({ 'image_id': item.value, 'image_sort': index })
        });
        console.log(sorting);
        ajaxSortingImage(sorting);

    }
});

function ajaxSortingImage(sorting) {
    $.ajax({
        method: "POST",
        url: "{{ route('admin.image.sorting') }}",
        data: {
            sortimage: sorting,
        },
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            console.log(data);

        },

    });
}


    </script> 
</body>