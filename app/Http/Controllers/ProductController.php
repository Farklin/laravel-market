<?php

namespace App\Http\Controllers;
use App\Models\Product;   
use Illuminate\Http\Request;

class ProductController extends Controller
{   
    public function create(Request $request)
    {
        //обработчик создания товара 
        
        $title = $request->input('title'); 

        $validation_data = $request->validate([
            'title' => ['required' ],
            'description' => ['required' ],
            'price' => ['required' ],
            'old_price' => ['required' ],
            'weight' => ['required' ],
        ]); 


        $product = new Product(); 
        $product->title = $validation_data['title']; 
        $product->description = $validation_data['description']; 
        $product->price = $validation_data['price']; 
        $product->old_price = $validation_data['old_price'];  
        $product->weight = $validation_data['weight']; 
        $product->save(); 
        
        return 'Товар успешно создан'; 
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
        //Отбражение формы создания товара 
       return view('admin/product/create_product');
    }

    public function all_product(){
        // Отображает все товаров 
        return view('catalog/product/all_product', array('products'=> Product::all())) ; 
    }
}

