<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Theme;
use Illuminate\Support\Facades\DB;

class ThemeController extends Controller
{
    public function index()
    {
        $themes = Theme::all();
        $selected = DB::table('settings')->where('key', 'selected_theme')->value('value');
        return view('admin.themes.index', compact('themes', 'selected'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:themes,slug',
            'colors' => 'required|json',
        ]);
        Theme::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'colors' => json_decode($request->colors, true),
        ]);
        return redirect()->route('admin.themes.index')->with('success', 'Theme added!');
    }

    public function activate(Theme $theme)
    {
        DB::table('settings')->updateOrInsert(
            ['key' => 'selected_theme'],
            ['value' => $theme->id]
        );
        return redirect()->route('admin.themes.index')->with('success', 'Theme activated!');
    }

    public function edit(\App\Models\Theme $theme)
    {
        return view('admin.themes.edit', compact('theme'));
    }

    public function update(\Illuminate\Http\Request $request, \App\Models\Theme $theme)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:themes,slug,' . $theme->id,
            'colors' => 'required|json',
        ]);
        $theme->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'colors' => json_decode($request->colors, true),
        ]);
        return redirect()->route('admin.themes.index')->with('success', 'Theme updated!');
    }

    public function setActive(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'theme_id' => 'required|exists:themes,id',
        ]);
        \DB::table('settings')->updateOrInsert(
            ['key' => 'selected_theme'],
            ['value' => $request->theme_id]
        );
        return redirect()->route('admin.themes.index')->with('success', 'Theme updated!');
    }
}
