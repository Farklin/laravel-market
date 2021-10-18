<div class="card-header border-bottom">
    <h6 class="mt-5"> Характеристики </h6>
    
    <div class="row charecters">
        @if(count($product->charecters) > 0)
            @foreach($product->charecters as $product_char)
              @include('admin.charecter.form_product_charecter')
            @endforeach 
        @else
            @include('admin.charecter.form_product_charecter')
        @endif 

      
    </div>
    <button type="button" class="btn btn-sm btn-outline-accent add-charecter" onclick="cloneCharecter()">
        <i class="fa fa-plus-circle"></i> Добавить 
    </button>

</div>

