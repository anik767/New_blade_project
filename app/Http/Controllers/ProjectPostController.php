<?php

namespace App\Http\Controllers;

use App\Models\ProjectPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectPostController extends Controller
{
    // 🔓 Public: Home page
    public function publicHome()
    {
        return view('site.home');
    }

    // 🔓 Public: List all projects
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

    // 🔐 Admin: Dashboard view
    public function dashboard()
    {
        $projectCount = ProjectPost::count();
        return view('admin.dashboard', compact('projectCount'));
    }

    // 🔐 Admin: List projects
    public function index()
    {
        $projects = ProjectPost::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    // 🔐 Admin: Show create form
    public function create()
    {
        return view('admin.projects.create');
    }

    // 🔐 Admin: Store new project
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'github_link' => 'nullable|url',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        ProjectPost::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'github_link' => $request->github_link,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    // 🔐 Admin: Show edit form
    public function edit(ProjectPost $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    // 🔐 Admin: Update project
    public function update(Request $request, ProjectPost $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'github_link' => 'nullable|url',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $project->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        $project->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'github_link' => $request->github_link,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    // 🔐 Admin: Delete project
    public function destroy(ProjectPost $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
