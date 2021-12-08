<?php

namespace App\Models\Components;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product; 

class Actual extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'actual_products'); 
    }
}
