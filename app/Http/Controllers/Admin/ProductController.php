<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Category; 
use App\Models\CategoryProduct; 

use App\Http\Controllers\SeoController; 
use App\Models\Seo; 
use App\Http\Controllers\ImageProductController; 


use App\Imports\ProductImport;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    //  

    public function all(){
        // Вывод всех товаров в административной части
        $products = Product::all(); 
        return view('admin.product.all', array('products' => $products) );
    }

    // импорт товаров 
    public function import(){ 
        Excel::import(new ProductImport, 'Product.xlsx');
    }


    public function export(){
        return Excel::download(new ProductsExport, 'products-collection.xlsx');
    }

    public function form_create()
    {   
        $status = 'create'; 
       $product = new Product(); 
        // Вывод формы создания товара
       $category = Category::all(); 
       return view('admin/product/create_product', compact('category', 'product', 'status'));
    }

    public function create(Request $request)
    {   
      
        //обработчик создания товара 
        
        $validation_data = $request->validate([
            'title' => ['required' ],
            'description' => ['required' ],
            'price' => ['required' ],
            'old_price' => ['required' ],
            'weight' => ['required' ],
            'category' => ['required'], 
        ]); 

        $seo = new SeoController() ; 
        $seo_id = $seo->create($request); 


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

        //  конец добавления картинок к товару 


        return back(); 
    }
    

    public function form_update($id)
    {   $status = 'update'; 
        // Вывод формы обновления товара 
        $product = Product::where('id', $id)->first();
        $category = Category::all();  
        $seo = $product->seo()->first();  
        $select_index_category = []; 
        $select_category = CategoryProduct::where('product_id', $product->id)->get(); 
        
        $images = $product->images;
        foreach ($select_category as $cat){
            array_push($select_index_category, $cat->category_id); 
        }
        return view('admin/product/create_product', compact('product', 'category', 'seo', 'select_index_category', 'images', 'status')); 
    }

    public function update(Request $request, $id){
        // обновление товара 

        $validation_data = $request->validate([
            'title' => ['required' ],
            'description' => ['required' ],
            'price' => ['required' ],
            'old_price' => ['required' ],
            'weight' => ['required' ],
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
        if($request->has('category')){
           
            $category_delete = CategoryProduct::where('product_id', $product->id)->get(); 
            foreach ($category_delete as $cat_delete){
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
        
        return back(); 
        
    }

    
    public function delete(Request $request, $id)
    {
        $product = Product::find($id); 
        $product->delete(); 
        return back(); 
    }

    

}
