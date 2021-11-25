@extends('layouts.app')
@section('title', 'Мыло ручной работы во Владимире - интернет магазин TeisBubble')
@section('description', 'Интернет магазин мыла ручной работы, различных форм. В каталоге представленно более 40 товаров. Доставка во Владимире и по всей России.')

@section('content')

    <section class="welcome_area bg-img background-overlay" style="background-image: url(/theme/img/bg-img/bg-1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h6>Мыло ручной работы</h6>
                        <h2>Новинки</h2>
                        <a href="{{route('all_product')}}" class="btn essence-btn"> Перейти в каталог </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="top_catagory_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <ul class="list-group">
                        @foreach($categories as $category)
                        <li class="list-group-item">
                            <a class="text-center h6" href="{{ route('category', $category->seo->slug)}}">
                            <img class="image-category-menu" alt="{{$category->title}}" src="{{$category->image}}" />
                            {{$category->title}}</a>
                        </li>
                        @endforeach 
                      </ul>
                </div>
                <div class="col-md-8 col-sm-12">
                    <div class="row">
                        <div class="col-md-8 col-sm-12"></div>
                        <div class="col-md-4 col-sm-12"></div>
                    </div> 
                    <div class="row m-2">
                        <div class="col-md-6 col-sm-6 card p-2">
                            <div class="row p-1">
                                <div class="col-md-9 col-sm-9">
                                    <div>
                                        <span class="h6">Привет</span>
                                    </div> 
                                    <span>Получай бонусы и спецпредложения,
                                    сохраняй и отслеживай заказы</span> 
                                    <div class="p-2 row">
                                        <a class="col-md-6" href="{{route('login')}}">Авторзоваться</a>
                                        <a class="col-md-6" href="{{route('user.orders')}}">Мои заказы</a>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 card p-2">
                            <div class="row">
                                <div class="col-md-9 col-sm-9">
                                    <div>
                                        <span class="h6">Собери свой набор</span>
                                    </div> 
                                    <span>Закажи несколько товаров и мы соберем полноценный набор</span> 
                                    <div class="p-2 row">
                                        <a class="col-md-6" href="{{route('all_product')}}"> Перейти в каталог </a>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row justify-content-center">
            @foreach($categories as $category)
                <div class="col-sm-6 col-md-3 col-6">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{$category->image}});">
                        <div class="catagory-content">
                            <a class="text-center" href="{{ route('category', $category->seo->slug)}}">{{$category->title}}</a>
                        </div>
                    </div>
                </div>
            @endforeach 
            </div> --}}
        </div>
    </div>
    @if(isset($popular_products))
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <h2>Популярные товары</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">
                    @foreach($popular_products as $product)
                    <div class="single-product-wrapper">
                        <a href="{{route('product.show', $product->seo->slug)}}">
                        @if(count($product->images) >= 2)
                        <div class="product-img">
                            <img src="{{$product->images[0]->thumbnail() }}" alt="">
                            <img class="hover-img" src="{{$product->images[1]->thumbnail()}}" alt="">
                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                        @endif 
                        </a> 
                        <div class="product-description">
                            <div class="product-price h5">{{ $product->price }} ₽</div>
                            <a href="{{ route('product.show', $product->seo->slug)}} ">
                                <h6>{{ $product->title }}</h6>
                            </a>
                            <small>Вес: {{$product->weight}} г </small> 

                            <div class="hover-content">
                                <div class="add-to-cart-btn">
                                    <form class="cart-form clearfix" action="{{ route('basket.add', ['id' => $product->id]) }}" method="post">  
                                        @csrf 
                                    <input type="hidden" name="quantity" id="input-quantity" value="1" class="form-control mx-2 w-25">
                                     <button type="submit" class="btn essence-btn">В корзину</button>
                                     </form> 
                
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach 
                   
                    </div>
                </div>
            </div>
        </div>
        @endif

    <div class="cta-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content bg-img background-overlay" style="background-image: url(/images/category/тарталетка.jpg);">
                        <div class="h-100 d-flex align-items-center justify-content-end">
                            <div class="cta--text">
                                <h6>140 ₽</h6>
                                <h2>Новинка недели</h2>
                                <a href="https://teisbubble.ru/product/mylo-yagodnoe-piroznoe" class="btn essence-btn">Купить сейчас</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     
        {{-- Вывод отзывов о товарах --}}
        @include('catalog/comments/comments', $comments) 
        {{-- // Вывод отзывов о товарах --}}
   
    </section>
    


    
@endsection
