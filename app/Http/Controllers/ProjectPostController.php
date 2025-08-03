<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\ProjectPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectPostController extends Controller
{
    // 🔓 Public: Home page
    public function publicHome()
    {
        return view('site.home');
    }

    // 🔓 Public: List all projects with pagination (6 per page)
    public function publicList()
    {
        $projects = ProjectPost::latest()->paginate(6);
        return view('site.projects.index', compact('projects'));
    }

    // 🔓 Public: View single project by slug
    public function publicSingle($slug)
    {
        $project = ProjectPost::where('slug', $slug)->firstOrFail();
        return view('site.projects.show', compact('project'));
    }

    // 🔐 Admin: Dashboard view with project count
    public function dashboard()
    {
        $projectCount = ProjectPost::count();
        return view('admin.dashboard.index', compact('projectCount'));
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
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'github_link'  => 'nullable|url',
            'image'        => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        $slug = $this->generateUniqueSlug($request->title);

        ProjectPost::create([
            'title'        => $request->title,
            'slug'         => $slug,
            'description'  => $request->description,
            'github_link'  => $request->github_link,
            'image'        => $imagePath,
        ]);

        return redirect()->route('admin.projects.index')
                         ->with('success', 'Project created successfully.');
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
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'github_link'  => 'nullable|url',
            'image'        => 'nullable|image|max:2048',
        ]);

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
            'title'        => $request->title,
            'slug'         => $slug,
            'description'  => $request->description,
            'github_link'  => $request->github_link,
            'image'        => $imagePath,
        ]);

        return redirect()->route('admin.projects.index')
                         ->with('success', 'Project updated successfully.');
    }

    // 🔐 Admin: Delete project
    public function destroy(ProjectPost $project)
    {
        // Optionally delete image file as well
        if ($project->image && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
                         ->with('success', 'Project deleted successfully.');
    }

    // 🧠 Utility: Generate a unique slug based on the title
    private function generateUniqueSlug($title, $ignoreId = null)
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 2;

        while (
            ProjectPost::where('slug', $slug)
                ->when($ignoreId, fn($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter++;
        }

        return $slug;
    }
}
