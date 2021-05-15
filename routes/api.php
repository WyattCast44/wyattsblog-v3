<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BookmarksController;

// Webhooks
Route::webhooks('webhooks/github', 'github');

// Bookmarks
Route::post('/bookmarks', [BookmarksController::class, 'store'])->name('api.bookmarks.store');