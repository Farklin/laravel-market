<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubric extends Model
{
    use HasFactory;

    public function rubrics(){
        return $this->hasMany(Rubric::class); 
    }
    public function rubricsChildren(){
        return $this->hasMany(Rubric::class)->with('rubric');; 
    }

}
