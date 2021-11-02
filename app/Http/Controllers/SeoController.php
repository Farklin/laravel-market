<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seo;
use Illuminate\Support\Str;

class SeoController extends Controller
{

    /**
     * Создание meta
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {

        $seo = new Seo();

        $seo->setTitle($seo, $request->input('title_seo'), $request->input('title')); 
        $seo->setDescription($seo, $request->input('description_seo'));
        $seo->setKeywords($seo, $request->input('keywords_seo')); 
        $seo->save();
        $seo->setUrl($request->input('slug'), $request->input('title')); 
        $seo->save();

        return $seo->id;
    }

  
    /**
     * Обновление URL страницы 
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $seo = Seo::findOrFail($id);
        $seo->setTitle($request->input('title_seo'), $request->input('title'));
        $seo->setDescription($request->input('description_seo')); 
        $seo->setKeywords($request->input('keywords_seo')); 
        $seo->setUrl($request->input('slug'), $request->input('title'));
        $seo->save();
    }
}
