<?php

namespace App\Providers;

use App\Models\Category; 
use Illuminate\Support\ServiceProvider;

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
        //
        $category = Category::where('display_main_page', True)->get(); 
       
        view()->share('header_category', $category); 
    }
}
