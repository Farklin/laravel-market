<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Basket; 
use App\Models\ImageProduct; 
use App\Models\Seo; 
use Stem\LinguaStemRu; 
use Illuminate\Support\Facades\DB;


class Product extends Model
{
    use HasFactory;

    protected $table = 'product'; 

     /* 
    * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $search
     * @return \Illuminate\Database\Eloquent\Builder
     */


    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function images(){
        
        return $this->hasMany(ImageProduct::class); 
    }


    
    public function baskets() {
        return $this->belongsToMany(Basket::class)->withPivot('quantity');
    }
    public function seo(){
        return $this->belongsTo(Seo::class);
    }
   
    public function scopeSearch($query, $search) {
        // обрезаем поисковый запрос
        $search = iconv_substr(utf8_encode($search), 0, 64);
        // удаляем все, кроме букв и цифр
        $search = preg_replace('#[^0-9a-zA-ZА-Яа-яёЁ]#u', ' ', $search);
        // сжимаем двойные пробелы
        $search = preg_replace('#\s+#u', ' ', $search);
        $search = trim($search);
        if (empty($search)) {
            return $query->whereNull('id'); // возвращаем пустой результат
        }
        // разбиваем поисковый запрос на отдельные слова
        $temp = explode(' ', $search);
        $words = [];
        $stemmer = new LinguaStemRu();
        foreach ($temp as $item) {
            if (iconv_strlen($item) > 3) {
                // получаем корень слова
                $words[] = $stemmer->stem_word($item);
            } else {
                $words[] = $item;
            }
        }
        $relevance = "IF (`product`.`title` LIKE '%" . $words[0] . "%', 2, 0)";
        $relevance .= " + IF (`product`.`description` LIKE '%" . $words[0] . "%', 1, 0)";
        for ($i = 1; $i < count($words); $i++) {
            $relevance .= " + IF (`product`.`title` LIKE '%" . $words[$i] . "%', 2, 0)";
            $relevance .= " + IF (`product`.`description` LIKE '%" . $words[$i] . "%', 1, 0)";
        }

        $query->select('product.*', DB::raw($relevance . ' as relevance'))
            ->where('product.title', 'like', '%' . $words[0] . '%')
            ->orWhere('product.description', 'like', '%' . $words[0] . '%');
        

        for ($i = 1; $i < count($words); $i++) {
            $query = $query->orWhere('product.title', 'like', '%' . $words[$i] . '%');
            $query = $query->orWhere('product.description', 'like', '%' . $words[$i] . '%');

        }
        $query->orderBy('relevance', 'desc');
        return $query;
    }
}
