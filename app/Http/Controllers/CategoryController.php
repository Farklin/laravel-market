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
    public function index(Request $request, $slug){

        $seo_id = Seo::where('slug', $slug)->first()->id; 


        $category = Category::where('seo_id' , $seo_id)->first(); 

        switch($request->input('sort')){
            case 'upprice':
                $products = $category->products()->orderBy('price', 'desc')->paginate(20);
                return view('catalog/category/view', compact('category', 'products')); 

            case 'downprice':
                $products = $category->products()->orderBy('price', 'asc')->paginate(20);
                return view('catalog/category/view', compact('category', 'products')); 
            
            case 'new':
                $products = $category->products()->latest()->paginate(20);
                return view('catalog/category/view', compact('category', 'products')); 


            case 'upname':
                $products = $category->products()->orderBy('title', 'asc')->paginate(20);
                return view('catalog/category/view', compact('category', 'products')); 

            case 'downname':
                $products = $category->products()->orderBy('title', 'desc')->paginate(20);
                return view('catalog/category/view', compact('category', 'products')); 



            default: 
                $products = $category->products()->paginate(20);
                return view('catalog/category/view', compact('category', 'products')); 
        }
    
        
    }

   

    


}
