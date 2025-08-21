<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\HomeBanner;
use App\Traits\AdminNotificationTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    use AdminNotificationTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::orderBy('order')->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'icon' => 'nullable|string|max:255',
                'image' => 'nullable|image',
                'order' => 'nullable|integer|min:0',
            ]);

            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('services', 'public');
            }

            Service::create([
                'title' => $request->title,
                'slug' => \Illuminate\Support\Str::slug($request->title),
                'description' => $request->description,
                'icon' => $request->icon,
                'image' => $imagePath,
                'order' => $request->order ?? 0,
            ]);

            return $this->successRedirect('Service created successfully.', 'admin.services.index');
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to create service');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $service = Service::findOrFail($id);
            return view('admin.services.show', compact('service'));
        } catch (\Exception $e) {
            return $this->errorRedirect('Service not found', 'admin.services.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $service = Service::findOrFail($id);
            return view('admin.services.edit', compact('service'));
        } catch (\Exception $e) {
            return $this->errorRedirect('Service not found', 'admin.services.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'icon' => 'nullable|string|max:255',
                'image' => 'nullable|image',
                'order' => 'nullable|integer|min:0',
            ]);

            $service = Service::findOrFail($id);

            if ($request->hasFile('image')) {
                if ($service->image && Storage::disk('public')->exists($service->image)) {
                    Storage::disk('public')->delete($service->image);
                }
                $imagePath = $request->file('image')->store('services', 'public');
            } else {
                $imagePath = $service->image;
            }

            $service->update([
                'title' => $request->title,
                'slug' => \Illuminate\Support\Str::slug($request->title),
                'description' => $request->description,
                'icon' => $request->icon,
                'image' => $imagePath,
                'order' => $request->order ?? $service->order,
            ]);

            return $this->successRedirect('Service updated successfully.', 'admin.services.index');
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to update service');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $service = Service::findOrFail($id);
            
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }
            
            $service->delete();

            return $this->successRedirect('Service deleted successfully.', 'admin.services.index');
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to delete service');
        }
    }

    // 🔓 Public: List all services with pagination (6 per page)
    public function publicList()
    {
        $services = Service::where('is_active', true)->orderBy('order')->paginate(6);
        $banner = HomeBanner::latest()->first();
        return view('site.services', compact('services', 'banner'));
    }

    // 🔓 Public: View single service by slug
    public function publicSingle($slug)
    {
        $service = Service::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('site.services.show', compact('service'));
    }
}
