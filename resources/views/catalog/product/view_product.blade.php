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
                <div class="row">
                    <div class="col-10 col-md-5">

                        <h2>{{ $product->title }}</h2>

                    </div>
                    <div class="col-2 col-md-2">

                        <div class="cart-fav-box">
                            <div class="product-favourite">
                                <a href="#" id="like-product" class="favme fa fa-heart @if (count($product->likeUser()) >= 1)@if ($product->likeUser()[0]->like == true)active @endif @endif"> <span
                                        id="count-like"> {{ count($product->likes) }}</span></a>
                            </div>
                        </div>

                    </div>
                </div>


            </span>
            <p class="product-price">
                @if ($product->old_price != 0 and $product->new_price < $product->price)
                    <span class="old-price">{{ $product->old_price }} </span>
                @endif
            <div class="h2 text-danger">{{ $product->price }} ₽</div>
            </p>


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
                <div class="cart-fav-box align-items-center">
                    <!-- Cart -->

                    <!-- Форма для добавления товара в корзину -->

                    <div class="row">

                        <div class="col-5 col-md-2"><span for="input-quantity">Количество</span><input type="text"
                                name="quantity" id="input-quantity" value="1" class="form-control mx-2 "></div>
                        <div class="col-5"> <button type="submit" name="addtocart" value="5"
                                class="btn sm-btn essence-btn">В корзину</button></div>
                    </div>


                    





                    <!-- Favourite -->

                </div>
            </form>

            <div class="tab my-5">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Отзывы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Описание</a>
                    </li>
                </ul>

                <!-- Вкладка панели -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">

                        @foreach ($product->comments as $comment) 
                            @include('catalog.comments.comment', $comment)
                        @endforeach 

                        @include('catalog.comments.form_comment_product')</div>
                    <div class="tab-pane" id="profile" role="tabpanel">{{ $product->description }}</div>
                </div>

                <script type="text/javascript">
                    $('#myTab a').click(function(e) {
                        e.preventDefault()
                        $(this).tab('show')
                    })
                </script>
            </div>

            <script src="https://yastatic.net/share2/share.js"></script>
            <div>



                <span class="h3 mt-5"> Поделится в социальных сетях </span>
                <div class="ya-share2" data-curtain data-shape="round" data-color-scheme="whiteblack" data-limit="5"
                    data-services="messenger,vkontakte,facebook,odnoklassniki,telegram,twitter,viber,whatsapp"></div>
            </div>

            <div>



    </section>
    <!-- ##### Single Product Details Area End ##### -->

    <script>
        // лайк товаров
        $(document).ready(function() {
            $('#like-product').click(function() {

                $.ajax({
                    method: "GET",
                    url: "{{ route('user.like.product', $product->id) }} ",

                    success: function(data) {
                        if (data) {
                            $('#like-product').addClass('active');
                            $('#count-like').html(parseInt($('#count-like').text()) + 1);
                        } else {
                            $('#like-product').removeClass('active');
                            $('#count-like').html(parseInt($('#count-like').text()) - 1);
                        }

                    },

                }).error(function(httpObj, textStatus) {
                    if (httpObj.status == 401)
                        window.location.href = '{{ route('login') }}';
                });;

            })


        });
    </script>

@endsection
