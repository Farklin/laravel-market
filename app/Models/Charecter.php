<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CharecterGroup; 


class Charecter extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'sorting',
        'charecter_group_id',
      ];

    /**
     * Получение группы характеристик 
     *
     * @return void
     */
    public function group(){
        return $this->belongsTo(CharecterGroup::class, 'charecter_group_id'); 
    }

}
