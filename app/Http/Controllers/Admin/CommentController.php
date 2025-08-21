<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Traits\AdminNotificationTrait;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    use AdminNotificationTrait;
    public function index()
    {
        $comments = Comment::with('commentable')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.comments.index', compact('comments'));
    }

    public function show(Comment $comment)
    {
        $comment->load('commentable');
        return view('admin.comments.show', compact('comment'));
    }

    public function approve(Comment $comment)
    {
        $comment->update(['is_approved' => true]);
        
        return $this->successRedirect('Comment approved successfully!');
    }

    public function updateStatus(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'status' => 'required|in:approved,pending',
        ]);

        $comment->is_approved = $validated['status'] === 'approved';
        $comment->save();

        return $this->successRedirect('Comment status updated successfully!');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        
        return $this->successRedirect('Comment deleted successfully!');
    }
}
