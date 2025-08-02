<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\ProjectPost;
use App\Models\BlogPost;
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
            'id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Find the commentable model
            $commentable = null;
            switch ($request->type) {
                case 'project':
                    $commentable = ProjectPost::findOrFail($request->id);
                    break;
                case 'blog':
                    $commentable = BlogPost::findOrFail($request->id);
                    break;
                case 'service':
                    $commentable = Service::findOrFail($request->id);
                    break;
            }

            // Create the comment
            $comment = $commentable->comments()->create([
                'name' => $request->name,
                'email' => $request->email,
                'comment' => $request->comment,
                'is_approved' => false // Comments need approval by default
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Comment submitted successfully! It will be visible after approval.',
                'comment' => $comment
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to submit comment. Please try again.'
            ], 500);
        }
    }
}
