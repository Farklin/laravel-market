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
            <h4> Создание новой страницы </h4>


            @if (!isset($page))
                {{ Form::open(['route' => 'admin.page.create', 'class' => '', 'enctype' => 'multipart/form-data']) }}
                @include('admin.seo.form')

                <div class="card p-3 mt-3">

                    {{ Form::label('title', 'Название страницы', ['id' => '', 'class' => '']) }}
                    {{ Form::text('title', '', ['id' => '', 'class' => 'form-control']) }}


                    {{ Form::label('content', 'Содержание', ['id' => '', 'class' => '']) }}
                    {{ Form::textarea('content', '', ['id' => '', 'class' => 'form-control']) }}


                    <div class='mt-2'>
                        <h4> Выбор родителя</h4>
                        {{-- @foreach ($category as $cat)
                    {{ Form::label('category',$cat->title, array('id'=>'','class'=>'')) }}   
                    {{ Form::checkbox('category[]', $cat->id, false) }} 
                @endforeach --}}
                    </div>



                    {{ Form::submit('Создать', ['class' => 'btn btn-primary']) }}
                    {{ Form::close() }}
                @else

                    
                    {{ Form::model($page, ['route' => ['admin.page.update', $page->id], 'enctype' => 'multipart/form-data']) }}
                    @include('admin.seo.form', $seo)

                    {{ Form::label('title', 'Название страницы', ['id' => '', 'class' => '']) }}
                    {{ Form::text('title', null, ['id' => '', 'class' => 'form-control']) }}


                    {{ Form::label('content', 'Содержание', ['id' => '', 'class' => '']) }}
                    {{ Form::textarea('content', null, ['id' => '', 'class' => 'form-control']) }}  


                    <div class='mt-2'>
                        <h4> Выбор родителя</h4>
                        {{-- @foreach ($category as $cat)
                    {{ Form::label('category',$cat->title, array('id'=>'','class'=>'')) }}   
                    {{ Form::checkbox('category[]', $cat->id, false) }} 
                @endforeach --}}
                    </div>



                    {{ Form::submit('Обновить', ['class' => 'btn btn-primary']) }}
                    {{ Form::close() }}
            @endif
        </div>

    </div>
    </div>

@endsection
