<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'welcome']);

Route::get('/home', function () {
    return view('home');
});

Route::get('/admin_users', [AdminController::class,'users']);

Route::get('/foodmenu', [AdminController::class,'foodmenu']);

Route::get('/deleteuser/{id}', [AdminController::class,'deleteuser']);

Route::post('/uploadfood', [AdminController::class,'upload']);

Route::get('/deletemenu/{id}', [AdminController::class,'deletemenu']);

Route::get('/updateview/{id}', [AdminController::class,'updateview']);

Route::post('/update/{id}', [AdminController::class,'update']);

Route::post('/reservation', [AdminController::class,'reservation']);

Route::get('/viewreservation', [AdminController::class,'viewreservation']);

Route::get('/viewchefs', [AdminController::class,'viewchefs']);

Route::post('/uploadchef', [AdminController::class,'uploadchef']);

Route::get('/updatechef/{id}', [AdminController::class,'updatechef']);

Route::post('/updateafoodchef/{id}', [AdminController::class,'updateafoodchef']);

Route::get('/deletechef/{id}', [AdminController::class,'deletechef']);




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// ---------------
Route::get('/admin_dashboard', [HomeController::class,'index'])->middleware(['auth','admin']);
