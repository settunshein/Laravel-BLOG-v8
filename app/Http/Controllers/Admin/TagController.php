<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::when(request('search'), function($query){
            $query->where('name', 'like', '%'.request('search').'%');
        })->latest()->paginate(5);

        $tags->appends(request()->all());
        
        return view('admin.tag.index', compact('tags'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        return view('admin.tag.form');
    }


    public function store(TagRequest $request)
    {
        Tag::create($request->all());

        return redirect()->route('admin.tag.index')->with('success', 'New Tag Created Successfully');
    }


    public function edit(Tag $tag)
    {
        return view('admin.tag.form', compact('tag'));
    }


    public function update(Tag $tag, TagRequest $request)
    {
        $tag->update($request->all());

        return redirect()->route('admin.tag.index')->with('success', 'Tag Updated Successfully');
    }


    public function destroy(Tag $tag)
    {
        $tag->delete();
        
        return redirect()->route('admin.tag.index')->with('success', 'Tag Deleted Successfully');
    }
}
