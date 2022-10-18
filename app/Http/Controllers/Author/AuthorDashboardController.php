<?php

namespace App\Http\Controllers\Author;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorDashboardController extends Controller
{
    public function authorDashboard()
    {
        $tag_count      = Tag::all()->count();
        $category_count = Category::all()->count();
        $post_count     = Post::all()->count();
        $user_count     = User::all()->count();
        
        return view('author.dashboard', compact('tag_count', 'category_count', 'post_count', 'user_count'));
    }
}
