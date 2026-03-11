<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\PublicationController;
Route::get('/', [PageController::class, 'show'])->name('home');

Route::get('/blogs', [PostController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{slug}', [PostController::class, 'show'])->name('blogs.show');

Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');

Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/activities/{slug}', [ActivityController::class, 'show'])->name('activities.show');

Route::get('/publications', [PublicationController::class, 'index'])->name('publications.index');
Route::get('/publications/{slug}', [PublicationController::class, 'show'])->name('publications.show');

Route::get('/{slug}', [PageController::class, 'show'])->name('page.show');
