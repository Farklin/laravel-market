@extends('layouts/app')
@section('title', $product->seo->title)
@section('description', $product->seo->description)
@section('content')

@section('opengraph')
    <meta property="og:title" content="{{ $product->seo->title}}"/>
    <meta property="og:description" content="{{$product->seo->description}}"/>
    @foreach ($product->images as $image) 
        <meta property="og:image" content="{{request()->root()}}{{$image->image_path}}"/>

    @endforeach
    <meta property="og:type" content="website"/>
    <meta property="og:url" content= "{{url()->current()}}" />
@endsection

    <!-- ##### Single Product Details Area Start ##### -->

    <section  itemscope itemtype="http://schema.org/Product" class="container single_product_details_area d-flex align-items-center">
        
        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <div class="product_thumbnail_slides">
                @if (isset($product->images))
                    @foreach ($product->images as $image)
                        <img  itemprop="image" src="{{ $image->image_path }}" alt="">
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Single Product Description -->
        <div class=" single_product_desc clearfix">
            <span></span>
            <span>
                <div class="row">
                    <div class="col-10 col-md-10">

                        <h2 itemprop="name">{{ $product->title }}</h2>
                        <span>Вес: {{$product->weight}} г </span> 

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

                     


                        <div class="col-4 col-md-4"><span for="input-quantity">Количество</span>

                        </div>
                        <div class="col-4 col-md-4">
                            <input type="text" name="quantity" id="input-quantity" value="1" class="form-control form-control-sm mx-2 ">
                        </div>

                        <div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="col-md-4 col-4">
                            <p class="product-price">
                                @if ($product->old_price != 0 and $product->new_price < $product->price)
                                    <span class="old-price">{{ $product->old_price }} </span>
                                @endif
                            <div class="h2 text-danger text-right">{{ $product->price }} ₽</div>
                            <meta itemprop="price" content="{{ $product->price }}">
                            <meta itemprop="priceCurrency" content="RUB">
                            <meta itemprop="description" content="{{ $product->description }}"> 

                            </p>
                        </div>

                        <div class="col-5 col-md-12"> <button type="submit" name="addtocart" value="5"
                                class="btn sm-btn essence-btn">Добавить в корзину</button></div>
                    </div>

                    <script src="https://yastatic.net/share2/share.js"></script>
                    <div>



                        <span class="h3 mt-5"> Поделится в социальных сетях </span>
                        <div class="ya-share2" data-curtain data-shape="round" data-color-scheme="whiteblack"
                            data-limit="5"
                            data-services="messenger,vkontakte,facebook,odnoklassniki,telegram,twitter,viber,whatsapp">
                        </div>
                    </div>







                    <!-- Favourite -->

                </div>
            </form>


    </section>

    <section class="container">
        <div class="tab my-5">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Отзывы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Описание</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#delivery" role="tab">Доставка и оплата</a>
                </li>

            </ul>

            <!-- Вкладка панели -->
            <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel">

                    @foreach ($product->comments as $comment)
                        @include('catalog.comments.comment', $comment)
                    @endforeach

                    @include('catalog.comments.form_comment_product')
                </div>
                <div class="tab-pane" id="profile" role="tabpanel">
                    <div class="my-5">
                        {{ $product->description }}
                    </div>
                </div>
                <div class="tab-pane" id="delivery" role="tabpanel">
                    <div class="row my-5">
                        <div class="col-md-6">
                            <h5>Способы доставки</h5>
                            <ul>
                                <li>Доставка Почтой России</li>
                                <li>Доставка CDEK</li>
                                <li>Доставка курьером CDEK</li>
                                <li>Самовывоз во Владимире</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5>Способы оплаты</h5>
                            <ul>
                                <li>Оплата наличными</li>
                                <li>Оплата наложенным платежом Почта России</li>
                                <li>Оплата банковской картой по реквизитам</li>
                                <li>Оплата наличными или картой в пункте самовывоза</li>
                            </ul>
                        </div>

                    </div>


                </div>

            </div>

            <script type="text/javascript">
                $('#myTab a').click(function(e) {
                    e.preventDefault()
                    $(this).tab('show')
                })
            </script>
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
