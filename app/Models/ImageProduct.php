<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    use HasFactory;


    protected $table = 'image_product';

    public function thumbnail(){
        $path = str_replace('products/' . $this->product_id, 'products/' . $this->product_id . '/thumbnail/', $this->image_path);
        return $path; 
    }
}
