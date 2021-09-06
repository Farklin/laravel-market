<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SeoController;

use Illuminate\Http\Request;
use App\Models\Page; 


class PageController extends Controller
{
    public function create(Request $request){
       
        if($request->method() == 'POST'){

            $validation_data = $request->validate([
                'title' => ['required'], 
                'content' => ['required'], 
            ]); 
    
            $page = new Page(); 
            $page->title = $validation_data['title']; 
            $page->content = $validation_data['content']; 
            
            $seo = new SeoController(); 

            $page->seo_id = $seo->create($request);  
            $page->save();
    
            return back(); 

        }else{
            return view('admin.page.form_page'); 
        }
    }
    public function update(Request $request, $id){
        if($request->method() == 'POST'){
            $page = Page::findOrFail($id);
            $validation_data = $request->validate([
                'title' => ['required'], 
                'content' => ['required'], 
            ]); 
    

            $page->title = $validation_data['title']; 
            $page->content = $validation_data['content']; 

            $seo = new SeoController(); 
            $seo->update($request, $page->seo_id);  


            $page->save(); 
            return back(); 

        }else{
            $page = Page::findOrFail($id); 
            $seo = $page->seo; 
            return view('admin.page.form_page', compact('page', 'seo')); 
        }
    }
    public function delete(Request $request, $id){
        $page = Page::findOrFail($id); 
        $page->delete();  
        return back(); 
    }   

    public function all(){
        $pages = Page::all(); 
        return view('admin.page.all', compact('pages'));  
    }
}
