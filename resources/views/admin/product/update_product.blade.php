
@extends('layouts/app')
@section('title', 'Создание нового товара')
@section('content')

    <div class="container">

    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ Form::model($product, array('route' => array('product_update', $product->id))) }}

        {{ Form::label('title', 'Название') }}
        {{ Form::text('title') }}
        
        {{ Form::label('description','Описание') }}
        {{ Form::textarea('description') }}      


        {{ Form::label('price','Цена') }}
        {{ Form::number('price') }}     

        
        {{ Form::label('price','Старая цена') }}
        {{ Form::number('old_price') }}    
        
        {{ Form::label('weight','Вес') }}
        {{ Form::number('weight') }}    

        @if(isset($product->images))


        <h2 class="mt-5"> Изображения товара </h2> 
        <div class="row">

        @foreach ($product->images as $image)
            <div class="col-md-2">
                <img src="{{ $image->image_path }}" alt="" srcset="">
            </div>
        @endforeach 
        </div>
        @endif

        {{ Form::submit('Сохранить') }}

        {{ Form::close() }}

    </div>

@endsection

