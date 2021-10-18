<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\CharecterGroup;
use Illuminate\Http\Request;

class CharecterGroupController extends Controller
{
    
    
    /**
     * Добавление или обновление характеристики 
     *
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function createUpdate(Request $request, $id = 0)
    {
        $charecter = CharecterGroup::find($id);
        if (!$charecter) {
            $charecter = new CharecterGroup();
            $status = 'create';
        } else {
            $status = 'update';
        }

        if ($request->method() == 'POST') {
            $validation_data = $request->validate([
                'title' => ['required'],
                'sorting' => ['required'],
            ]);

            $charecter->title = $validation_data['title'];
            $charecter->sorting = $validation_data['sorting'];

            $charecter->save();
            return back();
        } else {
            return view('admin.charecter.form_group', compact('charecter', 'status', ));
        }
    }


    /**
     * Удаление характеристики 
     *
     * @param [type] $id
     * @return void
     */

    public function delete($id)
    {

        CharecterGroup::findOrFail($id)->delete();
        return back();
    }

    public function all(){
        $charecters =  CharecterGroup::all(); 
        return view('admin.charecter.all_group', compact('charecters',)); 
    }

}
