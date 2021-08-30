<div class="col-12 col-sm-6 col-lg-4">
    <div class="single-product-wrapper">
        <!-- Product Image -->
        <a href="{{ route('product.show', $product->seo->slug) }}"> 
        <div class="product-img">

            @if(isset($product->images[0])) 
                <img src="{{ $product->images[0]->image_path }}" alt="">
            @endif
            
            <!-- Hover Thumb -->

            @if(isset($product->images[1])) 
                <img class="hover-img" src="{{ $product->images[1]->image_path }}" alt="">
            @endif

        </div>
        </a> 

        <!-- Product Description -->
        <div class="product-description">
            <span>topshop</span>
            <a href="{{ route('product.show', $product->seo->slug)}} ">
                <h6>{{ $product->title }}</h6>
            </a>
            <p class="product-price">{{ $product->price }} </p>

            <!-- Hover Content -->
            <div class="hover-content">
                <!-- Add to Cart -->
                <div class="add-to-cart-btn">
                     <!-- Form -->
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