<div class="col-12 col-sm-6 col-lg-4">
    <div class="single-product-wrapper">
        <a href="{{ route('product.show', $product->seo->slug) }}"> 
        <div class="product-img">

            @if(isset($product->images[0])) 
                <img src="{{ $product->images[0]->thumbnail() }}" alt="">
            @endif
            

            @if(isset($product->images[1])) 
                <img class="hover-img" src="{{ $product->images[1]->thumbnail() }}" alt="">
            @endif

        </div>
        </a> 

        <div class="product-description">
            <span></span>
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
</div>