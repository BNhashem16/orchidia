<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Session;

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
//         app()->singleton('lang' , function(){
//           if (Session::has('lang')) {
//             return session()->get('lang');
//           } else {
// return 'en';
// }
//         });

        Schema::defaultStringLength(191);
    }
}
