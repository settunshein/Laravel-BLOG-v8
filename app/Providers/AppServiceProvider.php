<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        Paginator::useBootstrap();
        
        View::share('tags', Tag::all());
        View::share('categories', Category::all());
        View::share('recent_posts', Post::select('title', 'slug', 'created_at')->orderBy('created_at', 'DESC')->take(4)->get());
    }
}
