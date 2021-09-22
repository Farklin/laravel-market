<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket; 
use App\Models\Order; 
use App\Models\OrderItem; 
use GuzzleHttp\Client;
use App\Mail\OrderMail; 
use Illuminate\Support\Facades\Input;


use Illuminate\Support\Facades\Mail; 

class BasketController extends Controller
{
    public function index(Request $request){
        /**
         * Выводит корзину 
         */

        $basket_id = $request->cookie('basket_id');
        if (!empty($basket_id)) {
            $products = Basket::findOrFail($basket_id)->products;
            $basket = Basket::getBasket();
            $delivery =$this->pochta_rossii($form = '600022', $to='115280', $mass = $basket->getWeight(), $valuation = '0', $vat = '1'); 

            return view('catalog.basket.index', compact('products', 'delivery'));
        } else {
            return view('catalog.basket.index'); 
        }
      
    }

    public function object(Request $request){
        /**
         * Получает обьект из корзины 
         */
        $basket = Basket::getBasket(); 
        return $basket->products->toJson(); 
        // $basket_id = $request->cookie('basket_id');
        // if (!empty($basket_id)) {
        //     $products = Basket::findOrFail($basket_id)->products->toJson();

        //     return $products;
        // } else {
        //     return [];
        // }
        // return []; 
    }

    public function product_delete(Request $request){
        /**
         * Удаляем товар из корзины
         */

        if($request->has('product_id'))
        {   
            $basket_id = $request->cookie('basket_id');
            $product_id = $request->input('product_id'); 

            $basket = Basket::findOrFail($basket_id);
            $basket->products()->where('product_id', $product_id)->first()->pivot->delete(); 
            return back()->withCookie(cookie('basket_id', $basket_id, 525600)); 
        }
        
    }
    public function modal(Request $request){
        /**
         * Выводит модальную форму заказа для ajax 
         */

        // $basket_id = $request->cookie('basket_id');
        // if (!empty($basket_id)) {
        //     $products = Basket::findOrFail($basket_id)->products;
        //     $delivery = Baske
        //     return view('catalog.basket.modal.index', compact('products', 'delivery'));
        // } else {
        //     return view('catalog.basket.modal.index');
        // }
        // return view('catalog.basket.modal.index');

        $basket = Basket::getBasket();
        $products = $basket->products; 
        $delivery =$this->pochta_rossii($form = '600022', $to='115280', $mass = $basket->getWeight(), $valuation = '0', $vat = '1'); 
        return view('catalog.basket.modal.index', compact('products', 'delivery'));    
        
    }

    public function add( Request $request, $id){
        /** 
         *  Добавляет товары в корзину $id
         * */ 
     

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
    public function checkout(Request $request){

        $basket = Basket::getBasket();  
        $delivery =$this->pochta_rossii($form = '600022', $to='115280', $mass = $basket->getWeight(), $valuation = '0', $vat = '1'); 
        

        $user_id = auth()->check() ? auth()->user()->id : null;
        if($user_id == null){
            return view('catalog.basket.checkout', compact('basket', 'delivery')); 
        }else{
            $form = new Order(); 
            $form = $form->lastOrderUser($user_id); 
            
            return view('catalog.basket.checkout', compact('basket', 'delivery', 'form')); 
           
        }

        
      
        
    }


    public function plus(Request $request, $id) {
        $basket_id = $request->cookie('basket_id');
        if (empty($basket_id)) {
            abort(404);
        }
        $this->change($basket_id, $id, 1);
        // выполняем редирект обратно на страницу корзины
        return redirect()
            ->route('basket.all')
            ->withCookie(cookie('basket_id', $basket_id, 525600));
    }

    /**
     * Уменьшает кол-во товара $id в корзине на единицу
     */
    public function minus(Request $request, $id) {
        $basket_id = $request->cookie('basket_id');
        if (empty($basket_id)) {
            abort(404);
        }
        $this->change($basket_id, $id, -1);
        // выполняем редирект обратно на страницу корзины
        return redirect()
            ->route('basket.all')
            ->withCookie(cookie('basket_id', $basket_id, 525600));
    }

    
    /**
     * Изменяет кол-во товара $product_id на величину $count
     */
    private function change($basket_id, $product_id, $count = 0) {
        if ($count == 0) {
            return;
        }
        $basket = Basket::findOrFail($basket_id);
        // если товар есть в корзине — изменяем кол-во
        if ($basket->products->contains($product_id)) {
            $pivotRow = $basket->products()->where('product_id', $product_id)->first()->pivot;
            $quantity = $pivotRow->quantity + $count;
            if ($quantity > 0) {
                // обновляем кол-во товара $product_id в корзине
                $pivotRow->update(['quantity' => $quantity]);
                // обновляем поле `updated_at` таблицы `baskets`
                $basket->touch();
            } else {
                // кол-во равно нулю — удаляем товар из корзины
                $pivotRow->delete();
            }
        }
    }

    public function saveOrder(Request $request){
        /**
         * Сохранение заказа в базу данных 
         *  
         *   last_name
         *   patronymic
         *   address
         *   index
         *   phone
         *   email
         */
        $validation_data = $request->validate([
            'first_name' => ['required' ],
            'last_name' => ['required' ],
            'patronymic' => [],
            'address' => ['required' ],
            'index' => ['required' ],
            'phone' => ['required' ],
            'email' => ['required'], 
        ]); 
        $basket = Basket::getBasket(); 
        $user_id = auth()->check() ? auth()->user()->id : null;

        if($request->cookie('delivery_status')){
            $delivery = $this->pochta_rossii($form = '600022', $to='115280', $mass = $basket->getWeight(), $valuation = '0', $vat = '1'); 
        }else{
            $delivery = 0; 
        }

        $order = Order::create(array(
            'name' => $validation_data['last_name'] . ' ' . $validation_data['first_name'] . ' ' . $validation_data['patronymic']  , 
            'email' => $validation_data['email'],
            'address' => $validation_data['address'],
            'amount' => $basket->getAmount() ,
            'phone' =>  $validation_data['phone'], 
            'delivery' => $delivery,
            'index' =>  $validation_data['index'],
            'user_id' => $user_id ,
        )); 

        foreach($basket->products as $product){
            $order->items()->create(array(
                'product_id' => $product->id,
                'name' => $product->title,
                'price' => $product->price,
                'quantity' => $product->pivot->quantity,
                'cost' => $product->price * $product->pivot->quantity,
            )); 
        }
        $basket->delete();
    

        $data = array(
            'order' => $order, 
            'email' => $validation_data['email'], 
        );


        // Отправка почты 
        Mail::send('mail.order_create', $data,function ($message) use ($order){
            
            $message->from('ivannewyou@gmail.com','Спасибо что оформили заказ TeisBubble'); 
            $message->to($order->email)->subject('Спасибо что оформили заказ TeisBubble');
            $message->to('teisbubble@yandex.ru')->subject('Спасибо что оформили заказ TeisBubble');
       });

        //Mail::to($validation_data['email'])->send(new OrderMail());
        return redirect()->route('basket.success')->with('order_id', $order->id);; 

    }

    public function success(Request $request) {
    /**
     * Сообщение об успешном оформлении заказа
     */
        if ($request->session()->exists('order_id')) {
            // сюда покупатель попадает сразу после успешного оформления заказа
            $order_id = $request->session()->pull('order_id');
            $order = Order::findOrFail($order_id);
            return view('catalog.basket.success', compact('order'));
        } else {
            // если покупатель попал сюда случайно, не после оформления заказа,
            // ему здесь делать нечего — отправляем на страницу корзины
            return redirect()->route('basket.all');
        }
    }

    /* Расчет стоимости доставки почтой России */ 
    static public function pochta_rossii($from = '600022', $to, $mass, $valuation, $vat){

        $client = new Client();

        $res = $client->request('POST', 'https://postprice.ru/engine/russia/api.php', [
            /* https://postprice.ru/api/ */ 

            'query' => [
                'from' => $from, 
                'to' => $to, 
                'mass' => $mass, 
                'valuation' => $valuation, 
                'vat' => $vat, 

            
            ]
            
        ]);

        if ($res->getStatusCode() == 200) { // 200 OK
            $response_data = $res->getBody()->getContents();
            return json_decode($response_data)->pkg_1class; 
        }
    }

    /**
     * Изменение статуса доставки 
     */
    public function delivery_status(Request $request){
        $delivery_status = $request->cookie('delivery_status');
        if(empty($delivery_status)){
            $delivery_status = !$delivery_status; 
        }else{
            $delivery_status = false; 
        }

        return back()->withCookie(cookie('delivery_status', $delivery_status , 525600)); 
    }

}
