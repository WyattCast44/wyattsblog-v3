<?php

use App\Http\Livewire\Posts\PostEdit;
use App\Http\Livewire\Posts\PostShow;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Posts\PostCreate;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PostMediaController;
use App\Http\Controllers\BlogCategoriesController;

// General
Route::get('/', WelcomeController::class)->name('welcome');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/tags', [BlogCategoriesController::class, 'index'])->name('blog.categories');
Route::get('/blog/tags/{tag}', [BlogCategoriesController::class, 'show'])->name('blog.categories.show');

// Posts
Route::get('/posts/create', PostCreate::class)->name('posts.create');
Route::post('/posts/media/upload', PostMediaController::class)->name('posts.media.upload');
Route::get('/posts/{post}', PostShow::class)->name('posts.show');
Route::get('/posts/{post}/edit', PostEdit::class)->name('posts.edit');

// Projects
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

// Timeline
Route::view('/timeline', 'timeline.index')->name('timeline.index');

// Bookmarks
Route::view('/bookmarks', 'bookmarks.index')->name('bookmarks.index');