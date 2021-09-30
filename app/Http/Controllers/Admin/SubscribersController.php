<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Subscriber; 

class SubscribersController extends Controller
{
    public function all(){
        /** 
         * Вывод всех подписок
        */
        $subscribers = Subscriber::all();
        return view('admin.subscriber.all', compact('subscribers')); 

    }




}
