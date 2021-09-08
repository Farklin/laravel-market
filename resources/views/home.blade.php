@extends('layouts.app')

@section('content')


    <!-- ##### Welcome Area Start ##### -->
    <section class="welcome_area bg-img background-overlay" style="background-image: url(/theme/img/bg-img/bg-1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h6>Мыло ручной работы</h6>
                        <h2>Новинки</h2>
                        <a href="#" class="btn essence-btn">Все товары </a>
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
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(/images/category/1.jpg);">
                        <div class="catagory-content">
                            <a href="#">В форме еды</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(/images/category/2.jpg);">
                        <div class="catagory-content">
                            <a href="#">В форме шайбы</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(/images/category/3.jpg);">
                        <div class="catagory-content">
                            <a href="#">Квадратное мыло </a>
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
                                <a href="#" class="btn essence-btn">Купить сейчас</a>
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
                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="/theme/img/product-img/product-1.jpg" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="/theme/img/product-img/product-2.jpg" alt="">
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <span></span>
                                <a href="single-product-details.html">
                                    <h6>{{$product->title}}</h6>
                                </a>
                                <p class="product-price">{{$product->price}}</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
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
