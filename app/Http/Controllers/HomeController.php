<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\ProjectPost;
use App\Models\HomeBanner;

class HomeController extends Controller
{
    public function index()
    {
        $posts = BlogPost::latest()->paginate(6);           // Latest 6 blog posts
        $projects = ProjectPost::latest()->take(6)->get();  // Latest 3 projects

        // Assuming you have only one banner or want the latest banner
        $banner = HomeBanner::latest()->first();

        // Pass all data to the home view
        return view('site.home', compact('posts', 'projects', 'banner'));
    }
}
