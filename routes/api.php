<?php

use App\Http\Controllers\Frontend\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/posts', [PostController::class, 'index'])->name('api.posts');
