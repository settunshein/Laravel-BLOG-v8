<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

class AdminCommentController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->paginate(5);
        
        return view('admin.comment.index', compact('comments'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store(CommentRequest $request)
    {
        Comment::create($request->all());
        
        return back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.comment.index')->with('success', 'Comment Deleted Successfully');
    }
}
