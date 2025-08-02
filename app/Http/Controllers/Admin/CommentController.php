<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('commentable')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.comments.index', compact('comments'));
    }

    public function approve(Comment $comment)
    {
        $comment->update(['is_approved' => true]);
        
        return redirect()->back()->with('success', 'Comment approved successfully!');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        
        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}
