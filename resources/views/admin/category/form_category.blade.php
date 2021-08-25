

@extends('admin.layouts.home')
@section('title', 'Создание новой категории')
@section('content')

    <div class="container">

    <h4>Создание новой категории</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{ Form::open(array('route'=>'admin.category.form.create', 'class'=>'', 'enctype'=> "multipart/form-data")) }}
        {{ Form::label('title','Название категории',array('id'=>'','class'=>'')) }}
        {{ Form::text('title','',array('id'=>'','class'=>'form-control')) }}


        {{ Form::label('description','Описание',array('id'=>'','class'=>'')) }}
        {{ Form::textarea('description','',array('id'=>'','class'=>'form-control' )) }}


        <div class="form-group">
        {{ Form::label('public','Опубликован',array('id'=>'','class'=>'')) }}
        {{ Form::checkbox('public','true',false) }} <br> 
     
        {{ Form::label('display_main_page','Отображение на главной странице',) }}
        {{ Form::checkbox('display_main_page','true',false, ) }}<br> 

        {{ Form::label('display_sidebar','Отображение в сайдбаре',array('id'=>'','class'=>'')) }}
        {{ Form::checkbox('display_sidebar','true',false) }}<br> 

        </div>
        


             
        {{ Form::submit('Создать', array('class'=>'btn btn-primary')) }}
        {{ Form::close() }}

    </div>

@endsection

