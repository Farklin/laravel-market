<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ImageProduct;
use App\Models\CategoryProduct;
use App\Models\Seo;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\ImageProductController;


/* TODO 
* Оформление заказа на мыльце (телефон, почта, имя, product, кол.)
* Количество товара 
* Коментарии
*/



class ProductController extends Controller
{

    public function show($slug)
    {

        // запрос чпу
        $seo_id = Seo::where('slug', $slug)->first()->id;
        // Показать карточку товара
        $element = new Product();
        $product = $element->where('seo_id', $seo_id)->first();
        $products = Product::all()->take(3);

        $images = ImageProduct::where('product_id', $product->id)->get();

        return view('catalog/product/view_product', array('product' => $product, 'products' => $products, 'images' => $images));
    }



    public function all_product(Request $request)
    {
        // Отображает всех товаров 


        switch ($request->input('sort')) {
            case 'upprice':
                $products = Product::orderBy('price', 'desc')->paginate(20);
                return view('catalog/product/all_product', compact('products'));

            case 'downprice':
                $products = Product::orderBy('price', 'asc')->paginate(20);
                return view('catalog/product/all_product', compact('products'));

            case 'new':
                $products = Product::latest()->paginate(20);
                return view('catalog/product/all_product', compact('products'));


            case 'upname':
                $products = Product::orderBy('title', 'asc')->paginate(20);
                return view('catalog/product/all_product', compact('products'));

            case 'downname':
                $products = Product::orderBy('title', 'desc')->paginate(20);
                return view('catalog/product/all_product', compact('products'));

            default:
                $products = Product::latest()->paginate(20);
                return view('catalog/product/all_product', compact('products'));
        }
    }
}
