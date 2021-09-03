<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OrderController extends Controller
{
    public function order($id){
        /**
         * Выводит один заказ покупателя
         */
        if (Auth::check()) {
            try{
                $order = Order::where('id', $id)->where('user_id', Auth::user()->id)->get()->first(); 
                return view('catalog.user.order', compact('order')); 
            }catch (ModelNotFoundException $e){
                return view('catalog.user.order'); 
            }
            
        }
        
    }
    public function orders(){
        /**
         * Выводит все заказы покупателя 
         */
        if (Auth::check()) {
        
            $user = Auth::user();
            $orders = $user->orders; 

            return view('catalog.user.orders', compact('orders')); 

        }
        

    }
}
