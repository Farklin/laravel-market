<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Seo extends Model
{
    use HasFactory;
    protected $table = 'seo'; 

    /**
     * Установка Title 
     *
     * @param string $title
     * @param string $default
     * @return void
     */
    public function setTitle(string $title, string $default)
    {
        if ($title == '') {
            $this->title = $default;
        } else {
            $this->title = $title;
        }
    }

    /**
     * Установка description 
     *
     * @param [type] $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description; 
    }

    /**
     * Установка keywords  
     *
     * @param [type] $keywords
     * @return void
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords; 
    }

    /**
     * Установка URL 
     *
     * @param [type] $url
     * @param string $default
     * @return void
     */
    public function setUrl($url, string $default)
    {
        if ($url == '') {
            $this->slug = $this->unique_slug(Str::slug($default, '-'), $this->id);
        } else {
            $this->slug = $this->unique_slug($url, $this->id);
        }
    }

    /**
     * Создание уникального URL на основе переданого 
     *
     * @param [type] $slug
     * @param [type] $id
     * @return void
     */
    static function unique_slug($slug, $id)
    {
        $count = Seo::where('slug', $slug)->exists();
        if (!$count) {
            return $slug;
        } else {
            return $slug . (string)$id;
        }
    }

}
