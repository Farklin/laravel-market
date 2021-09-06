<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Seo;

class PageController extends Controller
{

    public function index($slug) {
        $seo_id = Seo::where('slug', $slug)->first()->id; 
        $page = Page::where('seo_id', $seo_id)->first(); 
        return view('catalog.page.view', compact('page'));
    }
   


}
