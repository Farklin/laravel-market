<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommentProduct; 


class CommentProductController extends Controller
{

    //Вывод всех коментариев
    public function all(Request $request){
        
    switch($request->input('status')){
        case 'on':
            $comments = CommentProduct::where('status', 1); 
            return view('admin.comment.all', compact('comments'));
        case 'off':
            $comments = CommentProduct::where('status', 0); 
            return view('admin.comment.all', compact('comments'));
        default: 
            $comments = CommentProduct::all(); 
            return view('admin.comment.all', compact('comments'));
        }
    }
    
    //Удаление коментария
    public function delete(Request $request, $id){ 
        $comment = CommentProduct::find($id); 
        $comment->delete(); 
        return back(); 
    }
    //изменение статуса коментария
    public function editStatus(Request $request, $id){ 

        $comment = CommentProduct::find($id); 
        $comment->status = !$comment->status; 
        $comment->save(); 
        return back(); 
    }

    

}
