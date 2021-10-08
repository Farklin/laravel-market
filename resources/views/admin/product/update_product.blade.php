@extends('admin.layouts.home')
@section('title', 'Обновление товара')
@section('h1', 'Обновление товара')
@section('content')

    {{-- <div class="container">

        <div class="card p-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>

                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{ Form::model($product, ['route' => ['admin.product.update', $product->id], 'enctype' => 'multipart/form-data']) }}
            @include('admin.seo.form', $seo)

            {{ Form::label('title', 'Название') }}
            {{ Form::text('title', null, ['class' => 'form-control']) }}

            {{ Form::label('description', 'Описание') }}
            {{ Form::textarea('description', null, ['class' => 'form-control']) }}


            {{ Form::label('price', 'Цена') }}
            {{ Form::number('price', null, ['class' => 'form-control']) }}


            {{ Form::label('price', 'Старая цена') }}
            {{ Form::number('old_price', null, ['class' => 'form-control']) }}

            {{ Form::label('weight', 'Вес') }}
            {{ Form::number('weight', null, ['class' => 'form-control']) }}


            <div class='mt-2'>
                <h4> Выбор категории </h4>

                <div class="row">
                 
                    @foreach ($category as $cat)
                        
                        @if(in_array($cat->id, $select_index_category))
                            <div class="col-md-3">
                                {{ Form::label('category', $cat->title, ['id' => '', 'class' => '']) }}
                                {{ Form::checkbox('category[]', $cat->id,  True ) }}
                            </div>
                        @else
                            <div class="col-md-3">
                                {{ Form::label('category', $cat->title, ['id' => '', 'class' => '']) }}
                                {{ Form::checkbox('category[]', $cat->id,  False ) }}
                            </div>
                        @endif
              
                    @endforeach

                       
    
                </div>
            </div>






            <div class="form-group custom-file mt-5 d-flex">
                {{ Form::label('image', 'Изображение', ['id' => '', 'class' => 'custom-file-label']) }}
                {{ Form::file('image[]', ['id' => '', 'class' => 'custom-file-input', 'multiple' => '']) }}
            </div>

            {{ Form::submit('Сохранить', ['class' => 'btn btn-sm btn-primary']) }}

            {{ Form::close() }}

            @if (isset($product->images))
                <h2 class="mt-5"> Изображения товара </h2>
                <div class="row" id="images-product">

                    @foreach ($images as $image)
                        <div class="col-md-2">
                            <img height="100" src="{{ $image->image_path }}" alt="" srcset="">
                            <form action="{{ route('image_product_delete') }}" method="post">
                                @csrf
                                <input type="hidden" name='image_product_id' class="image-value" value={{ $image->id }}>
                                <button type="submit" class="btn-sm btn-danger">Удалить</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div> --}}



</div>

{{ Form::open(['route' => ['admin.product.update', $product->id], 'class' => 'row', 'enctype' => 'multipart/form-data']) }}
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





            


            {{ Form::text('title', '', ['id' => 'title', 'class' => 'form-control form-control-lg mb-3', 'placeholder' => 'Название товара']) }}

            <div id="editor-container" class="add-new-post__editor mb-1"></div>
            {{ Form::hidden('description', '', ['id' => 'description']) }}

            {{ Form::number('price', '', ['class' => 'form-control form-control-lg mb-3', 'placeholder' => 'Цена товара']) }}

            {{ Form::number('old_price', '', ['class' => 'form-control form-control-lg mb-3', 'placeholder' => 'Старая цена товара']) }}

            {{ Form::number('weight', '', ['class' => 'form-control form-control-lg mb-3', 'placeholder' => 'Вес']) }}

            <div class="custom-file d-flex ">
                {{ Form::label('image', 'Изображения', ['id' => '', 'class' => 'form-control-lg custom-file-label']) }}
                {{ Form::file('image[]', ['id' => '', 'class' => 'form-control-lg custom-file-input', 'multiple' => '']) }}
            </div>

         





            {{ Form::submit('Создать', ['onclick' => 'myFunction()', 'class' => 'btn btn-primary']) }}

            <script>
                function myFunction() {
                    document.getElementById('description').value = document.getElementById('editor-container').innerHTML;
                    document.getElementById('editor-container').innerHTML = '';
                }
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
            <h6 class="m-0">Actions</h6>
        </div>
        <div class='card-body p-0'>
            <ul class="list-group list-group-flush">
                <li class="list-group-item p-3">
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
                </li>
                <li class="list-group-item d-flex px-3">
                    <button class="btn btn-sm btn-outline-accent">
                        <i class="material-icons">save</i> Save Draft</button>
                    <button class="btn btn-sm btn-accent ml-auto">
                        <i class="material-icons">file_copy</i> Publish</button>
                </li>
            </ul>
        </div>
    </div>
    <!-- / Post Overview -->
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
                        {{ Form::checkbox('category[]', $cat->id, false, array('class' =>'custom-control-input', 'id'=>'category' . $cat->id)) }}
                        {{ Form::label('category' . $cat->id, $cat->title, array('for' => 'category'.$cat->id, 'class' => 'custom-control-label')) }}
                        

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
</div>
{{ Form::close() }}

@endsection



    
