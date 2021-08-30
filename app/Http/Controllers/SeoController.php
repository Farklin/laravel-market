<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seo; 
use Illuminate\Support\Str;

class SeoController extends Controller
{
    public function create(Request $request){

        $seo = new Seo();
        $seo->title = $request->input('title_seo'); 
        $seo->description = $request->input('description_seo');
        $seo->keywords = $request->input('keywords_seo');
        if($request->input('slug') == ''){
            $seo->slug = Str::slug($request->input('title'), '-'); 
        }else{
            $seo->slug = $request->input('slug'); 
        }
      
        $seo->save(); 

        return $seo->id; 

    }
    public function update(Request $request, $id){

        $seo = Seo::findOrFail($id);
        $seo->title = $request->input('title_seo'); 
        $seo->description = $request->input('description_seo');
        $seo->keywords = $request->input('keywords_seo');
        $seo->slug = Str::slug($request->input('title'), '-'); 
        $seo->save(); 
    }
}
