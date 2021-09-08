<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\Product;
use App\Models\Seo;

use Illuminate\Support\Str;

class ProductImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {   
           
            $product = new Product; 
            $product->title = $row['title'];
            $product->description = $row['description'];
            $product->price = $row['price'];
            $product->old_price = $row['old_price'];
            $product->weight = $row['weight'];

            $seo = new Seo;
            $seo->title = $row['seo_title']; 
            $seo->description = $row['seo_description']; 
            $seo->slug = Str::slug($row['title']); 
            $seo->save(); 
            
            $product->seo_id = $seo->id;
            $product->save(); 

        }
    }
}
