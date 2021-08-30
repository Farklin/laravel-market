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


class ProductController extends Controller
{
    //  

    public function all(){
        // Вывод всех товаров в административной части
        $products = Product::all(); 
        return view('admin.product.all', array('products' => $products) );
    }


    public function form_create()
    {
        // Вывод формы создания товара
       $category = Category::all(); 
       return view('admin/product/create_product', array('category' => $category));
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
    {   
        // Вывод формы обновления товара 
        $product = Product::where('id', $id)->first();
        $category = Category::all();  
        $seo = $product->seo()->first();  
        return view('admin/product/update_product', array('product'=>$product, 'category' => $category, 'seo'=> $seo)); 
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


            $categories = Category::find($request->category);
            CategoryProduct::where('product_id' , $product->id)->delete();
            foreach($categories as $category){
                $product->categories()->attach($category); 
            }
                
            
        }


        // добавление картинок к товару
        ImageProductController::add_image_product($request, $product); 
        
        return back(); 
        
    }

    
    public function delete(Request $request, $id)
    {
        $product = Product::find($id)->delete(); 
        return back(); 
    }

}
