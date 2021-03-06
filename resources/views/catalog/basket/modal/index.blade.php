    <div class="cart-content d-flex">

        <!-- Cart List Area -->
        @if (!empty($products))


            <div class="cart-list">

                @if (count($products))
                    @foreach ($products as $product)
                        <!-- Single Cart Item -->
                        <div class="single-cart-item">
                
                            <a href="{{ route('product.show', $product->seo->slug) }} " class="product-image">
                                @if(count($product->images)>0)
                                <img src="{{ $product->images[0]->thumbnail() }}" class="cart-thumb" alt="">
                                <!-- Cart Item Desc -->
                                @endif 
                                <div class="cart-item-desc">
                                    <span class="product-remove" onclick="basket_delete_product({{ $product->id }})"><i
                                            class="fa fa-close" aria-hidden="true"></i></span>
                                    <span class="badge"> </span>
                                    <h6>{{ $product->title }} <div class="tag tag-info">Количество( {{ $product->pivot->quantity }} )</div></h6>
                                    <p class="price">{{ $product->price }} ₽</p>
                                </div>
                            </a>
                            
                  
                        </div>
                    @endforeach
                @endif

            </div>

            <!-- Cart Summary -->
            <div class="cart-amount-summary">

                @if (count($products))
                    @php
                        $basketCost = 0;
                    @endphp
                    @foreach ($products as $product)
                        @php
                            $itemPrice = $product->price;
                            $itemQuantity = $product->pivot->quantity;
                            $itemCost = $itemPrice * $itemQuantity;
                            $basketCost = $basketCost + $itemCost;
                            $basketTotal = $basketCost + $delivery; 
                        @endphp
                    @endforeach
                    

                    <h2>Корзина</h2>
                    <ul class="summary-table">
                        <li><span>Товаров на сумму:</span> <span>{{ number_format($basketCost, 2, '.', '') }}</span></li>
                        @if (Cookie::get('delivery_status') == True )
                        <li><span>Доставка:</span> <span>{{ number_format($delivery, 2, '.', '') }}</span></li>
                        <li><span>Итого:</span> <span>{{ number_format($basketTotal, 2, '.', '') }}</span></li>
                        @endif 
                        <label><input type="checkbox"  @if (Cookie::get('delivery_status') == True ) checked   @endif onclick="location.href = '{{route('delivery.status')}}'" class=""/> Требуется доставка</label>
                   
                     
                    </ul>
                    <div class="checkout-btn mt-50 d-flex flex-column ">
                        <a href="{{route('basket.checkout')}}" class="btn essence-btn">Заказать</a>
                        <a href="{{ route('basket.all') }}" class="btn essence-btn"> В корзину</a>
                    </div>
                
                    <div class="cart-button mt-50">
                        *** Самовывоз осуществляется по городу Владимиру 
                        
                    </div>

                @else
                    <h2>Корзина</h2>
                    <ul class="summary-table">
                        <li><span>Ваша корзина пуста</span> </li>
                    </ul>
                @endif

            @else
                <div class="cart-amount-summary">
                    <h2>Корзина</h2>
                    <ul class="summary-table">
                        <li><span>Ваша корзина пуста</span> </li>
                    </ul>
        @endif
    </div>


    {{-- Удаление из корзины товаров --}}
    <script type="text/javascript">
        function basket_delete_product(product_id) {
            $(document).ready(function() {
                $.ajax({
                    method: "POST",
                    url: "{{ route('basket.product.delete') }}",
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'product_id': product_id,
                    },
                    success: function(data) {

                    },

                });
            });
        }
    </script>
