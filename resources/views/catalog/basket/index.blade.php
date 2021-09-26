@extends('layouts.app')
@section('title', 'Корзина клиента')
@section('content')

<div class="container mt-5 ">
    <h1> Корзина </h1> 

    @if (count($products))
        @php
            $basketCost = 0;
        @endphp
        {{-- <table class="table table-bordered">
            <tr>
                <th scope="col">№</th>
                <th scope="col">Наименование</th>
                <th scope="col">Цена</th>
                <th scope="col">Кол-во</th>
                <th scope="col">Стоимость</th>
            </tr>
            <tbody>
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
                        <a href="{{ route('product.show', $product->seo->slug) }}">{{ $product->title }}</a>
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
        </tbody>
        </table>

--}} 
@foreach($products as $product)
    @php
    $itemPrice = $product->price;
    $itemQuantity =  $product->pivot->quantity;
    $itemCost = $itemPrice * $itemQuantity;
    $basketCost = $basketCost + $itemCost;
    @endphp
        <div class="row mt-50 m-3">
        <div class="col-6 col-md-4 image-poduct"><img src="{{ $product->images[0]->thumbnail()}}" alt=""></div>
        <div class="col-6 col-md-4 description-product">
            <div class="row"><a href="{{ route('product.show', $product->seo->slug) }}">{{ $product->title }}</a></div>
            <div class="row">Склад отгрузки: Владимир</div> 
            <div class="row">{{ number_format($itemCost, 2, '.', '') }}      </div>
        </div>

            <div class="col-12 col-md-4 ">
                <div class="row">
                    <div class="col-6 justify-content-center count-product d-flex"> 
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
                    </div>
                    <div class="col-2"></div>
                    <div class="col-6"></div>
                </div>
            </div>
        </div> 
@endforeach

        <div class="row">
            <div class="text-right col-6">Товаров на сумму</div>
            <div class="col-6">{{ number_format($basketCost, 2, '.', '') }}</div>
        </div>
        @if (Cookie::get('delivery_status') == True )
        <div class="row">
            <div  class="text-right col-6">Доставка</div>
            <div class="col-6"> {{ number_format($delivery, 2, '.', '') }}</div>
        </div>
        @endif
        @php
        if(Cookie::get('delivery_status')){
            $total = $basketCost + $delivery; 
        }else{
            $total = $basketCost; 
        }
     
        @endphp
        
        <div class="row">
            <div class="text-right col-6"><strong> ИТОГО </strong></div>
            <div class="col-6"><strong>{{ number_format($total, 2, '.', '') }}</div> 
            <div class="col-12"><label><input type="checkbox"  @if (Cookie::get('delivery_status') == True ) checked   @endif onclick="location.href = '{{route('delivery.status')}}'" class=""/> Требуется доставка</label>
            </div>
            <div class="col-12">
                <a href="{{route('basket.checkout')}}" class="btn essence-btn">Заказать</a>
            </div>
        </div>


        <div class="checkout-btn mt-100 d-flex">
           
        </div>
       
    @else
        <p>Ваша корзина пуста</p>
    @endif
    
</div>

@endsection