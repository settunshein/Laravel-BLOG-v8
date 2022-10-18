<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function adminDashboard()
    {
        $tag_count      = Tag::all()->count();
        $category_count = Category::all()->count();
        $post_count     = Post::all()->count();
        $user_count     = User::all()->count();
        
        return view('admin.dashboard', compact('tag_count', 'category_count', 'post_count', 'user_count'));
    }
}
