<?php

namespace App\Http\Controllers;
use App\Models\Product;   
use App\Models\Category;  

use Illuminate\Http\Request;

class ProductController extends Controller
{   
    public function create(Request $request)
    {
        //обработчик создания товара 
        
        $category = $request->input('category'); 

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
        

        $product->categories()->attach($category);
        
        return 'Товар успешно создан' . $category[1]; 
    }
    public function show($id)
    {
        // Показать карточку товара
        $element = new Product(); 
        $product = $element->where('id', $id)->first();     
        $products = Product::all()->take(3); 
        return view('catalog/product/view_product', array('product' => $product, 'products'=> $products));  
    }
    public function form_create()
    {
       $category = Category::all(); 
       return view('admin/product/create_product', array('category' => $category));
    }

    public function all_product(){
        // Отображает все товаров 
        return view('catalog/product/all_product', array('products'=> Product::all())) ; 
    }

    
}

