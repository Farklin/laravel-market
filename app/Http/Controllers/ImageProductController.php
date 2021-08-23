<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\ImageProduct; 

class ImageProductController extends Controller
{
    //
    static function add_image_product(Request $request, $product)
    {
        // добавление картинок к товару 
        if($request->hasFile('image'))
        {

            //  Создание папки для хранения картинок к товару 
            $path = public_path() . '/images/products/' . $product->id; 
            File::makeDirectory($path, $mode = 0777, true, true);
            // конец создания папки для хранения картинок к товару 

            foreach($request->file('image') as $image){
                $file_name = time().'_'. $image->getClientOriginalName(); 
                $image->move($path, $file_name); 

                $image = new ImageProduct(); 
                $image->alt = $product->title; 
                $image->image_path = '/images/products/' . $product->id . '/' . $file_name; 
                $image->product_id = $product->id; 
                $image->save(); 
            }

        }
    }

    public function delete(Request $request){
        if($request->has('image_product_id')){
            $id = $request->input('image_product_id'); 
            $image_product = ImageProduct::find($id); 
            File::delete(public_path() . $image_product->image_path); 
            $image_product->delete();  
            return redirect()->back();  
        }
    }

  
}
