<?php

namespace App\Http\Controllers;

use App\Models\Category; 
use Illuminate\Http\Request;


/* TODO 
* 
* картинки для категорий
* вложенные категории
*/ 



class CategoryController extends Controller
{
    public function index($id){
        $category = Category::where('id', $id)->first(); 
        $products = $category->products; 
        
        return view('catalog/category/view', array('products' => $products, 'category' => $category)); 
    }

   

    


}
