<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket; 


class BasketController extends Controller
{
    public function index(Request $request){


        $basket_id = $request->cookie('basket_id');
        if (!empty($basket_id)) {
            $products = Basket::findOrFail($basket_id)->products;
            return view('catalog.basket.index', compact('products'));
        } else {
            abort(404);
        }
      
    }

    public function object(Request $request){
        
        $basket_id = $request->cookie('basket_id');
        if (!empty($basket_id)) {
            $products = Basket::findOrFail($basket_id)->products->toJson();

            return $products;
        } else {
            return [];
        }
        return []; 
    }

    public function product_delete(Request $request){
        if($request->has('product_id'))
        {   
            $basket_id = $request->cookie('basket_id');
            $product_id = $request->input('product_id'); 

            $basket = Basket::findOrFail($basket_id);
            return $pivotRow = $basket->products()->where('product_id', $product_id)->first()->pivot->delete(); 
        }
        
        return 'Данного товара нету в корзине '  ; 
    }
    public function modal(Request $request){

        $basket_id = $request->cookie('basket_id');
        if (!empty($basket_id)) {
            $products = Basket::findOrFail($basket_id)->products;
            return view('catalog.basket.modal.index', compact('products'));
        } else {
            return view('catalog.basket.modal.index');
        }
        return view('catalog.basket.modal.index');
    
    }

    public function add( Request $request, $id){

        $basket_id = $request->cookie('basket_id');
        $quantity = $request->input('quantity') ?? 1;
        
        if (empty($basket_id)) {
            // если корзина еще не существует — создаем объект
            $basket = Basket::create();
            // получаем идентификатор, чтобы записать в cookie
            $basket_id = $basket->id;
        } else {
            // корзина уже существует, получаем объект корзины
            $basket = Basket::findOrFail($basket_id);
            // обновляем поле `updated_at` таблицы `baskets`
            $basket->touch();
        }
        if ($basket->products->contains($id)) {
            // если такой товар есть в корзине — изменяем кол-во
            $pivotRow = $basket->products()->where('product_id', $id)->first()->pivot;
            $quantity = $pivotRow->quantity + $quantity;
            $pivotRow->update(['quantity' => $quantity]);
        } else {
            // если такого товара нет в корзине — добавляем его
            $basket->products()->attach($id, ['quantity' => $quantity]);
        }
        // выполняем редирект обратно на страницу, где была нажата кнопка «В корзину»
        return back()->withCookie(cookie('basket_id', $basket_id, 525600));
    
    }
    public function checkout(){
        return view('catalog.basket.checkout'); 
    }
}
