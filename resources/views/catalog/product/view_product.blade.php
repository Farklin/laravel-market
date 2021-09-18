

@extends('layouts/app')
@section('title', $product->seo->title)
@section('description', $product->seo->description)
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
            <span></span>
            <span> 
                <h2>{{ $product->title }}</h2>
            </span>
            <p class="product-price">
                @if ($product->old_price != 0 and $product->new_price < $product->price)
                    <span class="old-price">{{ $product->old_price }} </span>
                @endif
                <div class="h2 text-danger">{{ $product->price }} ₽</div>
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

            <script src="https://yastatic.net/share2/share.js"></script>
            <div> 
            


            <span class="h3 mt-5"> Поделится в социальных сетях </span> 
            <div class="ya-share2" data-curtain data-shape="round" data-color-scheme="whiteblack" data-limit="5" data-services="messenger,vkontakte,facebook,odnoklassniki,telegram,twitter,viber,whatsapp"></div>
            </div>
            <div> 
    </section>
    <!-- ##### Single Product Details Area End ##### -->


@endsection
