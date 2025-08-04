<?php

namespace App\Http\Controllers;

use App\Models\AboutMe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutMeController extends Controller
{
    /**
     * Show the form for editing the about me content.
     */
    public function edit()
    {
        $aboutMe = AboutMe::first();
        
        if (!$aboutMe) {
            // Create a default about me entry if none exists
            $aboutMe = AboutMe::create([
                'title' => 'Your Title',
                'content' => 'Tell visitors about yourself...',
                'email' => 'your.email@example.com',
                'phone' => '',
                'location' => '',
                'linkedin' => '',
                'github' => '',
            ]);
        }
        
        return view('admin.about-me.edit', compact('aboutMe'));
    }

    /**
     * Update the about me content.
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'linkedin' => 'nullable|url|max:255',
            'github' => 'nullable|url|max:255',
            'map_embed_code' => 'nullable|string',
            'skills' => 'nullable|array',
            'skills.*.name' => 'required|string|max:255',
            'skills.*.percentage' => 'required|integer|min:0|max:100',
        ]);

        $aboutMe = AboutMe::first();
        
        if (!$aboutMe) {
            $aboutMe = new AboutMe();
        }

        if ($request->hasFile('image')) {
            if ($aboutMe->image && Storage::disk('public')->exists($aboutMe->image)) {
                Storage::disk('public')->delete($aboutMe->image);
            }
            $imagePath = $request->file('image')->store('about-me', 'public');
        } else {
            $imagePath = $aboutMe->image;
        }

        // Process skills data
        $skills = [];
        if ($request->has('skills')) {
            foreach ($request->skills as $skill) {
                if (!empty($skill['name']) && isset($skill['percentage'])) {
                    $skills[] = [
                        'name' => $skill['name'],
                        'percentage' => (int) $skill['percentage']
                    ];
                }
            }
        }

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
            'linkedin' => $request->linkedin,
            'github' => $request->github,
            'map_embed_code' => $request->map_embed_code,
            'skills' => json_encode($skills),
        ];

        $aboutMe = AboutMe::firstOrCreate([], $data);
        $aboutMe->update($data);

        return redirect()->route('admin.about-me.edit')
                         ->with('success', 'About Me updated successfully.');
    }

    // 🔓 Public: Show about me page
    public function publicShow()
    {
        try {
            $aboutMe = AboutMe::first();
            
            // If no about me record exists, create a default one
            if (!$aboutMe) {
                $aboutMe = AboutMe::create([
                    'title' => 'About Me',
                    'content' => 'Tell visitors about yourself...',
                    'email' => 'your.email@example.com',
                    'phone' => '',
                    'location' => '',
                    'linkedin' => '',
                    'github' => '',
                ]);
            }
            
            return view('site.about', compact('aboutMe'));
        } catch (\Exception $e) {
            // If there's an error, return the view with null
            return view('site.about', ['aboutMe' => null]);
        }
    }
}
