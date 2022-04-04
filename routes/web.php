<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Front-End Routes
Route::get('/', [HomeController::class, 'index'])->name('site-url');

// Back-End Routes

Route::prefix('dashboard')->group(function () {
    // Route::get('/users', function () {
    //     // Matches The "/admin/users" URL
    // });
    Route::get('/', [AdminController::class, 'adminHome'])->name('admin-dashboard');
    Route::get('/all-users', [AdminController::class, 'allUsers'])->name('all-users');
});


// Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth', 'verified');

