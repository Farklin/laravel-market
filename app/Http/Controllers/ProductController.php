<?php

namespace App\Http\Controllers;
use App\Models\Product;   
use App\Models\Category;  
use App\Models\ImageProduct;  
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

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
       
        // добавление картинок к товару 
        if($request->hasFile('image'))
        {

            //  Создание папки для хранения картинок к товару 
            $path = public_path() . '/images/products/' . $product->id; 
            File::makeDirectory($path, $mode = 0777, true, true);
            // конец создания папки для хранения картинок к товару 

            foreach($request->file('image') as $image){
                $file_name = time().'_'. $image->getClientOriginalName(); 
                $image->move($path, $file_name); 

                $image = new ImageProduct(); 
                $image->alt = $product->title; 
                $image->image_path = '/images/products/' . $product->id . '/' . $file_name; 
                $image->product_id = $product->id; 
                $image->save(); 
            }

        }
        
        //  конец добавления картинок к товару 


        return 'Товар успешно создан'; 
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
       $category = Category::all(); 
       return view('admin/product/create_product', array('category' => $category));
    }
    public function form_update($id)
    {
       $category = Category::all(); 
       $product = Product::where('id', $id)->first(); 
       return view('admin/product/create_product', array('product'=> $product, 'category' => $category));
    }

    public function all_product(){
        // Отображает все товаров 
        return view('catalog/product/all_product', array('products'=> Product::all())) ; 
    }

    
}

