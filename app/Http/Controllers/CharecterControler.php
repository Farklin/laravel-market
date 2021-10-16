<?php

namespace App\Http\Controllers;
use App\Models\Charecter; 
use Illuminate\Http\Request;

class CharecterControler extends Controller
{
    
    /**
     * Добавление 
     *
     * @param Request $request
     * @return void
     */
    public function add(Request $request){

        $charecter = new Charecter(); 

        $validation_data = $request->validate([
            'title' => ['required' ],
            'soritng' => ['required' ],
            'charecter_group_id' => ['required' ],
        ]); 

        $charecter->title = ''; 
        $charecter->soritng = ''; 
        $charecter->charecter_group_id = ''; 
        
        $charecter->save(); 
        
        return back(); 

    }


    /**
     * Удаление характеристики 
     *
     * @param [type] $id
     * @return void
     */

    public function delete($id){

        Charecter::findOrFail($id); 
        return back();

    }
    public function update(Request $request, $id){


        $charecter = Charecter::findOrFail($id); 

        $validation_data = $request->validate([
            'title' => ['required' ],
            'soritng' => ['required' ],
            'charecter_group_id' => ['required' ],
        ]); 

        $charecter->title = ''; 
        $charecter->soritng = ''; 
        $charecter->charecter_group_id = ''; 
        
        $charecter->save(); 

        return back(); 
    }
}
