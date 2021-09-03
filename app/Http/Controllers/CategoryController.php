<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
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
        $products = $category->products()->paginate(20); 
    
        return view('catalog/category/view', compact('category', 'products')); 
    }

   

    


}
