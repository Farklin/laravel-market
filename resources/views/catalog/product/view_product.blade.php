
@extends('layouts/app')
@section('title', $product->title)
@section('content')

    <div class="container">

       <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
          <h1 class="display-4 font-weight-normal">{{$product->title}}</h1>
          <p class="lead font-weight-normal">{{$product->description}}</p>
          <a class="btn btn-outline-secondary" href="#">Coming soon</a>
        </div>
        <div class="product-device box-shadow d-none d-md-block"></div>
        <div class="product-device product-device-2 box-shadow d-none d-md-block"></div>
      </div>


    </div>

@endsection

