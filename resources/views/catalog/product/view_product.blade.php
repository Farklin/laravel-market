{{-- @extends('layouts/app')
@section('title', $product->title)
@section('content')


<div class="container mt-2 mb-3">
    <div class="row no-gutters">
        <div class="col-md-5 pr-2">
            <div class="card">
                <div class="demo">
                 
                    <ul id="lightSlider">
                    @if (isset($product->images)) 
                        @foreach ($product->images as $image)
                        <li data-thumb="{{ $image->image_path}}"> 
                        <img src="{{ $image->image_path}}" /> </li>
                        @endforeach
                    @endif 

                    </ul>
                </div>
            </div>
            <div class="card mt-2">
                <h6>Отзывы</h6>
                <div class="d-flex flex-row">
                    <div class="stars"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div> <span class="ml-1 font-weight-bold">4.6</span>
                </div>
                <hr>
                <div class="badges"> <span class="badge bg-dark ">All (230)</span> <span class="badge bg-dark "> <i class="fa fa-image"></i> 23 </span> <span class="badge bg-dark "> <i class="fa fa-comments-o"></i> 23 </span> <span class="badge bg-warning"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="ml-1">2,123</span> </span> </div>
                <hr>
                <div class="comment-section">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-row align-items-center"> <img src="https://i.imgur.com/o5uMfKo.jpg" class="rounded-circle profile-image">
                            <div class="d-flex flex-column ml-1 comment-profile">
                                <div class="comment-ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div> <span class="username">Lori Benneth</span>
                            </div>
                        </div>
                        <div class="date"> <span class="text-muted">2 May</span> </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-row align-items-center"> <img src="https://i.imgur.com/tmdHXOY.jpg" class="rounded-circle profile-image">
                            <div class="d-flex flex-column ml-1 comment-profile">
                                <div class="comment-ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div> <span class="username">Timona Simaung</span>
                            </div>
                        </div>
                        <div class="date"> <span class="text-muted">12 May</span> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="d-flex flex-row align-items-center">
                    <div class="p-ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div> <span class="ml-1">5.0</span>
                </div>
                <div class="about"> <span class="font-weight-bold">{{ $product->title }}</span>
                    <h4 class="font-weight-bold">$ {{ $product->price }}</h4>
                </div>
                <div class="col-md-6">
                    <p>Цена: {{ number_format($product->price, 2, '.', '') }}</p>
                    <!-- Форма для добавления товара в корзину -->
                    <form action="{{ route('basket.add', ['id' => $product->id]) }}"
                          method="post" class="form-inline">
                        @csrf
                        <label for="input-quantity">Количество</label>
                        <input type="text" name="quantity" id="input-quantity" value="1"
                               class="form-control mx-2 w-25">
                        <button type="submit" class="btn btn-success">Добавить в корзину</button>
                    </form>
                </div>
                <div class="buttons"> <button class="btn btn-outline-warning btn-long cart">Добавить в корзину</button> <button class="btn btn-warning btn-long buy">Купить сейчас</button> <button class="btn btn-light wishlist"> <i class="fa fa-heart"></i> </button> </div>
                <hr>
                <div class="product-description">
                    <div><span class="font-weight-bold">Color:</span><span> blue</span></div>
                    <div class="my-color"> <label class="radio"> <input type="radio" name="gender" value="MALE" checked> <span class="red"></span> </label> <label class="radio"> <input type="radio" name="gender" value="FEMALE"> <span class="blue"></span> </label> <label class="radio"> <input type="radio" name="gender" value="FEMALE"> <span class="green"></span> </label> <label class="radio"> <input type="radio" name="gender" value="FEMALE"> <span class="orange"></span> </label> </div>
                    <div class="d-flex flex-row align-items-center"> <i class="fa fa-calendar-check-o"></i> <span class="ml-1">Доставка от 15 до 45 дней</span> </div>
                    <div class="mt-2"> <span class="font-weight-bold">Описание</span>
                        <p>{{ $product->description }}</p> 
                        <div class="bullets">
                            <div class="d-flex align-items-center"> <span class="dot"></span> <span class="bullet-text">Best in Quality</span> </div>
                            <div class="d-flex align-items-center"> <span class="dot"></span> <span class="bullet-text">Anti-creak joinery</span> </div>
                            <div class="d-flex align-items-center"> <span class="dot"></span> <span class="bullet-text">Sturdy laminate surfaces</span> </div>
                            <div class="d-flex align-items-center"> <span class="dot"></span> <span class="bullet-text">Relocation friendly design</span> </div>
                            <div class="d-flex align-items-center"> <span class="dot"></span> <span class="bullet-text">High gloss, high style</span> </div>
                            <div class="d-flex align-items-center"> <span class="dot"></span> <span class="bullet-text">Easy-access hydraulic storage</span> </div>
                        </div>
                    </div>
                    <div class="mt-2"> <span class="font-weight-bold">Магазин</span> </div>
                    <div class="d-flex flex-row align-items-center"> <img src="https://i.imgur.com/N2fYgvD.png" class="rounded-circle store-image">
                        <div class="d-flex flex-column ml-1 comment-profile">
                            <div class="comment-ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div> <span class="username">Rare Boutique</span> <small class="followers">25K Followers</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-2"> <span>Похожие товары:</span>
                <div class="similar-products mt-2 d-flex flex-row">
                @foreach ($products as $product_similar)
                    <div class="card border p-1" style="width: 9rem;margin-right: 3px;">
                    <a href="{{ route('product.show', $product_similar->id) }}"> 
                     <img 
                     @if (isset($product_similar->images[0]))

                     src="{{ $product_similar->images[0]->image_path}}"
                     @endif 

                     class="card-img-top" alt="...">
                    </a>
                        <div class="card-body">
                            <h6 class="card-title">{{$product_similar->price}}</h6>
                        </div>
                    </div>

                @endforeach 
                </div>
            </div>
        </div>
    </div>
</div>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
<script src='https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js'></script>
<script>
    $('#lightSlider').lightSlider({
        gallery: true,
        item: 1,
        loop: true,
        slideMargin: 0,
        thumbItem: 9
    });
</script>

@endsection --}}

@extends('layouts/app')
@section('title', $product->seo->title)
@section('content')


    <!-- ##### Single Product Details Area Start ##### -->

    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <div class="product_thumbnail_slides">
                @if (isset($product->images))
                    @foreach ($product->images as $image)
                        <img src="{{ $image->image_path }}" alt="">
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            <span>mango</span>
            <a href="cart.html">
                <h2>{{ $product->title }}</h2>
            </a>
            <p class="product-price">
                @if ($product->old_price != 0 and $product->new_price < $product->price)
                    <span class="old-price">{{ $product->old_price }} </span>
                @endif
                {{ $product->price }}
            </p>
            <p class="product-desc">{{ $product->description }}</p>

            <!-- Form -->
            <form class="cart-form clearfix" action="{{ route('basket.add', ['id' => $product->id]) }}" method="post">
                @csrf
                <!-- Select Box -->
                {{-- <div class="select-box d-flex mt-50 mb-30">
                    <select name="select" id="productSize" class="mr-5">
                        <option value="value">Size: XL</option>
                        <option value="value">Size: X</option>
                        <option value="value">Size: M</option>
                        <option value="value">Size: S</option>
                    </select>
                    <select name="select" id="productColor">
                        <option value="value">Color: Black</option>
                        <option value="value">Color: White</option>
                        <option value="value">Color: Red</option>
                        <option value="value">Color: Purple</option>
                    </select>
                </div> --}}
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->

                    <!-- Форма для добавления товара в корзину -->


                    <span for="input-quantity">Количество</span>
                    <input type="text" name="quantity" id="input-quantity" value="1" class="form-control mx-2 w-25">
                    <button type="submit" name="addtocart" value="5" class="btn essence-btn">Добавить в корзину</button>



                    <!-- Favourite -->
                    <div class="product-favourite ml-4">
                        <a href="#" class="favme fa fa-heart"></a>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->


@endsection
