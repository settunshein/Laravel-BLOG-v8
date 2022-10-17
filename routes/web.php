<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Author\AuthorPostController;
use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Author\AuthorProfileController;
use App\Http\Controllers\Author\AuthorDashboardController;

/* Auth Routes */
Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);


/* Frontend Routes */
Route::view('/', 'frontend.index');
Route::view('/post/{slug}', 'frontend.details');
Route::view('/category-posts/{category_slug}', 'frontend.category-posts');
Route::view('/tag-posts/{tag_slug}', 'frontend.tag-posts');

Route::middleware('auth')->group(function(){
    Route::post('/like/{post_id}', function($post_id){
        $user = auth()->user();
        $isLikePost = $user->like_posts()->where('post_id', $post_id)->count();
        $isLikePost == 0 ? $user->like_posts()->attach($post_id) : $user->like_posts()->detach($post_id);
        return back();
    })->name('post.like');
    
    Route::post('comment/create', [AdminCommentController::class, 'store'])->name('comment.store');
});



/* Admin Routes */
Route::group([ 'as'=>'admin.', 'prefix'=>'admin', 'middleware'=>['auth', 'admin_auth', 'prevent_back_history'] ], function(){
    // Dashboard
    Route::get('/', [AdminDashboardController::class, 'adminDashboard'])->name('dashboard');

    // Category Module
    Route::resource('category', CategoryController::class);

    // Tag Module
    Route::resource('tag', TagController::class);

    // Post
    Route::resource('post', AdminPostController::class);
    Route::post('update-post-status', [AdminPostController::class, 'updatePostStatus']);

    // User Module
    Route::resource('user', UserController::class);

    // Profile Module
    Route::controller(AdminProfileController::class)->group(function(){
        Route::get('/profile',        'showProfilePage')->name('profile');
        Route::get('/profile/edit',   'showEditProfilePage')->name('profile.edit');
        Route::post('/profile/edit',  'submitEditProfilePage')->name('profile.update');
        Route::get('/password/edit',  'showEditPasswordPage')->name('password.edit');
        Route::post('/password/edit', 'submitEditPasswordPage')->name('password.update');
    });
});


/* Author Routes */
Route::group([ 'as'=>'author.', 'prefix'=>'author', 'middleware'=>['auth', 'author_auth', 'prevent_back_history'] ], function(){
    // Dashboard
    Route::get('/', [AuthorDashboardController::class, 'authorDashboard'])->name('dashboard');

    // Post Module
    Route::resource('post', AuthorPostController::class);

    // Profile Module
    Route::controller(AuthorProfileController::class)->group(function(){
        Route::get('/profile',        'showProfilePage')->name('profile');
        Route::get('/profile/edit',   'showEditProfilePage')->name('profile.edit');
        Route::post('/profile/edit',  'submitEditProfilePage')->name('profile.update');
        Route::get('/password/edit',  'showEditPasswordPage')->name('password.edit');
        Route::post('/password/edit', 'submitEditPasswordPage')->name('password.update');
    });
});


/* Testing Routes */
Route::get('/lorem-ipsum/dollar/{slug}', function(){
    return Route::current()->uri() == 'lorem-ipsum/dollar/{slug}' ? 'Correct' : 'InCorrect';
});

Route::get('/test-posts/{test_slug}', function(){
    $route  = Route::current();
    //dd($route->uri);

    $param = $route->parameter('test_slug');
    //dd($param);
});