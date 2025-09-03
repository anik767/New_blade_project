<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\ProjectPost;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string|max:1000',
            'type' => 'required|in:project,blog,service',
            'id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors(),
                ], 422);
            }

            return back()->withErrors($validator)->withInput();
        }

        try {
            // Find the commentable model
            $commentable = null;
            switch ($request->type) {
                case 'project':
                    $commentable = ProjectPost::findOrFail($request->id);
                    break;
                case 'blog':
                    $commentable = Blog::findOrFail($request->id);
                    break;
                case 'service':
                    $commentable = Service::findOrFail($request->id);
                    break;
            }

            // Create the comment (requires admin approval)
            $comment = $commentable->comments()->create([
                'name' => $request->name,
                'email' => $request->email,
                'comment' => $request->comment,
                'is_approved' => false,
            ]);

            $pendingMsg = 'Comment submitted! It will be visible after admin approval.';

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => $pendingMsg,
                    'comment' => $comment,
                ]);
            }

            return back()->with('success', $pendingMsg);

        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to submit comment. Please try again.',
                ], 500);
            }

            return back()->with('error', 'Failed to submit comment. Please try again.');
        }
    }
}
