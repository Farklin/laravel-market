<div class="col-12 col-md-12 charecter mb-2">
    <div class="row">
        <div class="col-6 col-md-6">
            <select name='charecter_id[]' class='form-control'>
    
                @foreach ($charecters as $charecter)
                    @php 
                    $selected = ''; 
                        if(isset($product_char))
                        {   
                            if($product_char->id == $charecter->id){
                                $selected = 'selected'; 
                            }
                            $value = $product_char->value; 
                        }else{ $value = ''; }
                    
                    @endphp 
                <option {!! $selected !!} value="{{ $charecter->id }}">{{ $charecter->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-6 col-md-6">
            {{ Form::text('charecter_value[]', $value ?? '' , ['id'=>'', 'class' => 'form-control']) }}
        </div>
    </div>
    
</div>
