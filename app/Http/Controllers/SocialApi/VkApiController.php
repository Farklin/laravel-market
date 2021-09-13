<?php

namespace App\Http\Controllers\SocialApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Atehnix\VkClient\Src\Client; 

class VkApiController extends Controller
{

    public function post(){

        // https://oauth.vk.com/authorize?client_id=7948916&scope=groups,wall,offline,photos&redirect_uri=https://oauth.vk.com/blank.html&display=page&response_type=token
        
        $params = array(
            'v' => '5.131', // версия вк апи
            'scope' => 'wall,photos,video', // доступ к стене,фото,видео
            'access_token' => 'ff2953281ad49430293d5bbff9ee95d3d5f2d7088c50b451688391ad599a52945ae459809997878449474', // тут ваш access_token
            'owner_id' => '672366606', // ID ГРУППЫ С ОБЯЗАТЕЛЬНЫМ ЗНАКОМ "-" ПЕРЕД ЧИСЛОМ!
            'attachments' => 'https://teisbubble.ru/', // ссылка на вашу страницу, которая будет расшарена на вашей стене группы
            'message' => 'Любой ваш текст' // тут текст который будет в карточке расшаривания, если оставить пустым то будет дублировать title со страницы в параметре attachments
            );
                
                
            $url = 'https://api.vk.com/method/wall.post?' . http_build_query($params);
            
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            $result = curl_getinfo($ch , CURLINFO_HTTP_CODE); 
            curl_close($ch);
    
            return $result; 
    
    }
    
}
