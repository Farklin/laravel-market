@php 
    
if($status == 'create'){
    $request = 'admin.page.create'; 
    $h1 = 'Создание новай страницы'; 
    $title = 'Создание новай страницы'; 
}
elseif ($status == 'update') {
    $request = ['admin.page.update' , $page->id]; 
    $h1 = 'Изменение стараницы: ' . $page->title; 
    $title = 'Изменение стараницы: ' . $page->title; 

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

    <!-- Блок описания -->
    <div class="col-lg-9 col-md-12">
        <div class="card card-small mb-3">
            <div class="card-body">

                {{ Form::label('title', 'Название страницы', ['id' => '', 'class' => '']) }}
                {{ Form::text('title', $page->title, ['id' => 'title_page', 'class' => 'form-control form-control-lg mb-3']) }}


                {{ Form::label('description', 'Описание', ['id' => '', 'class' => '']) }}
                <div id="editor-container" class="add-new-post__editor mb-1"></div>
                {{ Form::hidden('content', $page->content, ['id' => 'description', 'class' => 'form-control']) }}

            </div>
        </div>
    </div>
    <!-- // Блок описания -->


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

    <!-- Боковой слайдер (правый) -->

{{ Form::close() }}

<!-- // Форма страницы -->



@section('scripts')
  
    <script src="{{ asset('theme/app/app-blog-new-post.1.1.0.js') }}"></script>
    <script src="http://SortableJS.github.io/Sortable/Sortable.js"></script>
@endsection 
@endsection