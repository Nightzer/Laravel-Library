<?php

namespace App\Providers;

use App\Services\Author;
use App\Services\Book;
use App\Services\Category;
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
        $this->app->bind('Author', function () {
            return new Author();
        });

        $this->app->bind('Book', function () {
            return new Book();
        });

        $this->app->bind('Category', function () {
            return new Category();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
