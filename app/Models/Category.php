<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seo; 

class Category extends Model
{
    use HasFactory;

    protected $table = 'category'; 

    public function products(){
        return $this->belongsToMany(Product::class);
    }
    public function seo(){
        return $this->belongsTo(Seo::class);
    }
}
