<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicSectionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\PageController;

// Welcome Page
Route::get('', [HomeController::class, 'index']);
// Uncomment this route to fall back to Laravel default main page
// Route::get('/', function () {
//     return view('welcome');
// });

// UserController
Route::get('account' , [UserController::class, 'showUserAccPage'])->middleware('auth');
Route::resource('users', UserController::class);
Route::put('users/{user}/password', [UserController::class, 'updatePassword'])
    ->name('users.update_password');

// PostController
Route::resource('posts', PostController::class);

// DashboardController
Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('public_section', [PublicSectionController::class, 'index']);

// AuthController - Log In
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

// AuthController - Registration
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// AuthController - Log Out
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
