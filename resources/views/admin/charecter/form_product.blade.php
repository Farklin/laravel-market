<div class="card-header border-bottom charecters">
    <h6 class="mt-5"> Характеристики </h6>
    
    <div class="row charecter">
        @if(count($product->charecters) > 0)
            @foreach($product->charecters as $product_char)
                <div class="col-6 col-md-6 mb-2">
                    <select name='charecter_id[]' class='form-control'>
                        
                        <option value="0">Характеристики</option>
                        @foreach ($charecters as $charecter)
                            <option @if($product_char->id == $charecter->id) selected @endif value="{{ $charecter->id }}">{{ $charecter->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 col-md-6">
                    {{ Form::text('charecter_value[]',  $product_char->value , ['id'=>'', 'class' => 'form-control']) }}
                </div>
            
            @endforeach 
        @else
            <div class="col-6 col-md-6 mb-2">
                <select name='charecter_id[]' class='form-control'>
                    <option value="0">Характеристики</option>
                    @foreach ($charecters as $charecter)
                        <option value="{{ $charecter->id }}">{{ $charecter->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6 col-md-6">
                {{ Form::text('charecter_value[]',  '' , ['id'=>'', 'class' => 'form-control']) }}
            </div>
        @endif 

      
    </div>
    <button type="button" class="btn btn-sm btn-outline-accent add-charecter" onclick="cloneCharecter()">
        <i class="fa fa-plus-circle"></i> Добавить 
    </button>

</div>

