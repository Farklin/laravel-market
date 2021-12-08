  <!-- Блок описания категории -->
  <div class="col-lg-9 col-md-12">
    <div class="card card-small mb-3">
        <div class="card-body">

            <label for="title">Название слайдера</label>
            <input type="text" name="title" value="{{$slider->title}}" class="form-control form-control-lg mb-3" id="title"> 

            <label for="description">Краткое описаание</label>
            <input type="text" name="description" value="{{$slider->description}}" class="form-control form-control-lg mb-3" id="description"> 

            <label for="price">Цена</label>
            <input type="number" name="price" value="{{$slider->price}}" class="form-control form-control-lg mb-3" id="price"> 

            <div class="custom-file d-flex ">
                <label for="image" class="form-control-lg custom-file-label">Изображение</label>
                <input type="file" value="{{asset($slider->image)}}" name="image" id="image" class="form-control-lg custom-file-input"> 
            </div>
         
            @isset($slider->image)
                <img class="mt-2" src="{{asset($slider->image)}}" height="200" alt>
            @endisset 

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
                        <input type="checkbox" name="status" id="status" class="custom-control-input" @if($slider->status) checked @endif>
                        <label for="status" class="custom-control-label">Опубликован</label>
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
