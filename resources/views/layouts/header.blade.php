  <header class="header_area">
    <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
        <nav class="classy-navbar" id="essenceNav">

            <a class="nav-brand" href="{{ route('home') }}"><span>TEISBUBBLE<span></a>

            <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>

            <div class="classy-menu">

                <div class="classycloseIcon">
                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                </div>

                <div class="classynav">
                    <ul>
                        <li><a href="{{ route('all_product') }}">Категории</a>
                            <div class="megamenu">
                                @foreach($header_category as $title_category)
                                    @if($title_category->category_id == 0)
                                        <ul class="single-mega cn-col-4">
                                            <li class="title">{{ $title_category->title }} </li>
                                            @if(isset($title_category->category))
                                                @foreach($title_category->category as $category)
                                                    <li><a href="{{ route('category', $category->seo->slug)}}">{{ $category->title }}</a></li>
                                                @endforeach
                                            @endif 

                                        </ul>
                                    @endif
                                @endforeach
                                <div class="single-mega cn-col-4">
                                    <img src="img/bg-img/bg-6.jpg" alt="">
                                </div>
                            </div>
                        </li>
                        <li><a href="/page/kontakty">Контакты</a></li>
                    </ul>
                </div>

            </div>
        </nav>


        <div class="header-meta d-flex clearfix justify-content-end">
            <div class="search-area">
                <form action="{{ route('search') }}" method="get">
                    <input type="search" name="query" id="headerSearch" placeholder="Поиск товаров">
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
            <div class="favourite-area">
                <a href="#"><img src="/theme/img/core-img/heart.svg" alt=""></a>
            </div>
            @guest
                <div class="user-login-info">
                    <a href="{{ route('login') }}"><img src="/theme/img/core-img/user.svg" alt=""></a>
                </div>
                @else
                <div class="user-login-info">
                    <a href="{{ route('user.orders') }}"><img src="/theme/img/core-img/user.svg" alt=""></a>
                </div>

            @endauth
            <div class="cart-area">
                <a href="#" id="essenceCartBtn"><img src="/theme/img/core-img/bag.svg" alt=""> <span class="basket_count_product"></span></a>
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
                   $('.basket_count_product').text(basket_count_product);
                }

            });
        }
    ); 
    

</script> 