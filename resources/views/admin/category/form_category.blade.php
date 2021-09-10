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

        @if (!isset($category))


            {{ Form::open(['route' => 'admin.category.form.create', 'class' => '', 'enctype' => 'multipart/form-data']) }}

            @include('admin.seo.form'); 

            {{ Form::label('title', 'Название категории', ['id' => '', 'class' => '']) }}
            {{ Form::text('title', '', ['id' => '', 'class' => 'form-control']) }}


            {{ Form::label('description', 'Описание', ['id' => '', 'class' => '']) }}
            {{ Form::textarea('description', '', ['id' => '', 'class' => 'form-control']) }}


            <div class="form-group">
                {{ Form::label('public', 'Опубликован', ['id' => '', 'class' => '']) }}
                {{ Form::checkbox('public', 'true', false) }} <br>

                {{ Form::label('display_main_page', 'Отображение на главной странице') }}
                {{ Form::checkbox('display_main_page', 'true', false) }}<br>

                {{ Form::label('display_sidebar', 'Отображение в сайдбаре', ['id' => '', 'class' => '']) }}
                {{ Form::checkbox('display_sidebar', 'true', false) }}<br>

            </div>

            <select name='category_id' class = 'form-control'>
                <option value="0">Не выбрана</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{$cat->title}}</option>
                @endforeach
            </select> 


            {{ Form::submit('Создать', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
        @else

            

            {{ Form::model($category, ['route' => ['admin.category.update', $category->id], 'enctype' => 'multipart/form-data']) }}

            @include('admin.seo.form', $seo); 

            
            {{ Form::label('title', 'Название категории', ['id' => '', 'class' => '']) }}
            {{ Form::text('title', null, ['id' => '', 'class' => 'form-control']) }}



            {{ Form::label('description', 'Описание', ['id' => '', 'class' => '']) }}
            {{ Form::textarea('description', null , ['id' => '', 'class' => 'form-control']) }}


            <div class="form-group">
                {{ Form::label('public', 'Опубликован', ['id' => '', 'class' => '']) }}
                {{ Form::checkbox('public', 'true', null) }} <br>

                {{ Form::label('display_main_page', 'Отображение на главной странице') }}
                {{ Form::checkbox('display_main_page', 'true', null) }}<br>

                {{ Form::label('display_sidebar', 'Отображение в сайдбаре', ['id' => '', 'class' => '']) }}
                {{ Form::checkbox('display_sidebar', 'true', null) }}<br>

            </div>

           
            <select name='category_id' class = 'form-control'>
                <option value="0">Не выбрана</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" 
                    @if($cat->id == $category->category_id)
                        selected
                    @endif
                    >{{$cat->title}}</option>
                @endforeach
            </select> 



            {{ Form::submit('Обновить', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}

        @endif
    </div>

@endsection
