<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharecterGroup extends Model
{
    use HasFactory;

    public function charecters(){
        return $this->hasMany(Charecter::class); 
    }
}
