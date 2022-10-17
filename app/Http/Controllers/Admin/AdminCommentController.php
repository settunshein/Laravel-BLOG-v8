<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

class AdminCommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        Comment::create($request->all());
    }
}
