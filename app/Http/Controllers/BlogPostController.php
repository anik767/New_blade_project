<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\HomeBanner;
use App\Traits\AdminNotificationTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{
    use AdminNotificationTrait;
    // 🔓 Public: List blog posts (pagination)
    public function publicList()
    {
        $posts = BlogPost::latest()->paginate(6);
        $banner = HomeBanner::latest()->first();
        $pageBanner = \App\Models\PageBanner::where('page', 'blog')->first();
        return view('site.blog.index', compact('posts', 'banner','pageBanner'));
    }
    public function publicHome()
    {
        // Fetch latest 6 blog posts (for blog section)
        $posts = BlogPost::latest()->take(6)->get();

        // Only pass blog posts — no projects
        return view('site.home', compact('posts'));
    }

    // 🔓 Public: Single blog post by slug
    public function publicSingle($slug)
    {
        $post = BlogPost::where('slug', $slug)->firstOrFail();
        $pageBanner = \App\Models\PageBanner::where('page', 'blog')->first();
        return view('site.blog.show', compact('post','pageBanner'));
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
        try {
            $request->validate([
                'title'   => 'nullable|string|max:255',
                'content' => 'nullable|string',
                'image'   => 'nullable|image',
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

            return $this->successRedirect('Blog created successfully.', 'admin.blog.index');
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to create blog post');
        }
    }

    // 🔐 Admin: Show edit form
    public function edit(BlogPost $blog)
    {
        try {
            return view('admin.blog.edit', ['post' => $blog]);
        } catch (\Exception $e) {
            return $this->errorRedirect('Blog post not found', 'admin.blog.index');
        }
    }

    // 🔐 Admin: Update blog post
    public function update(Request $request, BlogPost $blog)
    {
        try {
            $request->validate([
                'title'   => 'nullable|string|max:255',
                'content' => 'nullable|string',
                'image'   => 'nullable|image',
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

            return $this->successRedirect('Blog updated successfully.', 'admin.blog.index');
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to update blog post');
        }
    }

    // 🔐 Admin: Delete blog post
    public function destroy(BlogPost $blog)
    {
        try {
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }

            $blog->delete();

            return $this->successRedirect('Blog deleted successfully.', 'admin.blog.index');
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to delete blog post');
        }
    }

    // 🧠 Utility: Generate unique slug
    public function generateUniqueSlug($title, $ignoreId = null)
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
