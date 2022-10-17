<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withCount(['posts'])->when(request('search'), function($query){
            $query->where('name', 'like', '%'.request('search').'%');
        })->oldest()->paginate(5);
        
        $users->appends(request()->all());
        
        return view('admin.user.index', compact('users'))
        ->with('i', (request()->input('page', 1) - 1) * 4);
    }


    public function create()
    {

    }


    public function store()
    {

    }


    public function edit()
    {

    }


    public function update()
    {

    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    public function destory()
    {
        
    }
}
