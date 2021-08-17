<?php

namespace App\Http\Controllers;
use App\Models\Product;   
use Illuminate\Http\Request;

class ProductController extends Controller
{   
    public function create(Request $request)
    {
        //
        
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

    public function form_create()
    {
       return view('admin/product/create_product');
    }

    public function show(){
        $resutl = ''; 
        foreach (Product::all() as $product) {
            $resutl .= $product->title;
        }
        return $resutl; 
    }
}

