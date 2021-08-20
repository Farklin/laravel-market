<?php

namespace App\Http\Controllers;

use App\Models\Category; 
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id){
        $category = Category::where('id', $id)->first(); 
        $products = $category->products; 
        
        return view('catalog/category/view', array('products' => $products, 'category' => $category)); 
    }

    public function create(){
        $category = new Category();
        $category->title = 'Новая категория'; 
        $category->description = 'Новая категория'; 
        $category->public = True; 
        $category->display_main_page = True; 

        $category->display_sidebar = True; 
        $category->save(); 
        return 'Категория успешно создана'; 
    }
}
