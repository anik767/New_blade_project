<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\ProjectPost;
use App\Models\HomeBanner;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $posts = BlogPost::latest()->paginate(3);           // Latest 6 blog posts
        $projects = ProjectPost::latest()->take(3)->get();  // Latest 3 projects
        $services = Service::where('is_active', true)->orderBy('order')->take(3)->get(); // Top 6 services

        // Assuming you have only one banner or want the latest banner
        $banner = HomeBanner::latest()->first();

        // Pass all data to the home view
        return view('site.home.index', compact('posts', 'projects', 'services', 'banner'));
    }
}
