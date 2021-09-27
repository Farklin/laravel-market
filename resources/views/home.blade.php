@extends('layouts.app')
@section('title', 'Каталог товаров интернет магазина TeisBubble')
@section('content')


    <!-- ##### Welcome Area Start ##### -->
    <section class="welcome_area bg-img background-overlay" style="background-image: url(/theme/img/bg-img/bg-1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h6>Мыло ручной работы</h6>
                        <h2>Новинки</h2>
                        <a href="{{route('all_product')}}" class="btn essence-btn"> Все товары </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Welcome Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    <div class="top_catagory_area section-padding-80 clearfix">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Catagory -->
                <div class="col-sm-6 col-md-4 col-6">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(/images/category/1.jpg);">
                        <div class="catagory-content">
                            <a href="/category/v-forme-edy">В форме еды</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-6 col-sm-6 col-md-4 ">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(/images/category/2.jpg);">
                        <div class="catagory-content">
                            <a href="/category/v-forme-saiby">В форме шайбы</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class=" col-6 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(/images/category/3.jpg);">
                        <div class="catagory-content">
                            <a href="/category/kvadratnoe-mylo">Квадратное мыло </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <div class="cta-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content bg-img background-overlay" style="background-image: url(/images/category/тарталетка.jpg);">
                        <div class="h-100 d-flex align-items-center justify-content-end">
                            <div class="cta--text">
                                <h6>140 </h6>
                                <h2>Новинка недели</h2>
                                <a href="https://teisbubble.ru/product/mylo-yagodnoe-piroznoe" class="btn essence-btn">Купить сейчас</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### CTA Area End ##### -->

    <!-- ##### New Arrivals Area Start ##### -->
    @if(isset($popular_products))
    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Популярные товары</h2>
                    </div>
                </div>
            </div>
        </div>

  
        <div class="container">
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
                                <span></span>
                                <a href="{{ route('product.show' , $product->seo->slug) }} ">
                                    <h6>{{$product->title}}</h6>
                                </a>
                                <p class="product-price">{{$product->price}}</p>

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
        </div>
        @endif 
    </section>
   
@endsection
