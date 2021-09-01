<?php

namespace App\Http\Controllers;

use App\Models\Category; 
use Illuminate\Http\Request;
use App\Models\Seo; 

/* TODO 
* 
* картинки для категорий
* вложенные категории
*/ 



class CategoryController extends Controller
{
    public function index($slug){
        $seo_id = Seo::where('slug', $slug)->first()->id; 

        $category = Category::where('seo_id' , $seo_id)->first(); 
    
        return view('catalog/category/view', array('category' => $category)); 
    }

   

    


}
