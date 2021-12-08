  <!-- Блок описания категории -->
  <div class="col-lg-9 col-md-12">
    <div class="card card-small mb-3">
        <div class="card-body">

            <label for="title">Название</label>
            <input type="text" name="title" value="{{$actual->title}}" class="form-control form-control-lg mb-3" id="title"> 

            <label for="description">Описание</label>
            <input type="text" name="description" value="{{$actual->description}}" class="form-control form-control-lg mb-3" id="description"> 

            <div class="row">
                <div id="products-input">
                    @if(isset($actualProducts))
                        @foreach($actualProducts as $product)
                            <input type="hidden" name="products[]" value="{{$product->id}}">
                        @endforeach
                    @endif
                </div> 
                <div class="col-md-6 col-sm-12">
                    <div>
                        <strong class="text-muted d-block my-2">Переместите товары</strong>
                    </div>
                    <div id="product" class="card card-small row mb-3 p-2">
                        @if(isset($actualProducts))
                            @foreach($actualProducts as $product)
                                <div id="{{$product->id}}" class="mb-2 btn btn-danger mr-2 filter-product-item">{{$product->title}}</div>
                            @endforeach
                        @endif 
                        <div class="text-center">
                            <i class="fa fa-plus"></i>
                        </div>
                    </div>        
                </div>
                <div class="col-md-6 col-sm-12">
                    <div id="filter-product">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">@</span>
                            </div>
                            <input type="text" id="search-filter-product" class="form-control" placeholder="Поиск товаров" aria-label="Username" aria-describedby="basic-addon1"> 
                        </div>
                        @if(isset($products))
                            @foreach($products as $product)
                                <div id="{{$product->id}}" class="mb-2 btn btn-danger mr-2 filter-product-item">{{$product->title}}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
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
                        <input type="checkbox" name="status" id="status" class="custom-control-input" @if($actual->status) checked @endif>
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
<style>

.hidden
{
    display: none; 
}

</style>

@section('scripts')
<script src="{{ asset('theme/app/app-blog-new-post.1.1.0.js') }}"></script>
<script src="https://SortableJS.github.io/Sortable/Sortable.js"></script>
<script>
    // Отправка формы
    var products = []; 

    // $('#form-actual').on('submit', (e) => {
    //     e.preventDefault();
    //     var action = $('#form-actual').attr('action'); 
    //     var title = $('#title').val();
    //     var description = $('#description').val();
    //     var status = $('#status').is(':checked');
    
    //     ajaxForm(action, title, description, status, products); 
    // });


    // function ajaxForm(action, title, description, status, products) { 
    //         $.ajax({
    //             method: "POST",
    //             url: action,
    //             data: {
    //                 title: title,
    //                 description: description,
    //                 status: status, 
    //                 products: products, 
    //             },
    //             headers: {
    //                 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    //             },
    //             success: function(data) {
    //             },

    //         });
    //     }

    // конец отправки формы 

    //Фильтрация товаров
    $('#search-filter-product').keyup(function(){
        target = $(this).val(); 
        filterSearchProduct(target);

    }); 
    
    function filterSearchProduct(target){
        $('#filter-product .filter-product-item').each(function(index) {
        var str = $(this).text().toLowerCase();
        if (str.indexOf(target.toLowerCase()) == -1) {
            $(this).addClass("hidden");
        }else{
            $(this).removeClass("hidden");
        }
        });
    }
    // Конец фильтрация товаров 

     // Сортировка для товаров по группам 

    function AddOrRemoveInputProducts()
    {
        $("#products-input").html(''); 
            $('#product .filter-product-item').each(function(){
            $("#products-input").append('<input type="hidden" name="products[]" value="'+$(this).attr('id')+'"> '); 
            }); 
    }
     var filter_product = document.getElementById('filter-product');
     var product_containet = document.getElementById('product')

        Sortable.create( product_containet , { 
        group: 'product', 
        animation : 300 , 
        ghostClass : 'blue-background-class',
        onAdd: function(){
            AddOrRemoveInputProducts(); 
        }, 
        onRemove: function(){
            AddOrRemoveInputProducts(); 
        } 
        });    
        
        Sortable.create( filter_product , { 
        group: 'product', 
        animation : 300 , 
        ghostClass : 'blue-background-class',
        });    

    // Конец сортировка для товаров по группам 

</script>
@endsection