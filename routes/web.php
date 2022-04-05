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
Route::post('/reservation', [HomeController::class, 'reservation'])->name('reservation');

// Back-End Routes
Route::prefix('dashboard')->group(function () {
    Route::get('/', [AdminController::class, 'adminHome'])->name('admin-dashboard');
    Route::get('/all-users', [AdminController::class, 'allUsers'])->name('all-users');

    Route::get('/edit-user/{id}', [AdminController::class, 'editUser'])->name('edit-user');
    Route::get('/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('delete-user');

    Route::get('/food-menu', [AdminController::class, 'foodMenu'])->name('food-menu');
    Route::get('/create-food', [AdminController::class, 'createFood'])->name('create-food');
    Route::post('/food-store', [AdminController::class, 'foodStore'])->name('new-food-store');
    Route::get('/edit-food/{id}', [AdminController::class, 'editFood'])->name('edit-food');
    Route::put('/update-food/{food}', [AdminController::class, 'updateFood'])->name('update-food');
    Route::get('/delete-food/{id}', [AdminController::class, 'deleteFood'])->name('delete-food');

    Route::get('/view-reservation', [AdminController::class, 'viewReservation'])->name('view-reservation');
    Route::get('/approved-reservation/{id}', [AdminController::class, 'approvedReservation'])->name('approved-reservation');
    Route::get('/delete-reservation/{id}', [AdminController::class, 'deleteReservation'])->name('delete-reservation');

});


// Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth', 'verified');

