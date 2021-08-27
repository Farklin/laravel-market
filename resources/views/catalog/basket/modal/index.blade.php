



    <div class="cart-content d-flex">

        <!-- Cart List Area -->
        <div class="cart-list">
            @if(count($products))
            @foreach($products as $product)
                <!-- Single Cart Item -->
                <div class="single-cart-item">
                    <a href="" class="product-image">
                        <img src="{{$product->images->first()->image_path}}" class="cart-thumb" alt="">
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                        <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <span class="badge">Mango</span>
                            <h6>{{$product->title}}</h6>
                            <p class="price">{{$product->price}}</p>
                        </div>
                    </a>
                </div>
            @endforeach 
            @endif
        </div>

        <!-- Cart Summary -->
        <div class="cart-amount-summary">

            @if(count($products))
            @php
                    $basketCost = 0;
            @endphp
            @foreach($products as $product)
                @php
                    $itemPrice = $product->price;
                    $itemQuantity =  $product->pivot->quantity;
                    $itemCost = $itemPrice * $itemQuantity;
                    $basketCost = $basketCost + $itemCost;
                @endphp
            @endforeach
        
            <h2>Корзина</h2>
                <ul class="summary-table">
                    <li><span>Итого:</span> <span>{{ number_format($basketCost, 2, '.', '') }}</span></li>
                </ul>
            <div class="checkout-btn mt-100">
                <a href="checkout.html" class="btn essence-btn">Заказать</a>
            </div>
        
        @else
        <h2>Корзина</h2>
            <ul class="summary-table">
                <li><span>Ваша корзина пуста</span> </li>
            </ul>
        @endif 
        
        
        </div>
