<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\ImageProduct; 
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


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
            $path_thumbnail = $path . '/thumbnail'; 

            File::makeDirectory($path, $mode = 0777, true, true);
            File::makeDirectory($path_thumbnail, $mode = 0777, true, true);
            // конец создания папки для хранения картинок к товару 
            $images = $request->file('image'); 
            $images = array_reverse($images); 
            foreach($images as $image){
                $file_name = time().'_'. $image->getClientOriginalName(); 
                $image->move($path, $file_name); 


                //Создаем миниатюру изображения и сохраняем ее
                $thumbnail = Image::make($path . '/' . $file_name);
                $thumbnail->fit(300, 300);
                $thumbnail->save($path_thumbnail . '/' . $file_name);
                

                // Сохраняем в базу данных 
                $image = new ImageProduct(); 
                $image->alt = $product->title; 
                $image->image_path = '/images/products/' . $product->id . '/' . $file_name; 

                

                $image->product_id = $product->id; 
                $image->save(); 
            }

        }
    }

    public function delete(Request $request, $id){

        $image_product = ImageProduct::find($id); 
        File::delete(public_path() . $image_product->image_path); 
        $image_product->delete();  
        return back();  
    
    }

    /**
     * Изменение сортировки картинок
     */

    public function sorting(Request $request){
        if($request->has('sortimage')){
           foreach($request->input('sortimage') as $sort){
               $image =  ImageProduct::find($sort['image_id']); 
               $image->sort = (int)$sort['image_sort'] + 1 ;  
               $image->save(); 
           }
           return true;  

        }
    }

  
}
