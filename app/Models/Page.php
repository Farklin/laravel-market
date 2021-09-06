<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    public function pages(){
        return $this->hasMany(Pages::class); 
    }

    public function seo(){
        return $this->belongsTo(Seo::class); 
    }

}
