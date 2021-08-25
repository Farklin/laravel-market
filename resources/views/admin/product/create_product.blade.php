
@extends('admin.layouts.home')
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

        <div class="card p-5">
        <h4> Создание нового товара </h4>
        
        {{ Form::open(array('route'=>'admin.product.create', 'class'=>'', 'enctype'=> "multipart/form-data")) }}
        {{ Form::label('title','Название товара',array('id'=>'','class'=>'')) }}
        {{ Form::text('title','',array('id'=>'','class'=>'form-control')) }}


        {{ Form::label('description','Описание',array('id'=>'','class'=>'')) }}
        {{ Form::textarea('description','',array('id'=>'','class'=>'form-control' )) }}


        {{ Form::label('price','Цена товара',array('id'=>'','class'=>'')) }}
        {{ Form::number('price','',array('id'=>'','class'=>'form-control')) }}

        
        {{ Form::label('old_price','Старая цена товара',array('id'=>'','class'=>'')) }}
        {{ Form::number('old_price','',array('id'=>'','class'=>'form-control')) }}

        {{ Form::label('weight','Вес',array('id'=>'','class'=>'')) }}
        {{ Form::number('weight','',array('id'=>'','class'=>'form-control' )) }}
        
        <div class="form-group d-flex mt-5">
            {{ Form::label('image','Изображение',array('id'=>'','class'=>'col-form-label')) }}
            {{ Form::file('image[]',array('id'=>'','class'=>'', 'multiple' => '')) }}
        </div>
       

       
        

        <div class='mt-2'> 
            <h4> Выбор категории </h4> 
            @foreach($category as $cat)
                {{ Form::label('category',$cat->title, array('id'=>'','class'=>'')) }}   
                {{ Form::checkbox('category[]', $cat->id, false) }} 
            @endforeach
        </div>  

             
        {{ Form::submit('Создать', array('class'=>'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
    </div>

@endsection

