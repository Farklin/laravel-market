<?php

namespace App\Http\Controllers\ApiSocial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VkApiController extends Controller
{
   
    public function vk(){
        $vk = new VKApiClient();
    }

}
