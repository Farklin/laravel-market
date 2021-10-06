<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommentProduct; 

class AdminController extends Controller
{
    public function index(){

        $comments = CommentProduct::all();

        return view('admin.layouts.home', compact(
            'comments'
        
        )); 
    }
}
