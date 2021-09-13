<?php

namespace App\Http\Controllers\SocialApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Atehnix\VkClient\Src\Client; 

class VkApiController extends Controller
{
    public static function secret_code(){
        

        // 1. инициализация
        $ch = curl_init();

        // 2. указываем параметры, включая url
        curl_setopt($ch, CURLOPT_URL, "https://oauth.vk.com/authorize?client_id=7948916&display=page
        &redirect_uri=https://api.vk.com/blank.html&scope=offline,wall,photos
        &response_type=code");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // 3. получаем HTML в качестве результата
        $output = curl_exec($ch);

        // 4. закрываем соединение
        curl_close($ch);
    }
    public function post(){

            $array = array(
                'v' => '5.74', // версия вк апи
            'scope' => 'wall,photos,video', // доступ к стене,фото,видео
            'access_token' => 'e595f7977b025a318447163e5ead8f73013a08a1e97b046e7c5780c182b11ce56774b0c966ffc08f212bd', // тут ваш access_token
            'owner_id' => '672366606', // ID ГРУППЫ С ОБЯЗАТЕЛЬНЫМ ЗНАКОМ "-" ПЕРЕД ЧИСЛОМ!
            'attachments' => 'https://teisbubble.ru/', // ссылка на вашу страницу, которая будет расшарена на вашей стене группы
            'message' => 'Любой ваш текст' // тут текст который будет в карточке расшаривания, если оставить пустым то будет дублировать title со страницы в параметре attachments
            );
             
            $ch = curl_init('https://api.vk.com/method/wall.post?');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $array); 
             
            // Или предать массив строкой: 
            // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($array, '', '&'));
             
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HEADER, false);
            $html = curl_exec($ch);
            curl_close($ch);	
             
            return $html;

    
    }
    
}
