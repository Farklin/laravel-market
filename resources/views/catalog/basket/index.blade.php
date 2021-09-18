@extends('layouts.app')
@section('title', 'Корзина клиента')
@section('content')

<div class="container mt-5 ">
    <h1> Корзина </h1> 

    @if (count($products))
        @php
            $basketCost = 0;
        @endphp
        <table class="table table-bordered">
            <tr>
                <th>№</th>
                <th>Наименование</th>
                <th>Цена</th>
                <th>Кол-во</th>
                <th>Стоимость</th>
            </tr>
            @foreach($products as $product)
                @php
                    $itemPrice = $product->price;
                    $itemQuantity =  $product->pivot->quantity;
                    $itemCost = $itemPrice * $itemQuantity;
                    $basketCost = $basketCost + $itemCost;
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a href="">{{ $product->title }}</a>
                    </td>
                    <td>{{ number_format($itemPrice, 2, '.', '') }}</td>
                    <td>
                        <form action="{{ route('basket.product.minus', $product->id)}}" class="d-inline" method="post">
                            @csrf 
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="fas fa-minus-square"></i>
                            </button>
                        </form>
                       
                        <span class="mx-1">{{ $itemQuantity }}</span>

                        <form action="{{ route('basket.product.plus', $product->id)}}" class="d-inline" method="post">
                            @csrf
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="fas fa-plus-square"></i>
                            </button>
                        </form>
                       

                    </td>
                    <td>{{ number_format($itemCost, 2, '.', '') }}</td>
                    <td>
                        <form action="{{ route('basket.product.delete', ['id' => $product->id]) }}"
                              method="post">
                            @csrf
                            <input type="hidden" value="{{$product->id}}" name="product_id"> 
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="fas fa-trash-alt text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <th colspan="4" class="text-right">Товаров на сумму</th>
                <th>{{ number_format($basketCost, 2, '.', '') }}</th>
            </tr>
            <tr>
                <th colspan="4" class="text-right">Доставка</th>
                <th>{{ number_format($delivery, 2, '.', '') }}</th>
            </tr>
            @php
            $total = $basketCost + $delivery; 
            @endphp
             
            <tr>
                <th colspan="4" class="text-right"><strong> ИТОГО </strong></th>
                <th><strong>{{ number_format($total, 2, '.', '') }}</th>
            </tr>
        </table>
        <div class="checkout-btn mt-100 d-flex">
            <a href="{{route('basket.checkout')}}" class="btn essence-btn">Заказать</a>
            <a href="{{ route('basket.all') }}" class="btn essence-btn"> В корзину</a>
        </div>
        <label><input type="checkbox"  @if (Cookie::get('delivery_status') == True ) checked   @endif onclick="location.href = '{{route('delivery.status')}}'" class=""/> Требуется доставка</label>
       
    @else
        <p>Ваша корзина пуста</p>
    @endif
    
</div>

@endsection