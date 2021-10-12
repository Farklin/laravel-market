<!DOCTYPE html>
<html lang="ru" xml:lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="ru">

    <title>@yield('title') </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('static/font_awesome/css/all.css') }}">
    <link href="{{ asset('static/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/shards-dashboards.1.1.0.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/extras.1.1.0.min.css') }}" rel="stylesheet">
    <link href="{{ asset('static/bootstrap/css/style.css') }}" rel="stylesheet">
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.snow.css"> </head>
    <link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>
    <script async defer src="https://buttons.github.io/buttons.js"></script>


</head>

<body>
       <div class="container-fluid">
        <div class="row">
            <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
                <div class="main-navbar">
                    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
                        <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                            <div class="d-table m-auto">
                                {{-- <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="images/shards-dashboards-logo.svg" alt="Shards Dashboard"> --}}
                               <span class="d-none d-md-inline ml-1"> TeisBubble </span>
                            </div>
                        </a>
                        <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                            <i class="material-icons">&#xE5C4;</i>
                        </a>
                    </nav>
                </div>
                <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
                    <div class="input-group input-group-seamless ml-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                        <input class="navbar-search form-control" type="text" placeholder="Search for something..."
                            aria-label="Search">
                    </div>
                </form>
                <div class="nav-wrapper">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.home') }}">
                                <i class="fa fa-home"></i>
                                <span>Главная страница</span>
                            </a>

                            <a class="nav-link" href="{{ route('admin.category.all') }}">
                                <i class="fa fa-edit"></i>
                                <span>Категории</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.product.all') }}">
                                <i class="fa fa-th-large"></i>
                                <span>Товары</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.page.all') }}">
                                <i class="fas fa-book"></i>
                                <span>Страницы</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.order.all') }}">
                                <i class="fas fa-shopping-cart "></i>
                                <span>Заказы</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.subscribers.all') }}">
                                <i class="fas fa-users "></i>
                                <span>Подписчики</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.comment.all') }}">
                                <i class="fa fa-comments"></i>
                                <span>Отзывы</span>
                            </a>
                        </li>



                    </ul>
                </div>
            </aside>
        </div>


        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
            <div class="main-navbar sticky-top bg-white">
                <!-- Main Navbar -->
                <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
                    <form action="{{route('admin.product.search')}}" method="post" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                        @csrf
                        <div class="input-group input-group-seamless ml-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i id='btn-search' class="fas fa-search"></i>
                                </div>
                            </div>
                            <input class="navbar-search form-control" type="text" name="query" placeholder="Поиск по товарам"
                                aria-label="Найти">
                        </div>
                        
                    </form>


                    <ul class="navbar-nav border-left flex-row ">
                        <li class="nav-item border-right dropdown notifications">
                            <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="nav-link-icon__wrapper">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="badge badge-pill badge-danger">2</span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">
                                    <div class="notification__icon-wrapper">
                                        <div class="notification__icon">
                                            <i class="material-icons">&#xE6E1;</i>
                                        </div>
                                    </div>
                                    <div class="notification__content">
                                        <span class="notification__category">Analytics</span>
                                        <p>Your website’s active users count increased by
                                            <span class="text-success text-semibold">28%</span> in the last week. Great
                                            job!
                                        </p>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="notification__icon-wrapper">
                                        <div class="notification__icon">
                                            <i class="material-icons">&#xE8D1;</i>
                                        </div>
                                    </div>
                                    <div class="notification__content">
                                        <span class="notification__category">Sales</span>
                                        <p>Last week your store’s sales count decreased by
                                            <span class="text-danger text-semibold">5.52%</span>. It could have been
                                            worse!
                                        </p>
                                    </div>
                                </a>
                                <a class="dropdown-item notification__all text-center" href="#"> View all Notifications
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#"
                                role="button" aria-haspopup="true" aria-expanded="false">
                                <img class="user-avatar rounded-circle mr-2" src="" alt="User Avatar">
                                <span class="d-none d-md-inline-block">Имя пользователя</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-small">
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-user"></i> Профиль</a>
                                <a class="dropdown-item" href="{{ route('home')}}">
                                        <i class="fa fa-eye"></i> Перейти на сайт</a>

                                <a class="dropdown-item" href="{{ route('admin.product.form.create')}}">
                                    <i class="fa fa-plus"></i> Создать товар</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('logout')}}"> 
                                    <i class="fas fa-sign-out text-danger">&#xE879;</i> Выйти </a>
                            </div>
                        </li>
                    </ul>
                    <nav class="nav">
                        <a href="#"
                            class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left"
                            data-toggle="collapse" data-target=".header-navbar" aria-expanded="false"
                            aria-controls="header-navbar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </nav>
                </nav>
            </div>
            <!-- / .main-navbar -->

            <div class="main-content-container container-fluid px-4">
                <!-- Page Header -->
                <div class="page-header row no-gutters py-4">
                    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                        <span class="text-uppercase page-subtitle">Dashboard</span>
                        <h3 class="page-title"> 
                            @if(View::hasSection('h1'))
                                @yield('h1')
                            @else
                                Интернет магазин TeisBubble
                            @endif 
                    </h3>
                    </div>
                </div>
                <!-- End Page Header -->

                <div class="row">

                    @if(View::hasSection('content'))
                        @yield('content')
                    @else


                    <!-- New Draft Component -->
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <!-- Quick Post -->
                        <div class="card card-small h-100">
                            <div class="card-header border-bottom">
                                <h6 class="m-0">Создать новый товар</h6>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <form class="quick-post-form">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                           placeholder="Название товара">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control"
                                            placeholder="Описание товара"></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6 col-md-6 col-sm-12"> 
                                        <input type="number" class="form-control" id="price"
                                           placeholder="Цена товара">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12"> 
                                        <input type="number" class="form-control" id="oldprice"
                                           placeholder="Старая цена товара">
                                        </div>
                                    </div>
                                    <div class="form-group custom-file">
                                        <input type="file" class="form-control custom-file-input" id="file"
                                        placeholder="Старая цена товара">
                                        <label for="file" class="custom-file-label">Изображения товара</label>
                                    </div>

                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-accent">Создать</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Quick Post -->
                    </div>
                    <!-- End New Draft Component -->
                    <!-- Discussions Component -->
                    <div class="col-lg-5 col-md-12 col-sm-12 mb-4">
                        <div class="card card-small blog-comments">
                            <div class="card-header border-bottom">
                                <h6 class="m-0">Новые отзывы</h6>
                            </div>
                            <div class="card-body p-0">
                                @if(!empty($comments))
                                @foreach($comments as $comment)
                                    <div class="blog-comments__item d-flex p-3">
                                        <div class="blog-comments__avatar mr-3">
                                            <img src="{{ $comment->product->images[0]->thumbnail() }}"/>
                                        </div>
                                        <div class="blog-comments__content col-9">
                                            <div class="blog-comments__meta text-muted">
                                                <a class="text-secondary" href="#">{{ $comment->name }} </a> к
                                                <a class="text-secondary" href="{{ route('product.show', $comment->product->seo->slug) }}">{{ $comment->product->title }} </a>
                                                <span class="text-muted">{{ $comment->created_at }}</span>
                                            </div>
                                            <div class="blog-comments__avatar mr-3">
                                                @foreach($comment->images as $image)
                                                <img src="{{ $image->thumbnail}}"/>
                                                @endforeach
                                            </div>

                                            <p class="m-0 my-1 mb-2 text-muted">{{ $comment->description}} </p>
                                            <div class="blog-comments__actions">
                                                <div class="btn-group btn-group-sm row">
                                                    <a type="button" href="{{ route('admin.comment.editstatus', $comment->id)}}" class="btn btn-white">
                                                        <span class="text-success">
                                                            <i class="fa fa-check"> </i>
                                                        </span> Опубликовать </a>
                                                    <a type="button" href="{{ route('admin.comment.delete', $comment->id)}}" class="btn btn-white">
                                                        <span class="text-danger">
                                                            <i class="fa fa-trash"> </i>
                                                        </span> Удалить </a>
                                                    <a type="button" class="btn btn-white text-dark">
                                                        <span class="text-light">
                                                            <i class="fa fa-edit"> </i>
                                                        </span> Изменить </a>
                                                </div>
                                            </div>



                                            
                                        </div>
                                    </div>
                                @endforeach
                                @endif 
                            </div>
                            <div class="card-footer border-top">
                                <div class="row">
                                    <div class="col text-center view-report">
                                        <a type="submit" href="{{route('admin.comment.all')}}" class="btn btn-white">Смотреть все отзывы</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Discussions Component -->
                    <!-- Top Referrals Component -->
                    <div class="col-lg-3 col-md-12 col-sm-12 mb-4">
                        <div class="card card-small">
                            <div class="card-header border-bottom">
                                <h6 class="m-0">Топ</h6>
                            </div>
                            <div class="card-body p-0">
                                <ul class="list-group list-group-small list-group-flush">
                                    <li class="list-group-item d-flex px-3">
                                        <span class="text-semibold text-fiord-blue">GitHub</span>
                                        <span class="ml-auto text-right text-semibold text-reagent-gray">19,291</span>
                                    </li>
                                    <li class="list-group-item d-flex px-3">
                                        <span class="text-semibold text-fiord-blue">Stack Overflow</span>
                                        <span class="ml-auto text-right text-semibold text-reagent-gray">11,201</span>
                                    </li>
                                    <li class="list-group-item d-flex px-3">
                                        <span class="text-semibold text-fiord-blue">Hacker News</span>
                                        <span class="ml-auto text-right text-semibold text-reagent-gray">9,291</span>
                                    </li>
                                    <li class="list-group-item d-flex px-3">
                                        <span class="text-semibold text-fiord-blue">Reddit</span>
                                        <span class="ml-auto text-right text-semibold text-reagent-gray">8,281</span>
                                    </li>
                                    <li class="list-group-item d-flex px-3">
                                        <span class="text-semibold text-fiord-blue">The Next Web</span>
                                        <span class="ml-auto text-right text-semibold text-reagent-gray">7,128</span>
                                    </li>
                                    <li class="list-group-item d-flex px-3">
                                        <span class="text-semibold text-fiord-blue">Tech Crunch</span>
                                        <span class="ml-auto text-right text-semibold text-reagent-gray">6,218</span>
                                    </li>
                                    <li class="list-group-item d-flex px-3">
                                        <span class="text-semibold text-fiord-blue">YouTube</span>
                                        <span class="ml-auto text-right text-semibold text-reagent-gray">1,218</span>
                                    </li>
                                    <li class="list-group-item d-flex px-3">
                                        <span class="text-semibold text-fiord-blue">Adobe</span>
                                        <span class="ml-auto text-right text-semibold text-reagent-gray">827</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer border-top">
                                <div class="row">
                                    <div class="col">
                                        <select class="custom-select custom-select-sm">
                                            <option selected>Last Week</option>
                                            <option value="1">Today</option>
                                            <option value="2">Last Month</option>
                                            <option value="3">Last Year</option>
                                        </select>
                                    </div>
                                    <div class="col text-right view-report">
                                        <a href="#">Full report &rarr;</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Top Referrals Component -->
                    @endif
                </div>
            
                    
            
            </div>


        </main>
    </div>





    <script src="{{ asset('theme/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('theme/js/popper.min.js') }}"></script>
    <script src="{{ asset('theme/js/jquery/jquery-ui.js') }}"></script>
    <script src="{{ asset('theme/js/bootstrap.min.js') }}"></script>
    
   
    <script src="{{ asset('theme/js/classy-nav.min.js') }}"></script>
    <script src="{{ asset('theme/js/active.js') }}"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="{{ asset('theme/js/extras.1.1.0.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="{{ asset('theme/js/shards-dashboards.1.1.0.js') }}"></script>

    <script src="{{ asset('theme/js/global.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.min.js"></script>


    @yield('scripts')

</body>
