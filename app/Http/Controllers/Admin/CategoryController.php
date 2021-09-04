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
    public function form_create()
    {
        // создание категории товаров
        $categories = Category::all();
        return view('admin/category/form_category', compact('categories'));
    }

    public function form_update($id)
    {
        // создание категории товаров

        $category = Category::find($id);
        $seo = Category::find($id)->seo;
        $categories = Category::all();
        return view('admin/category/form_category', compact('category', 'seo', 'categories'));
    }


    public function update(Request $request, $id)
    {

        /* Обновление категории */


        $validation_data = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);

        $category = Category::find($id);
        $category->title = $validation_data['title'];
        $category->description = $validation_data['description'];

        if ($request->has('public')) {
            $category->public = True;
        } else {
            $category->public = False;
        }

        if ($request->has('display_main_page')) {
            $category->display_main_page = True;
        } else {
            $category->display_main_page = False;
        }

        if ($request->has('display_sidebar')) {
            $category->display_sidebar = True;
        } else {
            $category->display_sidebar = False;
        }
        // Выбор категории родителя
        if ($request->has('category_id')) {
            if ($request->input('category_id') != 0) {
                $category->category_id = $request->input('category_id');
            }
        }


        $category->save();
        $seo = new SeoController();
        $seo->update($request, $category->seo->id);


        return $request->input('category_id');
    }
    public function all()
    {
        $categories = Category::all();
        return view('admin.category.all', array('categories' => $categories));
    }
    public function delete($id)
    {
        /* Удаление категории */
        $category = Category::find($id);
        $category->delete();
        // Удалить связаную запись seo 
        $category->seo->delete();
        return back();
    }
    public function create(Request $request)
    {

        $validation_data = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);

        $seo = new SeoController();
        $seo_id = $seo->create($request);



        $category = new Category();
        $category->title = $validation_data['title'];
        $category->description = $validation_data['description'];
        $category->seo_id = $seo_id;




        if ($request->has('public')) {
            $category->public = True;
        } else {
            $category->public = False;
        }

        if ($request->has('display_main_page')) {
            $category->display_main_page = True;
        } else {
            $category->display_main_page = False;
        }

        if ($request->has('display_sidebar')) {
            $category->display_sidebar = True;
        } else {
            $category->display_sidebar = False;
        }

        // Выбор категории родителя
        if ($request->has('category_id')) {
            if ($request->input('category_id') != 0) {
                $category->category_id = $request->input('category_id');
            }
        }

        $category->save();
        return back();
    }
}
