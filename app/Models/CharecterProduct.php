<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Charecter; 
class CharecterProduct extends Model
{
    use HasFactory;
    public function getCharecter(){
        $charecter = $this->belongsTo(Charecter::class, 'charecter_id'); 
        return  $charecter ; 
    }
}
