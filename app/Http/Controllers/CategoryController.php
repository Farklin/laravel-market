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

    public function create(Request $request){
        
        $validation_data = $request->validate([
            'title' => ['required' ],
            'description' => ['required' ],
        ]); 


        $category = new Category();
        $category->title = $validation_data['title']; 
        $category->description = $validation_data['description']; 

        if($request->has('public')){
            $category->public = True; 
        }else{ 
            $category->public = False; 
        }
        
        if($request->has('display_main_page')){
            $category->display_main_page = True; 
        }else{ 
            $category->display_main_page = False; 
        }
        
        if($request->has('display_sidebar')){
            $category->display_sidebar = True; 
        }else{ 
            $category->display_sidebar = False; 
        }
       
        $category->save(); 
        return  $request->input('public'); 
    }

    public function form_create(){
        // создание категории товаров
        return view('admin/category/form_category'); 
    }
    public function update_category($id){

    }
    


}
