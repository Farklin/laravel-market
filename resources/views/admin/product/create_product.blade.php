
@php 
if($status == 'create'){
    $request = 'admin.product.create'; 
    $h1 = 'Создание нового товара'; 
    $title = 'Создание нового товара'; 
}
elseif ($status == 'update') {
    $request = ['admin.product.update' , $product->id]; 
    $h1 = 'Изменение товара'; 
    $title = 'Изменение товара'; 

}      

@endphp


@extends('admin.layouts.home')
@section('title', $title)
@section('h1', $h1)
@section('content')





    {{-- <div class="">

    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
        <h4> Создание нового товара </h4>
        
        
        
        {{ Form::open(array('route'=>'admin.product.create', 'class'=>'', 'enctype'=> "multipart/form-data")) }}
        @include('admin.seo.form')

        <div class="card p-3 mt-3">
            <h4>Описание товара </h4>
        {{ Form::label('title','Название товара',array('id'=>'','class'=>'')) }}
        {{ Form::text('title','',array('id'=>'title','class'=>'form-control')) }}


        {{ Form::label('description','Описание',array('id'=>'','class'=>'')) }}
        {{ Form::textarea('description','',array('id'=>'description','class'=>'form-control' )) }}


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
            @foreach ($category as $cat)
                {{ Form::label('category',$cat->title, array('id'=>'','class'=>'')) }}   
                {{ Form::checkbox('category[]', $cat->id, false) }} 
            @endforeach
        </div>  

             
        {{ Form::submit('Создать', array('class'=>'btn btn-primary')) }}
       
    </div>
    {{ Form::close() }}
    </div> --}}

    </div>


    {{ Form::open(['route' => $request, 'class' => 'row', 'id'=>'productForm', 'enctype' => 'multipart/form-data']) }}
    <div class="col-lg-9 col-md-12">



        <!-- Add New Post Form -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>

                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card card-small mb-3">
            <div class="card-body">





                


                {{ Form::text('title', $product->title, ['id' => 'title', 'class' => 'form-control form-control-lg mb-3', 'placeholder' => 'Название товара']) }}

                <div id="editor-container" class="add-new-post__editor mb-1"></div>
                {{ Form::hidden('description', $product->description, ['id' => 'description']) }}

                {{ Form::number('price', $product->price, ['class' => 'form-control form-control-lg mb-3', 'placeholder' => 'Цена товара']) }}

                {{ Form::number('old_price', $product->old_price, ['class' => 'form-control form-control-lg mb-3', 'placeholder' => 'Старая цена товара']) }}

                {{ Form::number('weight', $product->weight, ['class' => 'form-control form-control-lg mb-3', 'placeholder' => 'Вес']) }}

                <div class="custom-file d-flex ">
                    {{ Form::label('image', 'Изображения', ['id' => '', 'class' => 'form-control-lg custom-file-label']) }}
                    {{ Form::file('image[]', ['id' => '', 'class' => 'form-control-lg custom-file-input', 'multiple' => '']) }}
                </div>

             

                @if (isset($product->images))
                <div class="card-header border-bottom">
                    <h6 class="mt-5"> Изображения товара</h6>
                </div>
                   
                    <div class="row" id="images-product">

                        @foreach ($images as $image)
                            <div class="col-md-2">
                                <img height="100" name="images" src="{{ $image->image_path }}" alt="" srcset="">
                                <a type="submit" href="{{ route('image_product_delete', $image->id) }}" class="btn-sm btn-danger">Удалить</a>                            
                            </div>
                        @endforeach
                    </div>
                @endif



              

                <script>
                 
                </script>
            


            </div>
        </div>
        <!-- / Add New Post Form -->

    </div>

    <div class="col-lg-3 col-md-12">
        <div class='card card-small mb-3'>
            <div class="card-header border-bottom">
                <h6 class="m-0">SEO </h6>
            </div>
            <div class='card-body p-0'>
                @include('admin.seo.form')
            </div>
        </div>

        
        <!-- Post Overview -->
        <div class='card card-small mb-3'>
            <div class="card-header border-bottom">
                <h6 class="m-0">Категории</h6>
            </div>
            <div class='card-body p-0'>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item px-3 pb-2">
                        @foreach ($category as $cat)
                        <div class="custom-control custom-checkbox mb-1">
                            @php
                                if(empty($select_index_category)){
                                    $select_index_category = []; 
                                }
                                
                                $flag = in_array($cat->id, $select_index_category); 

                            @endphp 
                            {{ Form::checkbox('category[]', $cat->id, $flag, ['class' => 'custom-control-input', 'id' => 'category' . $cat->id]) }}
                            {{ Form::label('category' . $cat->id, $cat->title, ['for' => 'category' . $cat->id, 'class' => 'custom-control-label']) }}
                        </div>
                        @endforeach
                    </li>
                    {{-- <li class="list-group-item d-flex px-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="New category"
                                aria-label="Add new category" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-white px-2" type="button">
                                    <i class="material-icons">add</i>
                                </button>
                            </div>
                        </div>
                    </li> --}}
                </ul>
            </div>
        </div>
        <!-- / Post Overview -->

        <!-- Post Overview -->
        <div class='card card-small mb-3'>
            <div class="card-header border-bottom">
                <h6 class="m-0">Действие</h6>
            </div>
            <div class='card-body p-0'>
                <ul class="list-group list-group-flush">
                    {{--  <li class="list-group-item p-3">
                       <span class="d-flex mb-2">
                            <i class="material-icons mr-1">flag</i>
                            <strong class="mr-1">Status:</strong> Draft
                            <a class="ml-auto" href="#">Edit</a>
                        </span>
                        <span class="d-flex mb-2">
                            <i class="material-icons mr-1">visibility</i>
                            <strong class="mr-1">Visibility:</strong>
                            <strong class="text-success">Public</strong>
                            <a class="ml-auto" href="#">Edit</a>
                        </span>
                        <span class="d-flex mb-2">
                            <i class="material-icons mr-1">calendar_today</i>
                            <strong class="mr-1">Schedule:</strong> Now
                            <a class="ml-auto" href="#">Edit</a>
                        </span>
                        <span class="d-flex">
                            <i class="material-icons mr-1">score</i>
                            <strong class="mr-1">Readability:</strong>
                            <strong class="text-warning">Ok</strong>
                        </span> 
                    </li>--}}
                    <li class="list-group-item d-flex px-3">
                        {{ Form::submit('Сохранить', ['onclick' => 'myFunction()', 'class' => 'btn btn-sm btn-outline-accent']) }}
                    </li>
                </ul>
            </div>
        </div>
        <!-- / Post Overview -->

    </div>
    {{ Form::close() }}



@endsection
