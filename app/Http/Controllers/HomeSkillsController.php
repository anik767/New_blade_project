<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use Illuminate\Http\Request;

class HomeSkillsController extends Controller
{
    // Show skills edit form
    public function edit()
    {
        $banner = HomeBanner::latest()->first();

        if (!$banner) {
            $banner = new HomeBanner(); // empty banner instance
        }

        return view('admin.home.skills.edit', compact('banner'));
    }

    // Update skills data
    public function update(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'skills' => 'nullable|array',
            'skills.*' => 'string|max:100',
        ]);

        // Retrieve existing banner or create new
        $banner = HomeBanner::latest()->first() ?? new HomeBanner();

        // Process skills from textarea (split by newlines and filter empty lines)
        $skillsText = $request->input('skills.0', '');
        $skillsArray = array_filter(
            array_map('trim', explode("\n", $skillsText)),
            function($skill) { return !empty($skill); }
        );

        // Update skills
        $banner->skills = array_values($skillsArray);

        // Save banner to DB
        $banner->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Skills & Tech Stack updated successfully.');
    }
} 