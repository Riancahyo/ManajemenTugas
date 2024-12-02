<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::view('/', 'welcome');

Route::get('logout', function () {
    return view('welcome');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';



Route::group(['middleware' => ['role:admin']], function () {
    // Rute yang hanya dapat diakses oleh pengguna dengan peran 'admin'
    //   Route::get('/admin', [AdminController::class, 'index']);
Route::resource('tasks', TaskController::class);

});

// Route::group(['middleware' => ['can:create posts']], function () { ... });


// Route::middleware(['auth', 'permission:create posts'])->group(function () {
//     // Rute yang hanya dapat diakses oleh pengguna dengan izin 'create posts'
//     Route::post('/posts', [PostController::class, 'store']);
// });

Route::resource('categories', CategoryController::class);

