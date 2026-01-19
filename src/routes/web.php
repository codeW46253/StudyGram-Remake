<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicSectionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});

// AdminController
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
});

// UserController
// Display Account Info
Route::get('account' , [UserController::class, 'showUserAccPage'])->middleware('auth');

// Define common routes:
// GET[index]      | /users
// GET[create]     | /users/create
// POST[store]     | /users
// GET[show]       | /users/{user}
// GET[edit]       | /users/{user}/edit
// PUT[update]     | /users/{user}
// DELETE[destroy] | /users/{user}
Route::resource('users', UserController::class);

// Password Update
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
