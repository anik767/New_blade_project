<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\ProjectPostController;
use Illuminate\Support\Facades\Route;


// Public routes (no prefix, no middleware)
Route::get('/', [ProjectPostController::class, 'publicHome'])->name('home');
Route::get('/projects', [ProjectPostController::class, 'publicList'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectPostController::class, 'publicSingle'])->name('projects.show');
// Public blog routes
Route::prefix('blog')->name('site.blog.')->group(function () {
    Route::get('/', [BlogPostController::class, 'publicList'])->name('index');   // site.blog.index
    Route::get('/{slug}', [BlogPostController::class, 'publicSingle'])->name('show'); // site.blog.show
});



// Admin routes (with prefix 'admin' and auth middleware)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [ProjectPostController::class, 'dashboard'])->name('dashboard');

    Route::get('/projects', [ProjectPostController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectPostController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectPostController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [ProjectPostController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectPostController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectPostController::class, 'destroy'])->name('projects.destroy');

    Route::resource('blog', BlogPostController::class);
});

require __DIR__.'/auth.php';


