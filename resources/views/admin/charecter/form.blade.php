@php 
    
if($status == 'create'){
    $request = 'admin.charecter.create'; 
    $h1 = 'Создание характеристики';
    $title = 'Создание характеристики'; 
}
elseif ($status == 'update') {
    $request = ['admin.charecter.update' , $charecter->id]; 
    $h1 = 'Изменение характеристики'; 
    $title = 'Изменение характеристики'; 

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
                
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="price">Сортировка</label>
                        {{ Form::number('sorting', $charecter->sorting, ['class' => 'form-control',  'placeholder' => 'Сортировка']) }}

                    </div>
                    <div class="col-12 col-md-6">
                        <label for="">Группа</label>

                        <select name='charecter_group_id' class='form-control'>
                            <option class="form-control" value="0">Группа</option>
                            @foreach ($charecter_group as $group)
                                <option @if($charecter->charecter_group_id == $group->id) selected @endif value="{{ $group->id }}">{{ $group->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
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