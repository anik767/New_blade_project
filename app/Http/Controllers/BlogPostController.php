<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{
    // 🔓 Public: List blog posts (pagination)
    public function publicList()
    {
        $posts = BlogPost::latest()->paginate(6);
        return view('site.blog.index', compact('posts'));
    }

    // 🔓 Public: Single blog post by slug
    public function publicSingle($slug)
    {
        $post = BlogPost::where('slug', $slug)->firstOrFail();
        return view('site.blog.show', compact('post'));

    }

    // 🔐 Admin: List blog posts with pagination
    public function index()
    {
        $posts = BlogPost::latest()->paginate(10);
        return view('admin.blog.index', compact('posts'));
    }

    // 🔐 Admin: Show form to create blog post
    public function create()
    {
        return view('admin.blog.create');
    }

    // 🔐 Admin: Store blog post
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog', 'public');
        }

        $slug = $this->generateUniqueSlug($request->title);

        BlogPost::create([
            'title'   => $request->title,
            'slug'    => $slug,
            'content' => $request->content,
            'image'   => $imagePath,
        ]);

        return redirect()->route('admin.blog.index')->with('success', 'Blog created successfully.');
    }

    // 🔐 Admin: Show edit form
    public function edit(BlogPost $blog)
    {
        return view('admin.blog.edit', ['post' => $blog]);
    }

    // 🔐 Admin: Update blog post
    public function update(Request $request, BlogPost $blog)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }
            $imagePath = $request->file('image')->store('blog', 'public');
        } else {
            $imagePath = $blog->image;
        }

        $slug = $blog->slug;
        if ($request->title !== $blog->title) {
            $slug = $this->generateUniqueSlug($request->title, $blog->id);
        }

        $blog->update([
            'title'   => $request->title,
            'slug'    => $slug,
            'content' => $request->content,
            'image'   => $imagePath,
        ]);

        return redirect()->route('admin.blog.index')->with('success', 'Blog updated successfully.');
    }

    // 🔐 Admin: Delete blog post
    public function destroy(BlogPost $blog)
    {
        if ($blog->image && Storage::disk('public')->exists($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Blog deleted successfully.');
    }

    // 🧠 Utility: Generate unique slug
    private function generateUniqueSlug($title, $ignoreId = null)
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 2;

        while (
            BlogPost::where('slug', $slug)
                ->when($ignoreId, fn($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter++;
        }

        return $slug;
    }
}
