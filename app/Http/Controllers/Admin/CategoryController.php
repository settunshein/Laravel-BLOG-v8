<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::when(request('search'), function($query){
            $query->where('name', 'like', '%'.request('search').'%');
        })->latest()->paginate(5);

        $categories->appends(request()->all());
        
        return view('admin.category.index', compact('categories'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        return view('admin.category.form');
    }


    public function store(CategoryRequest $request)
    {
        Category::create($request->all());

        return redirect()->route('admin.category.index')->with('success', 'New Category Created Successfully');
    }


    public function edit(Category $category)
    {
        return view('admin.category.form', compact('category'));
    }


    public function update(Category $category, CategoryRequest $request)
    {
        $category->update($request->all());
        
        return redirect()->route('admin.category.index')->with('success', 'Category Updated Successfully');
    }

    
    public function destroy(Category $category)
    {
        $category->delete();
        
        return redirect()->route('admin.category.index')->with('success', 'Category Deleted Successfully');
    }
}
