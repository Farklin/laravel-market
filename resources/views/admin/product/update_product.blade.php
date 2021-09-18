@extends('admin.layouts.home')
@section('title', 'Создание нового товара')
@section('content')

    <div class="container">

        <div class="card p-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>

                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{ Form::model($product, ['route' => ['admin.product.update', $product->id], 'enctype' => 'multipart/form-data']) }}
            @include('admin.seo.form', $seo)

            {{ Form::label('title', 'Название') }}
            {{ Form::text('title', null, ['class' => 'form-control']) }}

            {{ Form::label('description', 'Описание') }}
            {{ Form::textarea('description', null, ['class' => 'form-control']) }}


            {{ Form::label('price', 'Цена') }}
            {{ Form::number('price', null, ['class' => 'form-control']) }}


            {{ Form::label('price', 'Старая цена') }}
            {{ Form::number('old_price', null, ['class' => 'form-control']) }}

            {{ Form::label('weight', 'Вес') }}
            {{ Form::number('weight', null, ['class' => 'form-control']) }}


            <div class='mt-2'>
                <h4> Выбор категории </h4>

                <div class="row">
                    @foreach($select_index_category as $cat)
                        {{$cat}}
                    @endforeach 
                    @foreach ($category as $cat)
                        
                        @if(in_array($cat->id, $select_index_category))
                            <div class="col-md-3">
                                {{ Form::label('category', $cat->title, ['id' => '', 'class' => '']) }}
                                {{ Form::checkbox('category[]', $cat->id,  True ) }}
                            </div>
                        @else
                            <div class="col-md-3">
                                {{ Form::label('category', $cat->title, ['id' => '', 'class' => '']) }}
                                {{ Form::checkbox('category[]', $cat->id,  False ) }}
                            </div>
                        @endif
              
                    @endforeach

                       
    
                </div>
            </div>






            <div class="form-group mt-5 d-flex">
                {{ Form::label('image', 'Изображение', ['id' => '', 'class' => '']) }}
                {{ Form::file('image[]', ['id' => '', 'class' => '', 'multiple' => '']) }}
            </div>

            {{ Form::submit('Сохранить', ['class' => 'btn-sm btn-primary']) }}

            {{ Form::close() }}

            @if (isset($product->images))
                <h2 class="mt-5"> Изображения товара </h2>
                <div class="row">

                    @foreach ($product->images as $image)
                        <div class="col-md-2">
                            <img height="100" src="{{ $image->image_path }}" alt="" srcset="">
                            <form action="{{ route('image_product_delete') }}" method="post">
                                @csrf
                                <input type="hidden" name='image_product_id' value={{ $image->id }}>
                                <button type="submit" class="btn-sm btn-danger">Удалить</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>

@endsection
