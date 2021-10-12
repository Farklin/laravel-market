@php 
    
if($status == 'create'){
    $request = 'admin.category.create'; 
    $h1 = 'Создание новой категории товаров'; 
    $title = 'Создание новой категории товаров'; 
}
elseif ($status == 'update') {
    $request = ['admin.category.update' , $category->id]; 
    $h1 = 'Изменение категории товаров'; 
    $title = 'Изменение категории товаров'; 

}      
@endphp 



@extends('admin.layouts.home')
@section('title',  $title)
@section('h1',  $h1)

@section('content')


    </div>

    
 


    <!-- Форма категории -->

    {{ Form::open(['route' => $request, 'class' => 'row',  'id'=>'Form', 'enctype' => 'multipart/form-data']) }}

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

                {{ Form::label('title', 'Название категории', ['id' => '', 'class' => '']) }}
                {{ Form::text('title', $category->title, ['id' => 'title_category', 'class' => 'form-control form-control-lg mb-3']) }}


                {{ Form::label('description', 'Описание', ['id' => '', 'class' => '']) }}
                <div id="editor-container" class="add-new-post__editor mb-1"></div>
                {{ Form::hidden('description', $category->description, ['id' => 'description', 'class' => 'form-control']) }}

                <!-- Выбор родительской категории --> 
                <div class="form-group mt-3"> 
                    <select name='category_id' class='form-control'>
                        <option value="0">Родительская категория</option>
                        @foreach ($categories as $cat)
                            <option @if($category->category_id == $cat->id) selected @endif value="{{ $cat->id }}">{{ $cat->title }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- // Выбор родительской категории --> 


            </div>
        </div>
    </div>
    <!-- // Блок описания категории -->


    <!-- Боковой слайдер (правый) -->
    <div class="col-lg-3 col-md-12">
        <!-- Сео теги -->
        <div class='card card-small mb-3'>
            <div class="card-header border-bottom">
                <h6 class="m-0">SEO </h6>
            </div>
            <div class='card-body p-0'>
                @include('admin.seo.form')
            </div>
        </div>
        <!-- // Сео теги -->

        <!-- Статус страницы -->
        <div class='card card-small mb-3'>
            <div class="card-header border-bottom">
                <h6 class="m-0">Статус </h6>
            </div>

            <div class='card-body p-0'>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item px-3 pb-2">
                        <div class="custom-control custom-checkbox mb-1">

                            {{ Form::checkbox('public', 'true', $category->public, ['id' => 'public', 'class' => 'custom-control-input']) }}
                            {{ Form::label('public', 'Опубликован', ['id' => '', 'class' => 'custom-control-label', 'for' => 'public']) }}
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                            {{ Form::checkbox('display_main_page', 'true', $category->display_main_page, ['id' => 'display_main_page', 'class' => 'custom-control-input']) }}
                            {{ Form::label('display_main_page', 'Отображение на главной странице', ['id' => '', 'class' => 'custom-control-label', 'for' => 'display_main_page']) }}
                        </div>
                        <div class="custom-control custom-checkbox mb-1">

                            {{ Form::checkbox('display_sidebar', 'true', $category->display_sidebar, ['id' => 'display_sidebar', 'class' => 'custom-control-input']) }}
                            {{ Form::label('display_sidebar', 'Отображение в сайдбаре', ['id' => '', 'class' => 'custom-control-label', 'for' => 'display_sidebar']) }}
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



















    {{-- <div class="container">

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

            <select name='category_id' class='form-control'>
                <option value="0">Не выбрана</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                @endforeach
            </select>


            {{ Form::submit('Создать', ['class' => 'btn-sm btn-primary']) }}
            {{ Form::close() }}
        @else



            {{ Form::model($category, ['route' => ['admin.category.update', $category->id], 'enctype' => 'multipart/form-data']) }}

            @include('admin.seo.form', $seo);


            {{ Form::label('title', 'Название категории', ['id' => '', 'class' => '']) }}
            {{ Form::text('title', null, ['id' => '', 'class' => 'form-control']) }}



            {{ Form::label('description', 'Описание', ['id' => '', 'class' => '']) }}
            {{ Form::textarea('description', null, ['id' => '', 'class' => 'form-control']) }}


            <div class="form-group">
                {{ Form::label('public', 'Опубликован', ['id' => '', 'class' => '']) }}
                {{ Form::checkbox('public', 'true', null) }} <br>

                {{ Form::label('display_main_page', 'Отображение на главной странице') }}
                {{ Form::checkbox('display_main_page', 'true', null) }}<br>

                {{ Form::label('display_sidebar', 'Отображение в сайдбаре', ['id' => '', 'class' => '']) }}
                {{ Form::checkbox('display_sidebar', 'true', null) }}<br>

            </div>


            <select name='category_id' class='form-control'>
                <option value="0">Не выбрана</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" @if ($cat->id == $category->category_id)
                        selected
                @endif
                >{{ $cat->title }}</option>
        @endforeach
        </select>



        {{ Form::submit('Обновить', ['class' => 'btn-sm btn-primary']) }}
        {{ Form::close() }}

        @endif
    </div> --}}

@endsection
