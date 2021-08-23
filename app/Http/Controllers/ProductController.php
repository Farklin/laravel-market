<?php

namespace App\Http\Controllers;
use App\Models\Product;   
use App\Models\Category;  
use App\Models\ImageProduct;  
use App\Models\CategoryProduct;  
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\ImageProductController; 


/* TODO 
* Оформление заказа на мыльце (телефон, почта, имя, product, кол.)
* Количество товара 
* 
*/ 



class ProductController extends Controller
{   
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

        $category = Category::find($validation_data['category']); 

        $product = new Product(); 
        $product->title = $validation_data['title']; 
        $product->description = $validation_data['description']; 
        $product->price = $validation_data['price']; 
        $product->old_price = $validation_data['old_price'];  
        $product->weight = $validation_data['weight']; 
        $product->save(); 
        
        //добавление связей к товару (категория товар)
        $product->categories()->attach($category);
       
        // Добавление кртинки

        ImageProductController::add_image_product($request, $product); 

        //  конец добавления картинок к товару 


        return 'Товар успешно создан'; 
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
        
        //return redirect()->route('form_product_update', $product->id); 
        
    }
    public function show($id)
    {
        // Показать карточку товара
        $element = new Product(); 
        $product = $element->where('id', $id)->first();     
        $products = Product::all()->take(3); 

        $images = ImageProduct::where('product_id', $product->id)->get(); 

        return view('catalog/product/view_product', array('product' => $product, 'products'=> $products, 'images' => $images));  
    }
    public function form_create()
    {
        // Вывод формы создания товара
       $category = Category::all(); 
       return view('admin/product/create_product', array('category' => $category));
    }
    public function form_update($id)
    {   
        // Вывод формы обновления товара 
        $product = Product::where('id', $id)->first();
        $category = Category::all();  
        return view('admin/product/update_product', array('product'=>$product, 'category' => $category)); 
    }

    

    public function all_product(){
        // Отображает всех товаров 
        return view('catalog/product/all_product', array('products'=> Product::all())) ; 
    }

    
}

