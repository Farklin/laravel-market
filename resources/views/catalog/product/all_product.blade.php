
@extends('layouts/app')
@section('title', 'Все товары магазина')
@section('content')

    <div class="container mt-5">

        <div class="card-columns">

        @foreach($products as $product)
            
            @include('catalog/product/card_product', ['product'=>$product])
        
          @endforeach 

        </div>

    </div>

@endsection

