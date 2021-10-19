<div class="col-12 col-md-12 charecter mb-2">
    <div class="row">
        <div class="col-6 col-md-4">
            <select name='charecter_id[]' class='form-control'>
    
                @foreach ($charecters as $charecter)
                   
                    @php 
                        $selected = ''; 
                        if(isset($product_char))
                        {   
                            if($product_char->charecter_id == $charecter->id){
                                $selected = 'selected'; 
                                
                            }
                        }
                
                    @endphp 
                 
                <option {!! $selected !!} value="{{ $charecter->id }}">{{ $charecter->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-6 col-md-6">
            {{ Form::text('charecter_value[]',  $product_char->value ?? '' , ['id'=>'', 'class' => 'form-control']) }}
        </div>
        <div class="col-12 col-md-2">
            <a href="{{route('admin.charecter.product.delete', $product_char->id)}}"  class="btn btn-sm btn-outline-danger">
                <i class="fa fa-minus-circle"></i> Удалить 
            </a>
        </div>
    </div>
    
</div>
