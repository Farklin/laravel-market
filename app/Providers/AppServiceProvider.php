<?php

namespace App\Providers;

use App\Models\Category; 
use App\Models\Basket; 
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $category = Category::where('display_main_page', True)->get(); 

        view()->share('header_category', $category);   

       

    

    }
}
