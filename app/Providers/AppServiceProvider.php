<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Yajra\DataTables\Html\Builder;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('datetime_local', function ($attribute, $value, $parameters, $validator) {
            // Lakukan validasi disini
            // Misalnya, Anda dapat menggunakan fungsi strtotime() untuk memeriksa apakah nilai dapat diubah menjadi timestamp
            return strtotime($value) !== false;
        });
    }
}
