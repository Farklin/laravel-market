<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ImageProduct extends Model
{
    use HasFactory;
    

    protected $table = 'image_product';

    public function thumbnail(){
        
        
        $path = str_replace('products/' . $this->product_id, 'products/' . $this->product_id . '/thumbnail', $this->image_path);
        if($this->thumbnail == null){ 

            // если файла не существует
            if(!file_exists($path)){
                $path_thumbnail = public_path() . '/images/products/' . $this->product_id . '/thumbnail'; 
                if(!file_exists($path_thumbnail)){
                    File::makeDirectory($path_thumbnail);
                }

                if(file_exists($this->image_path)){
                    $thumbnail = Image::make(public_path()  . $this->image_path)->orientate();
                    $thumbnail->fit(300, 300);
                    $thumbnail->save(public_path() . $path);
                }

            }
            $this->thumbnail = $path; 
            $this->save(); 
        }
      
        return $path; 
    }
}
