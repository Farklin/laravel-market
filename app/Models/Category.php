<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seo;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    /**
     * Продукты категории 
     *
     * @return void
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Meta страницы
     *
     * @return void
     */
    public function seo()
    {
        return $this->belongsTo(Seo::class, 'seo_id');
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * Вывод дочерних категорий
     *
     * @return void
     */
    public function categoryChildren()
    {
        return $this->hasMany(Category::class)->with('category');;
    }

    /**
     * Страница опубликована 
     *
     * @param boolean $public
     * @return void
     */
    public function setPublic(bool $public)
    {
        if (is_bool($public)) {
            $this->public = $public;
        }
    }

    /**
     * Отображение на главной странице 
     *
     * @param boolean $public
     * @return void
     */
    public function setDisplayMainPage(bool $public)
    {
        if (is_bool($public)) {
            $this->display_main_page = $public;
        }
    }
    /**
     * Отображение в Sidebar 
     *
     * @param boolean $public
     * @return void
     */
    public function setSidebar(bool $public)
    {
        if (is_bool($public)) {
            $this->display_sidebar = $public;
        }
    }
}
