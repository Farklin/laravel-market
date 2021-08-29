{{-- <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#">KaMishok</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('all_product') }}">Главная <span class="sr-only"></span></a>
        </li>
       @foreach($header_category as $category)
        
        <li class="nav-item">
          <a class="nav-link" href="{{ route('category', $category->id) }}">{{$category->title}}</a>
        </li>
       @endforeach 
       
       
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Искать мыльце" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
      </form>
      @guest
        
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">Войти</a>
        </li>
        @else 

        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit(); " role="button">
                <i class="fas fa-sign-out-alt"></i>

                {{ __('Выйти') }}
            </a>
        </div>

       @endauth
    </div>
  </nav> --}}


  <header class="header_area">
    <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
        <!-- Classy Menu -->
        <nav class="classy-navbar" id="essenceNav">
            <!-- Logo -->
            <a class="nav-brand" href="{{ route('all_product') }}"><img src="/theme/img/core-img/logo.png" alt=""></a>
            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>
            <!-- Menu -->
            <div class="classy-menu">
                <!-- close btn -->
                <div class="classycloseIcon">
                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                </div>
                <!-- Nav Start -->
                <div class="classynav">
                    <ul>
                        <li><a href="#">Категории</a>
                            <div class="megamenu">
                                <ul class="single-mega cn-col-4">
                                    <li class="title">Мыло</li>
                                    @foreach($header_category as $category)
                                    <li><a href="{{ route('category', $category->id)}}">{{ $category->title }}</a></li>
                                    @endforeach
                                </ul>
                                <!-- <ul class="single-mega cn-col-4">
                                    <li class="title">Men's Collection</li>
                                    <li><a href="shop.html">T-Shirts</a></li>
                                    <li><a href="shop.html">Polo</a></li>
                                    <li><a href="shop.html">Shirts</a></li>
                                    <li><a href="shop.html">Jackets</a></li>
                                    <li><a href="shop.html">Trench</a></li>
                                </ul>
                                <ul class="single-mega cn-col-4">
                                    <li class="title">Kid's Collection</li>
                                    <li><a href="shop.html">Dresses</a></li>
                                    <li><a href="shop.html">Shirts</a></li>
                                    <li><a href="shop.html">T-shirts</a></li>
                                    <li><a href="shop.html">Jackets</a></li>
                                    <li><a href="shop.html">Trench</a></li>
                                </ul> -->
                                <div class="single-mega cn-col-4">
                                    <img src="img/bg-img/bg-6.jpg" alt="">
                                </div>
                            </div>
                        </li>
                        <li><a href="#">Информация</a>
                            <ul class="dropdown">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="single-product-details.html">Product Details</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="single-blog.html">Single Blog</a></li>
                                <li><a href="regular-page.html">Regular Page</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.html">Блог</a></li>
                        <li><a href="contact.html">Контакты</a></li>
                    </ul>
                </div>
                <!-- Nav End -->
            </div>
        </nav>

        <!-- Header Meta Data -->
        <div class="header-meta d-flex clearfix justify-content-end">
            <!-- Search Area -->
            <div class="search-area">
                <form action="#" method="post">
                    <input type="search" name="search" id="headerSearch" placeholder="Поиск товаров">
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
            <!-- Favourite Area -->
            <div class="favourite-area">
                <a href="#"><img src="/theme/img/core-img/heart.svg" alt=""></a>
            </div>
            <!-- User Login Info -->
            @guest
                <div class="user-login-info">
                    <a href="{{ route('register') }}"><img src="/theme/img/core-img/user.svg" alt=""></a>
                </div>
                @else

            @endauth
            <!-- Cart Area -->
            <div class="cart-area">
                <a href="#" id="essenceCartBtn"><img src="/theme/img/core-img/bag.svg" alt=""> <span id="basket_count_product"></span></a>
            </div>
        </div>

    </div>
</header>


<script>    
    // Колличество товаров в корзине
    $(document).ready(
        function(){

  
            $.ajax({
                headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'post',
                url: "{{ route('basket.object') }} ", 
                success: function(data){
                   basket_count_product = $.parseJSON(data).length; 
                   $('#basket_count_product').text(basket_count_product);
                }

            });
        }
    ); 
    

</script> 