@php 
@extends('admin.layouts.home')
@section('title',  $title)
@section('h1',  $h1)
@section('content')
    <!-- Форма категории -->
    {{ Form::open(['route' => 'admin.slider.store', 'class' => 'row',  'id'=>'Form', 'enctype' => 'multipart/form-data']) }}
    <!-- Блок ошибок -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- // Блок ошибок -->
    <!-- Блок описания категории -->
    <div class="col-lg-9 col-md-12">
        <div class="card card-small mb-3">
            <div class="card-body">

                {{ Form::label('title', 'Название', ['id' => '', 'class' => '']) }}
                {{ Form::text('title', $slider->title, ['id' => 'title_slider', 'class' => 'form-control form-control-lg mb-3']) }}

                {{ Form::label('description', 'Описание', ['id' => '', 'class' => '']) }}
                {{ Form::text('description', $slider->description, ['id' => 'description_slider', 'class' => 'form-control form-control-lg mb-3']) }}

                {{ Form::label('price', 'Цена', ['id' => '', 'class' => '']) }}
                {{ Form::number('price', $slider->price, ['id' => 'price_slider', 'class' => 'form-control form-control-lg mb-3']) }}

                <div class="custom-file d-flex ">
                    {{ Form::label('image', 'Изображения', ['id' => '', 'class' => 'form-control-lg custom-file-label']) }}
                    {{ Form::file('image', ['id' => '', 'class' => 'form-control-lg custom-file-input']) }}
                </div>
               

            </div>
        </div>
    </div>
    <!-- // Блок описания категории -->


    <!-- Боковой слайдер (правый) -->
    <div class="col-lg-3 col-md-12">
        <!-- Статус страницы -->
        <div class='card card-small mb-3'>
            <div class="card-header border-bottom">
                <h6 class="m-0">Статус </h6>
            </div>

            <div class='card-body p-0'>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item px-3 pb-2">
                        <div class="custom-control custom-checkbox mb-1">
                            {{ Form::checkbox('status', true, $slider->status, ['id' => 'slider_status', 'class' => 'custom-control-input']) }}
                            {{ Form::label('slider_status', 'Опубликован', ['id' => '', 'class' => 'custom-control-label', 'for' => 'public']) }}
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- // Статусы страницы -->

        <!-- Кнопки управления  -->
        <div class='card card-small mb-3'>
            <div class="card-header border-bottom">
                <h6 class="m-0">Действие</h6>
            </div>
            <div class='card-body p-0'>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex px-3">
                        {{ Form::submit('Сохранить', ['class' => 'btn btn-sm btn-outline-accent']) }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- // КНопки управления -->


    </div>
    <!-- // Статус страницы -->


    </div>

    <!-- Боковой слайдер (правый) -->

    {{ Form::close() }}

    <!-- // Форма категории -->

    @section('scripts')
        <script src="{{ asset('theme/app/app-blog-new-post.1.1.0.js') }}"></script>
    @endsection







@endsection 