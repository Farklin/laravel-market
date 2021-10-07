@extends('admin.layouts.home')
@section('title', 'Все товары')
@section('h1', 'Товары магазина')

@section('content')

  
        <div class=" row">
        <div class="col-md-4">
            <a class="btn btn-sm btn-primary btn-pill" href="{{ route('admin.product.form.create') }}"> <i
                    class="fa fa-plus"></i> Создать </a>
        </div>
        <div class="col-md-4 d-none d-md-block">
            <a class="btn btn-sm btn-primary btn-pill" href="{{ route('admin.product.export') }}"> <i
                    class="fa fa-download"></i> Экспорт товаров</a>
        </div>

        <div class="col-md-4 d-none d-md-block">
            <a class="btn btn-sm btn-primary btn-pill" href="{{ route('admin.product.import') }}"> <i
                    class="fa fa-download"></i> Импорт товаров</a>
        </div>


    </div>

    {{-- <table class="table table-bordered">
        <tbody>
            @foreach ($products as $product)
                <tr class="table">
                    <td>
                        <a href="{{ route('admin.product.form.update', $product->id) }}">
                            @if ($product->images->first() != null)
                                <img src="{{ $product->images->first()->thumbnail() }}" width='85' alt="">
                            @endif
                        </a>
                    </td>


                    <td>
                        {{ $product->title }}
                        <br>
                        <a class="d-md-none" href='{{ route('admin.product.form.update', $product->id) }}'><i
                                class="fa fa-edit"></i>Изменить</a>
                    </td>
                    <td class="d-none d-sm-block d-md-none">
                        {{ $product->price }}
                    </td>
                    <td class="d-none d-md-block">
                        <a href='{{ route('admin.product.form.update', $product->id) }}'>Изменить</a>
                    </td>
                    <td class="d-none d-md-block">
                        <a class="text-danger" href='{{ route('admin.product.delete', $product->id) }}'>Удалить</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}


    <div class="row my-5">

  
    @foreach($products as $product)
    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
        <div class="card card-small card-post card-post--1">
            <a href="{{ route('admin.product.form.update', $product->id) }}"> 
            <div class="card-post__image" style="background-image: url('{{ $product->images[0]->thumbnail() }} ');">
                <a href="#" class="card-post__category badge badge-pill badge-dark">Мыло</a>
                <div class="card-post__author d-flex">
                    <a href="#" class="card-post__author-avatar card-post__author-avatar--small"
                        style="background-image: url('')"></a>
                </div>
            </div>
            </a>
            <div class="card-body">
                <h5 class="card-title">
                    <a class="text-fiord-blue" href="{{ route('admin.product.form.update', $product->id) }}">{{ $product->title }}</a>
                </h5>
                <p class="card-text d-inline-block mb-3">{{ $product->description }}</p>
                <span class="text-muted">{{ $product->updated_at }}</span>
                <div class="blog-comments__actions">
                    <div class="btn-group btn-group-sm row">
            
                        <a href="{{ route('admin.product.form.update', $product->id) }}" type="button" class="btn btn-white text-dark">
                            <span class="text-light">
                                <i class="fa fa-edit"> </i>
                            </span> Изменить </a>
                        <a href="{{ route('admin.product.delete', $product->id) }}" onclick="return confirm('Удалить товар {{$product->title}} ')" type="button" href="" class="btn btn-white">
                            <span class="text-danger">
                                <i class="fa fa-trash"> </i>
                            </span> Удалить </a>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
    @endforeach
</div>

@endsection
