<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserProgramController;
use App\Http\Controllers\Auth\PasswordResetController;

// Format routing: Route::method('uri', $callback);
Route::get('/', [PageController::class, 'homePage'])->name('page.home');
Route::get('/contact', [PageController::class, 'contactPage'])->name('page.contact');
Route::get('/about', [PageController::class, 'aboutPage'])->name('page.about');

// Authentication Routes
Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/forgot-password', [PasswordResetController::class, 'requestForm'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'resetForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'updatePassword'])->name('password.update');

// Protected Admin Routes
Route::group(['middleware' => 'auth', 'prefix' => 'pengurusan'], function () {
    
    // Keep only this route - it calls the controller with data
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard/data', [DashboardController::class, 'getData'])->name('admin.dashboard.data');

    // Users Management
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UserController::class,'show'])->name('users.show');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::post('/users/{id}/programs', [UserProgramController::class, 'store'])->name('users.programs.store');
    


    // Programs Management
    Route::resource('programs', ProgramController::class);
    // Route::resource('programs', ProgramController::class);
    // Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
    // Route::get('/programs/create', [ProgramController::class, 'create'])->name('programs.create');
    // Route::post('/programs', [ProgramController::class, 'store'])->name('programs.store');
    // Route::get('/programs/{id}', [ProgramController::class, 'show'])->name('programs.show');
    // Route::get('/programs/{id}/edit', [ProgramController::class, 'edit'])->name('programs.edit');
    // Route::put('/programs/{id}/edit', [ProgramController::class, 'update'])->name('programs.update');
    // Route::delete('/programs/create', [ProgramController::class, 'destroy'])->name('programs.destroy');
    // Route::resource('programs', ProgramController::class)->only('index', 'create', 'store', 'show', 'edit', 'update', 'destroy');

});

// Additional protected routes
Route::middleware(['auth'])->group(function () {
    // Profile management routes
    Route::get('/profile', function () {
        return view('admin.profile');
    })->name('profile.show');
    
    Route::get('/profile/edit', function () {
        return view('admin.profile-edit');
    })->name('profile.edit');
    
    Route::put('/profile', function () {
        // Handle profile update logic
        return redirect()->route('profile.show')->with('mesej-success', 'Profil berjaya dikemaskini.');
    })->name('profile.update');
});





