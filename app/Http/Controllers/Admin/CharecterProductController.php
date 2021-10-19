<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CharecterProduct; 

class CharecterProductController extends Controller
{

    public static function add(Request $request, $product_id){

        if($request->has('charecter_id') and  $request->has('charecter_value')){
            $charecter_id = $request->input('charecter_id'); 
            $charecter_value = $request->input('charecter_value');
            if(is_array($charecter_value)){
                for($i = 0; $i < count($charecter_value); $i ++){
                    if($charecter_value[$i] != ''){
                        // проверяем существует ли характеристика
                        $charecter_product = CharecterProduct::where('product_id', $product_id)->where('charecter_id', $charecter_id[$i])->first();
                        // если характеристика не существует создаем новый экземпляр 
                        if($charecter_product === null){
                            $charecter_product = new CharecterProduct(); 
                        }
                        $charecter_product->product_id = $product_id; 
                        $charecter_product->charecter_id = $charecter_id[$i]; 
                        $charecter_product->value = $charecter_value[$i];  
                        $charecter_product->save(); 
                    }
                    
                }
            }
        }
    }

    public function delete($id){
        CharecterProduct::findOrFail($id)->delete(); 
        return back(); 
    }
}
