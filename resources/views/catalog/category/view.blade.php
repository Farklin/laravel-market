
@extends('layouts/app')
@section('title', $category->title)
@section('content')

    <div class="container mt-5">

        <h1> {{ $category->title }} </h1> 
        <div class="card-columns">

        @foreach($products as $product)
            
            @include('catalog/product/card_product', ['product'=>$product])
        
          @endforeach 

        </div>

        <div class="content"> 
            {{ $category->description }}
        </div> 

    </div>

@endsection

