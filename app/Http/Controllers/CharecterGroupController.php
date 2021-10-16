<?php

namespace App\Http\Controllers;
use App\Models\CharecterGroup;
use Illuminate\Http\Request;

class CharecterGroupController extends Controller
{
    
    public function form(){
        return view('admin.charecter.form_group'); 
    }

    /**
     * Добавление группы 
     *
     * @param Request $request
     * @return void
     */
    public function add(Request $request){

        $charecter_group = new CharecterGroup(); 

        $validation_data = $request->validate([
            'title' => ['required' ],
            'soritng' => ['required' ],
        ]); 

        $charecter_group->title = ''; 
        $charecter_group->soritng = ''; 
        
        $charecter_group->save(); 
        
        return back(); 

    }


    /**
     * Удаление группы характеристик  
     *
     * @param [type] $id
     * @return void
     */

    public function delete($id){

        CharecterGroup::findOrFail($id)->delete(); 
        return back();

    }

    /**
     * Обновление группы характеритик 
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */

    public function update(Request $request, $id){


        $charecter_group = CharecterGroup::findOrFail($id); 

        $validation_data = $request->validate([
            'title' => ['required' ],
            'soritng' => ['required' ],
        ]); 

        $charecter_group->title = ''; 
        $charecter_group->soritng = ''; 
        
        $charecter_group->save(); 

        return back(); 
    }

}
