<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;

Route::post('/users', [UserController::class, 'store']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Halaman utama
Route::get('/', [TaskController::class, 'index'])->name('main'); // Mengarahkan ke index tugas

// Resource routes untuk tugas tanpa middleware autentikasi
// Route::resource('tasks', TaskController::class);
Route::get('categories/{category}/tasks', [TaskController::class, 'tasksByCategory'])->name('categories.tasks');

Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

Route::get('/user/{id}', function ($id) {
    return "Profil pengguna dengan ID: " . $id;
});

Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        return "Daftar pengguna";
    });
    Route::get('/posts', function () {
        return "Daftar post";
    });
});

Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class);
});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');