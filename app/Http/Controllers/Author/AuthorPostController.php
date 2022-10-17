<?php

namespace App\Http\Controllers\Author;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

class AuthorPostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', auth()->id())->when(request('search'), function($query){
            $query->where('title', 'like', '%'.request('search').'%');
        })->latest()->paginate(4);
        
        $posts->appends(request()->all());
            
        return view('author.post.index', compact('posts'))
        ->with('i', (request()->input('page', 1) - 1) * 4);
    }


    public function create()
    {
        $tags       = Tag::all();
        $categories = Category::all();

        return view('author.post.form', compact('tags', 'categories'));
    }


    public function store(PostRequest $request)
    {
        $post = Post::create( $request->except(['tags', 'categories']) );
        $this->storePostImage($post);
        
        $post->tags()->sync($request->input('tags', []));
        $post->categories()->sync($request->input('categories', []));

        return redirect()->route('author.post.index')->with('success', 'New Post Created Successfully');
    }


    public function edit(Post $post)
    {
        abort_if( $post->user_id != auth()->id(), 404 );

        $tags       = Tag::all();
        $categories = Category::all();

        return view('author.post.form', compact('tags', 'categories', 'post'));
    }

    public function show(Post $post)
    {
        abort_if( $post->user_id != auth()->id(), 404 );

        return view('author.post.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        abort_if( $post->user_id != auth()->id(), 404 );

        return back()->with('success', 'Post Deleted Successfully');
    }

    public function storePostImage($post)
    {
        if(request()->hasFile('image')){
            $file = request()->file('image');
            $fileName = uniqid(time()) . '_' . $file->getClientOriginalName();
            $savePath = public_path('uploads/post');
            $file->move($savePath, $savePath."/$fileName");
            $post->update([
                'image' => $fileName,
            ]);
        }
    }
}
