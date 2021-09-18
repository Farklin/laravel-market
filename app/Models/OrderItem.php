<?php

namespace App\Models;
use App\Models\Product; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    public function product(){
        return $this->belongsTo(Product::class); 
    }
    public $timestamps = false;
    protected $fillable = [
        'product_id',
        'name',
        'price',
        'quantity',
        'cost',
    ];
    public function thumbnail(){ 
        $product = Product::findOrFail($this->product_id); 
        return $product->images[0]->thumbnail();
    }
}
