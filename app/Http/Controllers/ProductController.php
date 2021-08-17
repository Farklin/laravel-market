<?php

namespace App\Http\Controllers;
use App\Models\Product;   
use Illuminate\Http\Request;

class ProductController extends Controller
{   
    public function create(Request $request)
    {
        //
        // $product = new Product(); 
        // $product->title = 'Новый товар'; 
        // $product->description = "Описание товара"; 
        // $product->price = 10; 
        // $product->old_price = 11; 
        // $product->weight = 99; 
        // $product->save(); 
        $title = $request->input('title'); 
        
        echo $title;  
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

