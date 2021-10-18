<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Charecter;
use Illuminate\Http\Request;
use App\Models\CharecterGroup; 

class CharecterControler extends Controller
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
        $charecter_group = CharecterGroup::all(); 
        $charecter = Charecter::find($id);
        if ($charecter === null) {
            $charecter = new Charecter();
            $status = 'create';
        } else {
            $status = 'update';
        }

        if ($request->method() == 'POST') {
            $validation_data = $request->validate([
                'title' => ['required'],
                'sorting' => ['required'],
                'charecter_group_id' => ['required'],
            ]);

            $charecter->title = $validation_data['title'];
            $charecter->sorting = $validation_data['sorting'];
            $charecter->charecter_group_id = $validation_data['charecter_group_id'];


            $charecter->save();
            return back()->with('info', 'Данные успешно сохранены');
        } else {
            return view('admin.charecter.form', compact('charecter', 'status', 'charecter_group'));
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

        Charecter::findOrFail($id)->delete();
        return back();
    }

    public function all(){
        $charecters =  Charecter::orderBy('charecter_group_id', 'asc')->get();
        return view('admin.charecter.all', compact('charecters',)); 
    }
}
