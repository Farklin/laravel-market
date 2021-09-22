<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like; 
class LikeController extends Controller
{
    public function likeProduct($product_id){
        /**
         * Поставить лайк товару 
         */
        if($user_id = auth()->check()){
           
           $user_id = auth()->user()->id; 
           // проверяем есть ли у товара уже лайк 
           if(Like::where('product_id', '=', $product_id)->where('user_id', '=', $user_id)->exists()){
               // если есть то меняем на дизлайк 
                $like = Like::where('product_id', '=', $product_id)->where('user_id', '=', $user_id)->first();
                $like->like = !$like->like; 
                $like->save();
                return $like->like; 
           }else{
                // если лайка нету то добавляем 
                $like = new Like(); 
                $like->user_id = $user_id; 
                $like->product_id = $product_id; 
                $like->like = true; 
                $like->save(); 
                return $like->like; 
           } 
          
        }else{
            return Null;  
        }
    }   



}
