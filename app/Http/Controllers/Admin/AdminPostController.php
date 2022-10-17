<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::when(request('search'), function($query){
            $query->where('title', 'like', '%'.request('search').'%');
        })->latest()->paginate(4);

        $posts->appends(request()->all());
        
        return view('admin.post.index', compact('posts'))
        ->with('i', (request()->input('page', 1) - 1) * 4);
    }


    public function create()
    {
        $tags       = Tag::all();
        $categories = Category::all();

        return view('admin.post.form', compact('tags', 'categories'));
    }


    public function store(PostRequest $request)
    {
        $post = Post::create( $request->except(['tags', 'categories']) );
        $this->storePostImage($post);
        
        $post->tags()->sync($request->input('tags', []));
        $post->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.post.index')->with('success', 'New Post Created Successfully');
    }


    public function edit(Post $post)
    {
        $tags       = Tag::all();
        $categories = Category::all();
        return view('admin.post.form', compact('tags', 'categories', 'post'));
    }


    public function update(Post $post, PostRequest $request)
    {
        $post->update( $request->except(['tags', 'categories']) );

        $post->tags()->sync($request->input('tags', []));
        $post->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.post.index')->with('success', 'Post Updated Successfully');
    }


    public function destroy(Post $post)
    {
        $post->delete();
        
        return redirect()->route('admin.post.index')->with('success', 'Post Deleted Successfully');
    }


    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }


    public function updatePostStatus()
    {
        $data = request()->all();
        Post::where('id', $data['id'])->update([
            'status' => $data['status']
        ]);

        return response()->json(['message' => 'SUCCESS'], 200);
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
