
@extends('admin.layouts.home')
@section('title', 'Создание нового товара')
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
            @foreach($category as $cat)
                {{ Form::label('category',$cat->title, array('id'=>'','class'=>'')) }}   
                {{ Form::checkbox('category[]', $cat->id, false) }} 
            @endforeach
        </div>  

             
        {{ Form::submit('Создать', array('class'=>'btn btn-primary')) }}
       
    </div>
    {{ Form::close() }}
    </div> --}}
    </div>




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
        
              
            


              {{ Form::open(array('route'=>'admin.product.create', 'class'=>'', 'enctype'=> "multipart/form-data")) }}
              
    
              {{ Form::text('title','',array('id'=>'title','class'=>'form-control form-control-lg mb-3', 'placeholder'=>'Название товара')) }}
      
              <div id="editor-container" class="add-new-post__editor mb-1"></div>
              {{ Form::hidden('description','',array('id'=>'description')) }}
    
              {{ Form::number('price','',array('class'=>'form-control form-control-lg mb-3', 'placeholder'=>'Цена товара')) }}
      
              {{ Form::number('old_price','',array('class'=>'form-control form-control-lg mb-3', 'placeholder'=>'Старая цена товара')) }}
      
              {{ Form::number('weight','',array('class'=>'form-control form-control-lg mb-3', 'placeholder'=>'Вес' )) }}
              
              <div class="custom-file d-flex mt-5">
                  {{ Form::label('image','Изображения',array('id'=>'','class'=>'custom-file-label')) }}
                  {{ Form::file('image[]',array('id'=>'','class'=>'custom-file-input', 'multiple' => '')) }}
              </div>
             
              @include('admin.seo.form')
      
             
              
      
              <div class='mt-2'> 
                  <h4> Выбор категории </h4> 
                  @foreach($category as $cat)
                      {{ Form::label('category',$cat->title, array('id'=>'','class'=>'')) }}   
                      {{ Form::checkbox('category[]', $cat->id, false) }} 
                  @endforeach
              </div>  
      
                   
              {{ Form::submit('Создать', array('onclick'=>'myFunction()', 'class'=>'btn btn-primary')) }}
             
              <script>



                function myFunction() {
                    document.getElementById('description').value=document.getElementById('editor-container').innerHTML;
                    document.getElementById('editor-container').innerHTML = '';
                }

            </script>
          {{ Form::close() }}


          </div>
        </div>
        <!-- / Add New Post Form -->
      </div>

@endsection

