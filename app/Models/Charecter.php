<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charecter extends Model
{
    use HasFactory;
    /**
     * Получение группы характеристик 
     *
     * @return void
     */
    public function group(){
        return $this->belongsTo(CharectersGroup::class); 
    }

}
