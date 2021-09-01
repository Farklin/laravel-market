<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seo; 
use Illuminate\Support\Str;

class SeoController extends Controller
{
    public function create(Request $request){
        
        $seo = new Seo();
        if($request->input('title_seo') == ''){
            $seo->title = $request->input('title');
        }else{
            $seo->title = $request->input('title_seo');
        }
         


        $seo->description = $request->input('description_seo');
        $seo->keywords = $request->input('keywords_seo');
    
        $seo->save(); 

        if($request->input('slug') == ''){
            $seo->slug =$this->unique_slug(Str::slug($request->input('title'), '-'), $seo->id)  ; 
        }else{
            $seo->slug = $this->unique_slug($request->input('slug'), $seo->id) ; 
        }

        $seo->save();  

        return $seo->id; 

    }
    static function unique_slug($slug, $id){
        $count = Seo::where('slug', $slug)->exists();  
        if(!$count)
        {
            return $slug; 
        }else {
            return $slug . (string)$id; 
        }
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
