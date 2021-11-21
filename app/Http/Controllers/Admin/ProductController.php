<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Charecter;
use App\Http\Controllers\SeoController;
use App\Models\Seo;
use App\Http\Controllers\ImageProductController;
use App\Http\Controllers\Admin\CharecterProductController;

use App\Imports\ProductImport;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    //  

    public function all()
    {
        // Вывод всех товаров в административной части
        $products = Product::all();
        return view('admin.product.all', array('products' => $products));
    }

    /**
     * Поис товаров в административной части
     *
     * @param Request $request
     * @return void
     */

    public function search(Request $request)
    {
        $search = $request->input('query');
        $query = Product::search($search);
        $products = $query->paginate(6)->withQueryString();
        return view('admin.product.all', compact('products', 'search'));
    }

    /**
     * Импорт товаров
     *
     * @return void
     */

    public function import()
    {
        Excel::import(new ProductImport, 'Product.xlsx');
    }

    /**
     * Экспорт товаров 
     *
     * @return void
     */
    public function export()
    {
        return Excel::download(new ProductsExport, 'products-collection.xlsx');
    }

    /**
     * Функция вызова формы создания товара 
     *
     * @return void
     */

    public function form_create()
    {

        $status = 'create';
        $charecters = Charecter::all();
        $product = new Product();
        // Вывод формы создания товара
        $category = Category::all();
        return view('admin/product/create_product', compact('category', 'product', 'status', 'charecters'));
    }

    public function create(Request $request)
    {

        //обработчик создания товара 

        $validation_data = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'old_price' => ['required'],
            'weight' => ['required'],
            'category' => ['required'],
        ]);

        $seo_id = SeoController::create($request);


        $category = Category::find($validation_data['category']);

        $product = new Product();
        $product->title = $validation_data['title'];
        $product->description = $validation_data['description'];
        $product->price = $validation_data['price'];
        $product->old_price = $validation_data['old_price'];
        $product->weight = $validation_data['weight'];
        $product->seo_id = $seo_id;
        $product->save();

        //добавление связей к товару (категория товар)
        $product->categories()->attach($category);

        // Добавление кртинки

        ImageProductController::add_image_product($request, $product);
        CharecterProductController::add($request, $product->id);

        //  конец добавления картинок к товару 


        return back();
    }


    public function form_update($id)
    {
        $status = 'update';
        $charecters = Charecter::all();
        // Вывод формы обновления товара 
        $product = Product::where('id', $id)->first();
        $category = Category::all();
        $seo = $product->seo()->first();
        $select_index_category = [];
        $select_category = CategoryProduct::where('product_id', $product->id)->get();

        $images = $product->images;
        foreach ($select_category as $cat) {
            array_push($select_index_category, $cat->category_id);
        }
        return view('admin/product/create_product', compact('product', 'category', 'seo', 'select_index_category', 'images', 'status', 'charecters'));
    }

    public function update(Request $request, $id)
    {
        // обновление товара 

        $validation_data = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'old_price' => ['required'],
            'weight' => ['required'],
        ]);


        $product = Product::find($id);
        $product->title = $validation_data['title'];
        $product->description = $validation_data['description'];
        $product->price = $validation_data['price'];
        $product->old_price = $validation_data['old_price'];
        $product->weight = $validation_data['weight'];
        $product->save();



        $seo = new SeoController();
        $seo_id = $seo->update($request, $product->seo->id);

        // обновление привязки к категориям 
        if ($request->has('category')) {

            $category_delete = CategoryProduct::where('product_id', $product->id)->get();
            foreach ($category_delete as $cat_delete) {
                $cat_delete->delete();
            }
            foreach ($request->category as $cat) {
                $category_product = new CategoryProduct();
                $category_product->product_id = $product->id;
                $category_product->category_id = $cat;
                $category_product->save();
            }
        }


        // добавление картинок к товару
        ImageProductController::add_image_product($request, $product);
        CharecterProductController::add($request, $product->id);


        return back();
    }


    public function delete(Request $request, $id)
    {
        $product = Product::find($id);
        $product->delete();
        return back();
    }
}
