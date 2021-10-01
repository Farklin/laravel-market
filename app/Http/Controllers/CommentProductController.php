<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CommentProduct; 
use App\Models\ImageCommentProduct; 
use App\Models\Product; 
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class CommentProductController extends Controller
{
    
    /**
     * Добавление коментария к товару 
     */
    public function add(Request $request, $id){

        $product_id = $id; 
        $product = Product::find($id); 
        $validation_comment = $request->validate([
            'name' => ['required', 'max:255', ], 
            'description' => ['required', ],
            'images.*' => ['image', 'mimes:jpeg,bmp,png','max:20240'], 
            'raiting' => ['required','integer'], 
        ]); 

        
        // проверка авторизирован ли пользователь 
        if(Auth::check()){
           $user_id =  Auth::user()->id; 
        }else{
            $user_id = null; 
        }  

        //Обьявление создания нового комментария
        $comment = new CommentProduct(); 
        $comment->name = $validation_comment['name'];
        $comment->description = $validation_comment['description'];
        $comment->raiting = $validation_comment['raiting'];
        $comment->user_id = $user_id;
        $comment->product_id = $product_id; 

        $comment->save(); 
        

        //добавление изображений к коментарию 
        // добавление картинок к товару 
        if($request->hasFile('images'))
        {
            //  Создание папки для хранения картинок к коментарию  
            $path = public_path() . '/images/comment/product/' . $product_id;  
            $path_thumbnail = $path . '/thumbnail'; 

            File::makeDirectory($path, $mode = 0777, true, true);
            File::makeDirectory($path_thumbnail, $mode = 0777, true, true);
            // конец создания папки для хранения картинок к товару 


            $images = $request->file('images'); 
            if(is_array($images))
            $images = array_reverse($images); 

            foreach($images as $image){
                $file_name = time().'_'. $image->getClientOriginalName(); 
                $image->move($path, $file_name); 


                //Создаем миниатюру изображения и сохраняем ее
                $thumbnail = Image::make($path . '/' . $file_name);
                $thumbnail->fit(300, 300);
                $thumbnail->save($path_thumbnail . '/' . $file_name);
                

                // Сохраняем в базу данных 
                $image = new ImageCommentProduct(); 
                $image->comment_product_id = $comment->id; 
                $image->alt =   $comment->name . ' отзыв к товару ' . $product->title; 
                $image->path = '/images/comment/product/' . $product_id . '/' . $file_name; 
                $image->thumbnail = '/images/comment/product/' .$product->id. '/thumbnail/' . $file_name; 
                
                $image->save(); 
            }

            return back(); 
        }

    }



}
