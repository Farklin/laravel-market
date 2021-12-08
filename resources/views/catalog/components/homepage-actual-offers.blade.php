<div class="row card my-2 p-2">
    <div class="col-md-12">
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist">
                @foreach ($actuals as $actual)
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#charecter{{$loop->index}}" role="tab">{{$actual->title}}</a>
                </li>
                @endforeach
            </ul>

            <!-- Вкладка панели -->
            <div class="tab-content">
                @foreach ($actuals as $actual)
                <div class="tab-pane @if($loop->first) active @endif p-2" id="charecter{{$loop->index}}" role="tabpane0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="popular-products-slides owl-carousel">
                                @foreach ($actual->products as $product)
                                    <div class="single-product-wrapper">
                                        <a href="{{ route('product.show', $product->seo->slug) }}">
                                            @if(count($product->images) >= 2 and is_file($product->images[0]->thumbnail()) and is_file($product->images[1]->thumbnail()) )
                                                <div class="product-img">
                                                    <img src="{{ $product->images[0]->thumbnail() }}" alt="">
                                                    <img class="hover-img"
                                                        src="{{ $product->images[1]->thumbnail() }}" alt="">
                                                    <div class="product-favourite">
                                                        <a href="#" class="favme fa fa-heart"></a>
                                                    </div>
                                                </div>
                                            @endif
                                        </a>
                                        <div class="product-description">
                                            <div class="product-price h5">{{ $product->price }} ₽</div>
                                            <a href="{{ route('product.show', $product->seo->slug) }} ">
                                                <h6>{{ $product->title }}</h6>
                                            </a>
                                            <small>Вес: {{ $product->weight }} г </small>

                                            <div class="hover-content">
                                                <div class="add-to-cart-btn">
                                                    <form class="cart-form clearfix"
                                                        action="{{ route('basket.add', ['id' => $product->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <input type="hidden" name="quantity" id="input-quantity"
                                                            value="1" class="form-control mx-2 w-25">
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
                @endforeach
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
