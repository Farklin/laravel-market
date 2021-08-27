<div class="col-12 col-sm-6 col-lg-4">
    <div class="single-product-wrapper">
        <!-- Product Image -->
        <div class="product-img">

            @if(isset($product->images[0])) 
                <img src="{{ $product->images[0]->image_path }}" alt="">
            @endif
            
            <!-- Hover Thumb -->

            @if(isset($product->images[1])) 
                <img class="hover-img" src="{{ $product->images[1]->image_path }}" alt="">
            @endif

        </div>

        <!-- Product Description -->
        <div class="product-description">
            <span>topshop</span>
            <a href="{{ route('product.show', $product->id)}} ">
                <h6>{{ $product->title }}</h6>
            </a>
            <p class="product-price">{{ $product->price }} </p>

            <!-- Hover Content -->
            <div class="hover-content">
                <!-- Add to Cart -->
                <div class="add-to-cart-btn">
                    <a href="#" class="btn essence-btn">Добавить в корзину</a>
                </div>
            </div>
        </div>
    </div>
</div>