<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\View\Composers\PostComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Share All Posts
        View::composer('layouts.frontend.partials.post-list', function($view){
            $route = Route::current();
            
            if( $route->uri == 'category-posts/{category_slug}' ){

                $category = Category::where('slug', $route->parameter('category_slug'))->first();
                $view->with('posts', $category->posts()->published()->paginate(4));

            }elseif( $route->uri == 'tag-posts/{tag_slug}' ){

                $tag = Tag::where('slug', $route->parameter('tag_slug'))->first();
                $view->with('posts', $tag->posts()->published()->paginate(4));

            }else{

                $view->with('posts', Post::latest()->published()->paginate(4));

            }
        });

        // Share Post Details
        View::composer('layouts.frontend.partials.post-details', function($view){
            $route = Route::current();
            $param = $route->parameter('slug');
            $view->with('post', Post::where('slug', $param)->first());
        });
    }
}
