<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ImageCommentProduct; 

class CommentProduct extends Model
{
    use HasFactory;
    protected $table = "comments_product"; 

    public function images(){
        return $this->hasMany(ImageCommentProduct::class ); 
    }
}
