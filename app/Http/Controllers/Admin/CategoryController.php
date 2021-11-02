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

    /**
     * Вывод формы создания категории сортировкой 
     *
     * @return void
     */
    public function form_create()
    {
        $status = 'create';
        $category = new Category();
        // создание категории товаров
        $categories = Category::all();
        return view('admin/category/form_category', compact('category', 'categories', 'status'));
    }

    /**
     * Вывод формы обновления категории 
     *
     * @param [type] $id
     * @return void
     */
    public function form_update($id)
    {
        // создание категории товаров
        $status = 'update';
        $category = Category::find($id);
        $seo = Category::find($id)->seo;
        $categories = Category::all();
        return view('admin/category/form_category', compact('category', 'seo', 'categories', 'status'));
    }

    public function validation(Request $request)
    {
        $validation_data = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);
        return $validation_data; 
    }

    /**
     * Обновление категории 
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $validation_data = $this->validation($request); 

        $category = Category::find($id);
        $category->title = $validation_data['title'];
        $category->description = $validation_data['description'];

        $category->setPublic($request->has('public')); 
        $category->setDisplayMainPage($request->has('display_main_page')); 
        $category->setSidebar($request->has('display_sidebar')); 
        
        // Выбор категории родителя
        if ($request->has('category_id')) {
            if ($request->input('category_id') != 0) {
                $category->category_id = $request->input('category_id');
            }
        }

        $category->save();
        $seo = new SeoController();
        $seo->update($request, $category->seo->id);


        return back();
    }

    /**
     * Вывод списка всех категорий 
     *
     * @return void
     */
    public function all()
    {
        $categories = Category::all();
        return view('admin.category.all', array('categories' => $categories));
    }

    /**
     * Удаление категории 
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {
        /* Удаление категории */
        $category = Category::find($id);
        $category->delete();
        // Удалить связаную запись seo 
        $category->seo->delete();
        return back();
    }


    /**
     * Создание категории
     *
     * @param Request $request
     * @return void
     */
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

        $category->setPublic($request->has('public')); 
        $category->setDisplayMainPage($request->has('display_main_page')); 
        $category->setSidebar($request->has('display_sidebar')); 

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
