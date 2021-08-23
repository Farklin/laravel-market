
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

        {{ Form::model($product, array('route' => array('product_update', $product->id), 'enctype'=> "multipart/form-data")) }}

        {{ Form::label('title', 'Название') }}
        {{ Form::text('title', null, array('class'=>'form-control')) }}
        
        {{ Form::label('description','Описание') }}
        {{ Form::textarea('description', null, array('class'=>'form-control')) }}      


        {{ Form::label('price','Цена') }}
        {{ Form::number('price', null, array('class'=>'form-control')) }}     

        
        {{ Form::label('price','Старая цена') }}
        {{ Form::number('old_price', null, array('class'=>'form-control')) }}    
        
        {{ Form::label('weight','Вес') }}
        {{ Form::number('weight', null, array('class'=>'form-control')) }}    
        
        
        <div class='mt-2'> 
            <h4> Выбор категории </h4> 

            @foreach($category as $cat)
                @php  $checked = false @endphp 
                @foreach($product->categories as $select_category)
                    {{-- проверяем есть ли категория в выбранных --}}
                    @if($cat->id == $select_category->id)
                        @php $checked = true @endphp 
                    @else
                        @php  $checked = false @endphp 
                    @endif 

                @endforeach

                {{ Form::label('category',$cat->title, array('id'=>'','class'=>'')) }}   
                {{ Form::checkbox('category[]', $cat->id, $checked) }} 

            @endforeach
        </div>  
        
        @if(isset($product->images))


       
        
        {{ Form::label('image','Изображение',array('id'=>'','class'=>'')) }}
        {{ Form::file('image[]',array('id'=>'','class'=>'form-control', 'multiple' => '')) }}


        {{ Form::submit('Сохранить') }}

        {{ Form::close() }}


        <h2 class="mt-5"> Изображения товара </h2> 
        <div class="row">

        @foreach ($product->images as $image)
            <div class="col-md-2">
                <img src="{{ $image->image_path }}" alt="" srcset="">
                <form action="{{route('image_product_delete')}}" method="post" > 
                    @csrf
                    <input type="hidden" name='image_product_id' value = {{ $image->id }}>
                    <button type="submit" class="btn-sm btn-danger">Удалить</button> 
                </form>
            </div>
        @endforeach 
        </div>
        @endif

    </div>

@endsection

