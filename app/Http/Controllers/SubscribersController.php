<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber; 


class SubscribersController extends Controller
{
    //

    
    public function subscribe(Request $request){
        /**
         * Создать подписчика 
         */
        $messages = [
            'email.email' => 'Введенные данные не корректны',
            'email.unique' => 'Вы уже подписаны',
            'email.required' => 'Пожалуйста введите почту',
        ]; 

        $validation_data = $request->validate([
            'email' => ['required', 'unique:subscribers', 'email' ],
        ], $messages = $messages); 

        $subscribers = new Subscriber();
        $subscribers->email = $validation_data['email']; 
        $subscribers->status = true; 

        $subscribers->save(); 

        // Тут отправка почты на адрес
        //

        return view('catalog.subscribe.newsubscribe');
        
    }
  
}
