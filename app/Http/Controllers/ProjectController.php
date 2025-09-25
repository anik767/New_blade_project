<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use App\Models\ProjectPost;
use App\Traits\AdminNotificationTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    use AdminNotificationTrait;

    // 🔓 Public: Home page
    public function publicHome()
    {
        return view('site.home');
    }

    // 🔓 Public: List all projects with pagination (6 per page)
    public function publicList()
    {
        $projects = ProjectPost::latest()->paginate(6);
        $banner = HomeBanner::latest()->first();
        $pageBanner = \App\Models\PageBanner::where('page', 'projects')->first();

        return view('site.projects.index', compact('projects', 'banner', 'pageBanner'));
    }

    // 🔓 Public: View single project by slug
    public function publicSingle($slug)
    {
        $project = ProjectPost::where('slug', $slug)->firstOrFail();
        $pageBanner = \App\Models\PageBanner::where('page', 'projects')->first();

        return view('site.projects.show', compact('project', 'pageBanner'));
    }

    // 🔐 Admin: Dashboard view with project count
    public function dashboard()
    {
        $projectCount = ProjectPost::count();
        
        // Build recent activities collection
        $recentActivities = collect();
        
        // Add recent projects
        foreach(\App\Models\ProjectPost::latest()->take(3)->get() as $project) {
            $recentActivities->push([
                'type' => 'project',
                'title' => $project->title,
                'time' => $project->created_at,
                'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10',
                'color' => 'text-blue-500',
                'bgColor' => 'bg-blue-50',
                'url' => route('admin.projects.edit', $project)
            ]);
        }
        
        // Add recent blog posts
        foreach(\App\Models\Blog::latest()->take(2)->get() as $blog) {
            $recentActivities->push([
                'type' => 'blog',
                'title' => $blog->title,
                'time' => $blog->created_at,
                'icon' => 'M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z',
                'color' => 'text-green-500',
                'bgColor' => 'bg-green-50',
                'url' => route('admin.blog.edit', $blog)
            ]);
        }
        
        // Add recent contact messages
        foreach(\App\Models\ContactMessage::latest()->take(2)->get() as $message) {
            $recentActivities->push([
                'type' => 'message',
                'title' => 'New message from ' . $message->name,
                'time' => $message->created_at,
                'icon' => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z',
                'color' => 'text-purple-500',
                'bgColor' => 'bg-purple-50',
                'url' => route('admin.contact-messages.show', $message)
            ]);
        }
        
        // Sort by time (most recent first)
        $recentActivities = $recentActivities->sortByDesc('time')->take(5);

        return view('admin.dashboard.index', compact('projectCount', 'recentActivities'));
    }

    // 🔐 Admin: Live search for dashboard
    public function liveSearch(Request $request)
    {
        $query = $request->get('q', '');
        
        if (strlen($query) < 2) {
            return response()->json([
                'projects' => [],
                'blogs' => [],
                'services' => [],
                'totalResults' => 0,
                'query' => $query
            ]);
        }

        // Search projects with fuzzy matching
        $projects = ProjectPost::where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->orWhere('github_link', 'like', "%{$query}%")
            ->limit(5)
            ->get()
            ->map(function ($project) {
                return [
                    'id' => $project->id,
                    'title' => $project->title,
                    'description' => $project->description ? Str::limit($project->description, 100) : '',
                    'github_link' => $project->github_link
                ];
            });

        // Search blogs with fuzzy matching
        $blogs = \App\Models\Blog::where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")
            ->limit(5)
            ->get()
            ->map(function ($blog) {
                return [
                    'id' => $blog->id,
                    'title' => $blog->title,
                    'content' => $blog->content ? Str::limit(strip_tags($blog->content), 100) : ''
                ];
            });

        // Search services with fuzzy matching
        $services = \App\Models\Service::where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->limit(5)
            ->get()
            ->map(function ($service) {
                return [
                    'id' => $service->id,
                    'title' => $service->title,
                    'description' => $service->description ? Str::limit($service->description, 100) : ''
                ];
            });

        $totalResults = $projects->count() + $blogs->count() + $services->count();

        return response()->json([
            'projects' => $projects,
            'blogs' => $blogs,
            'services' => $services,
            'totalResults' => $totalResults,
            'query' => $query
        ]);
    }

    // 🔐 Admin: List all projects with pagination (10 per page)
    public function index()
    {
        $projects = ProjectPost::latest()->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    // 🔐 Admin: Show project creation form
    public function create()
    {
        return view('admin.projects.create');
    }

    // 🔐 Admin: Store new project
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'github_link' => 'nullable|url',
            'image' => 'nullable|image',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        $slug = $this->generateUniqueSlug($request->title);

        ProjectPost::create([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'github_link' => $request->github_link,
            'image' => $imagePath,
        ]);

        return $this->successRedirect('Project created successfully.', 'admin.projects.index');
    }

    // 🔐 Admin: Show project edit form
    public function edit(ProjectPost $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    // 🔐 Admin: Update existing project
    public function update(Request $request, ProjectPost $project)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'github_link' => 'nullable|url',
            'image' => 'nullable|image',
        ]);

        try {
            // Handle image upload & replace old image if new one is uploaded
            if ($request->hasFile('image')) {
                if ($project->image && Storage::disk('public')->exists($project->image)) {
                    Storage::disk('public')->delete($project->image);
                }
                $imagePath = $request->file('image')->store('projects', 'public');
            } else {
                $imagePath = $project->image;
            }

            // Update slug if title changed
            $slug = $project->slug;
            if ($request->title !== $project->title) {
                $slug = $this->generateUniqueSlug($request->title, $project->id);
            }

            $project->update([
                'title' => $request->title,
                'slug' => $slug,
                'description' => $request->description,
                'github_link' => $request->github_link,
                'image' => $imagePath,
            ]);

            return $this->successRedirect('Project updated successfully.', 'admin.projects.index');
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to update project');
        }
    }

    // 🔐 Admin: Delete project
    public function destroy(ProjectPost $project)
    {
        // Optionally delete image file as well
        if ($project->image && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return $this->successRedirect('Project deleted successfully.', 'admin.projects.index');
    }

    // 🧠 Utility: Generate a unique slug based on the title
    private function generateUniqueSlug($title, $ignoreId = null)
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 2;

        while (
            ProjectPost::where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $baseSlug.'-'.$counter++;
        }

        return $slug;
    }
}
