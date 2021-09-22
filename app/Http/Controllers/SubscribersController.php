<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber; 

use Illuminate\Support\Facades\Mail; 


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

        $data = array(
            'subscribers' => $subscribers, 
        );

        // Тут отправка почты на адрес
        Mail::send('mail.new_subscriber', $data,function ($message) use ($subscribers){
            
            $message->from('ivannewyou@gmail.com','Спасибо что подписались на рассылку TeisBubbel'); 
            $message->to($subscribers->email)->subject('Спасибо что подписались на рассылку TeisBubbel');
            $message->to('teisbubble@yandex.ru')->subject('Спасибо что подписались на рассылку TeisBubbel');
       });
        //

        return view('catalog.subscribe.newsubscribe');
        
    }
  
}
