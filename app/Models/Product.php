<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Basket; 
use App\Models\ImageProduct; 

class Product extends Model
{
    use HasFactory;

    protected $table = 'product'; 

    
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function images(){
        
        return $this->hasMany(ImageProduct::class); 
    }
    public function baskets() {
        return $this->belongsToMany(Basket::class)->withPivot('quantity');
    }


}
