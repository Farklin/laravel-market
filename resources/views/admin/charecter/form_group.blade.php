@php 
    
if($status == 'create'){
    $request = 'admin.charecter.group.create'; 
    $h1 = 'Создание группы характеристик';
    $title = 'Создание группы характеристик'; 
}
elseif ($status == 'update') {
    $request = ['admin.charecter.group.update' , $charecter->id]; 
    $h1 = 'Изменение группы характеристик'; 
    $title = 'Изменение группы характеристик'; 

}      
@endphp 



@extends('admin.layouts.home')
@section('title',  $title)
@section('h1',  $h1)

@section('content')


    <!-- Форма категории -->

    {{ Form::open(['route' => $request, 'class' => 'row',  'id'=>'Form', 'enctype' => 'multipart/form-data']) }}

    <!-- Блок ошибок -->

    @if ($errors->any())
        <div class="col-12 col-md-12 alert alert-danger">
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
                <label for="price">Название</label>
                {{ Form::text('title', $charecter->title, ['id' => 'title_product', 'class' => 'form-control form-control-lg mb-3', 'placeholder' => 'Название']) }}
                
         
                <label for="price">Сортировка</label>
                {{ Form::number('sorting', $charecter->sorting, ['class' => 'form-control',  'placeholder' => 'Сортировка']) }}
                
            </div>
        </div>
    </div>
    <!-- // Блок описания категории -->


    <!-- Боковой слайдер (правый) -->
    <div class="col-lg-3 col-md-12">
    
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

    <!-- // Форма категории -->

    @section('scripts')
        <script src="{{ asset('theme/app/app-blog-new-post.1.1.0.js') }}"></script>
    @endsection







@endsection 