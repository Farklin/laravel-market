<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class ProductsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Product::all();
    // }
    public function view():View
    {
        return view('export.products', [
            'products' => Product::all()
        ]);
    }
}
