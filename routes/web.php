<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public pages
Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/services', [PagesController::class, 'services'])->name('services');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');


/*
Route::get('/dashboard', [PagesController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');
*/

// Auth routes (login/register/logout/password reset)
Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');


Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])
    ->middleware('auth')
    ->name('posts.edit');


// Posts (FULL CRUD, protected)
Route::resource('posts', PostsController::class)
    ->only(['update', 'store', 'edit', 'create', 'destroy'])
    ->middleware('auth');

// Public
Route::resource('posts', PostsController::class)
    ->only(['index', 'show']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');
