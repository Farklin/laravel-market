<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; //
use App\Models\Category; //
use App\Models\Page; //



class SitemapController extends Controller
{
    public function index(){
        $categories = Category::all(); 
        $products = Product::all(); 
        $pages = Page::all(); 

        return view('sitemap', compact('categories', 'products', 'pages'));  
    }
}
