<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\HomeBannerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeExperienceController;
use App\Http\Controllers\HomeSkillsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController as ProjectPostController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

// Public routes (no prefix, no middleware)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'publicShow'])->name('about');
Route::get('/services', [ServiceController::class, 'publicList'])->name('services');
Route::get('/services/{slug}', [ServiceController::class, 'publicSingle'])->name('services.show');
Route::get('/contact', [ContactController::class, 'publicShow'])->name('contact');
Route::post('/contact/submit', [ContactFormController::class, 'submit'])->name('contact.submit');
Route::get('/projects', [ProjectPostController::class, 'publicList'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectPostController::class, 'publicSingle'])->name('projects.show');

// Public blog routes
Route::prefix('blog')->name('site.blog.')->group(function () {
    Route::get('/', [BlogController::class, 'publicList'])->name('index');   // site.blog.index
    Route::get('/{slug}', [BlogController::class, 'publicSingle'])->name('show'); // site.blog.show
});

// Comment submission
Route::post('/comment', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');

// Admin routes (with prefix 'admin' and auth middleware)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [ProjectPostController::class, 'dashboard'])->name('dashboard');

    // Home Banner routes
    Route::get('home/banner', [HomeBannerController::class, 'edit'])->name('home.banner.edit');
    Route::put('home/banner', [HomeBannerController::class, 'update'])->name('home.banner.update');

    // Page Banners
    Route::get('page-banners', [\App\Http\Controllers\Admin\PageBannerController::class, 'index'])->name('page-banners.index');
    Route::get('page-banners/{page}', [\App\Http\Controllers\Admin\PageBannerController::class, 'edit'])->name('page-banners.edit');
    Route::put('page-banners/{page}', [\App\Http\Controllers\Admin\PageBannerController::class, 'update'])->name('page-banners.update');

    // Home Skills routes
    Route::get('home/skills', [HomeSkillsController::class, 'edit'])->name('home.skills.edit');
    Route::put('home/skills', [HomeSkillsController::class, 'update'])->name('home.skills.update');

    // Home Experience routes
    Route::get('home/experience', [HomeExperienceController::class, 'edit'])->name('home.experience.edit');
    Route::put('home/experience', [HomeExperienceController::class, 'update'])->name('home.experience.update');

    Route::get('/projects', [ProjectPostController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectPostController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectPostController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [ProjectPostController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectPostController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectPostController::class, 'destroy'])->name('projects.destroy');

    Route::resource('blog', BlogController::class);
    Route::resource('services', ServiceController::class);

    // About - Edit only
    Route::get('/about', [AboutController::class, 'edit'])->name('about.edit');
    Route::post('/about', [AboutController::class, 'update'])->name('about.update');

    

    // Contact - Edit only
    Route::get('/contacts', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::post('/contacts', [ContactController::class, 'update'])->name('contacts.update');

    // Contact Messages Management
    Route::get('/contact-messages', [ContactFormController::class, 'index'])->name('contact-messages.index');
    Route::get('/contact-messages/{contactMessage}', [ContactFormController::class, 'show'])->name('contact-messages.show');
    Route::put('/contact-messages/{contactMessage}/status', [ContactFormController::class, 'updateStatus'])->name('contact-messages.update-status');
    Route::delete('/contact-messages/{contactMessage}', [ContactFormController::class, 'destroy'])->name('contact-messages.destroy');

    // Comments management
    Route::get('/comments', [App\Http\Controllers\Admin\CommentController::class, 'index'])->name('comments.index');
    Route::get('/comments/{comment}', [App\Http\Controllers\Admin\CommentController::class, 'show'])->name('comments.show');
    Route::patch('/comments/{comment}/approve', [App\Http\Controllers\Admin\CommentController::class, 'approve'])->name('comments.approve');
    Route::put('/comments/{comment}/status', [App\Http\Controllers\Admin\CommentController::class, 'updateStatus'])->name('comments.update-status');
    Route::delete('/comments/{comment}', [App\Http\Controllers\Admin\CommentController::class, 'destroy'])->name('comments.destroy');

    // User Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::post('/profile/image', [ProfileController::class, 'updateProfileImage'])->name('profile.image.update');
});

require __DIR__.'/auth.php';
