<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; 

use App\Http\Controllers\SeoController; 

/** TODO   
 * Форма обновления 
 * Обработчик формы обновления
 * 
 */


class CategoryController extends Controller
{
    public function form_create(){
        // создание категории товаров
        return view('admin/category/form_category'); 
    }

    public function form_update($id){
        // создание категории товаров
        
        $category = Category::find($id)->first() ; 
        $seo = Category::find($id)->first()->seo;
        return view('admin/category/form_category', compact('category', 'seo') ); 
    }


    public function update_category(Request $request, $id){
        $validation_data = $request->validate([
            'title' => ['required' ],
            'description' => ['required' ],
        ]); 

        
        $category = Category::find($id)->first() ; 
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
        $seo = new SeoController(); 
        $seo->update($request, $category->seo->id); 
        

        return back(); 
    }
    public function all(){
        $categories = Category::all(); 
        return view('admin.category.all', array('categories'=> $categories)); 
    }
    public function delete($id){
         
        $category = Category::find($id);
        $category->delete();  
        return back(); 
    }
    public function create(Request $request){
        
        $validation_data = $request->validate([
            'title' => ['required' ],
            'description' => ['required' ],
        ]); 

        $seo = new SeoController(); 
        $seo->create($request); 



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
        return back(); 
    }
    
}
