<?php

use App\Http\Livewire\Posts\PostEdit;
use App\Http\Livewire\Posts\PostShow;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Posts\PostCreate;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PostMediaController;
use App\Http\Controllers\Posts\PostsController;
use App\Http\Controllers\BlogCategoriesController;
use App\Http\Controllers\Bookmarks\BookmarksController;
use App\Http\Controllers\Bookmarks\BookmarksCategoriesController;

// General
Route::get('/', WelcomeController::class)->name('welcome');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/tags', [BlogCategoriesController::class, 'index'])->name('blog.categories');
Route::get('/blog/tags/{tag}', [BlogCategoriesController::class, 'show'])->name('blog.categories.show');

// Posts
Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
Route::post('/posts/media/upload', PostMediaController::class)->name('posts.media.upload');
Route::get('/posts/{post}', PostShow::class)->name('posts.show');
Route::get('/posts/{post}/edit', PostEdit::class)->name('posts.edit');

// Projects
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::view('/projects/katy-rose-floral', 'projects.pages.katyrosefloral.index')->name('projects.show.katyrosefloral');

// Timeline
Route::view('/timeline', 'timeline.index')->name('timeline.index');

// Bookmarks
Route::get('/bookmarks', [BookmarksController::class, 'index'])->name('bookmarks.index');
Route::get('/bookmarks/create', [BookmarksController::class, 'create'])->name('bookmarks.create');
Route::post('/bookmarks', [BookmarksController::class, 'store'])->name('bookmarks.store');
Route::get('/bookmarks/tags', [BookmarksCategoriesController::class, 'index'])->name('bookmarks.categories');
Route::get('/bookmarks/tags/{tag}', [BookmarksCategoriesController::class, 'show'])->name('bookmarks.categories.show');