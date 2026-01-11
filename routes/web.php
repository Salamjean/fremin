<?php

use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\AuthenticateAdmin;
use App\Http\Controllers\Home\HomeController;
use Illuminate\Support\Facades\Route;


//Les routes de la page
Route::get('/', [HomeController::class,'home'])->name('home');
Route::prefix('home')->group(function () {
    Route::get('/about', [HomeController::class,'about'])->name('home.about');
    Route::get('/actuality', [HomeController::class,'actuality'])->name('home.actuality');
    Route::get('/publication', [HomeController::class,'publication'])->name('home.publication');
    Route::get('/program', [HomeController::class,'program'])->name('home.program');
    Route::get('/contact', [HomeController::class,'contact'])->name('home.contact');
});


//Les routes de l'administration
Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthenticateAdmin::class, 'login'])->name('admin.login');
    Route::post('/login', [AuthenticateAdmin::class, 'handleLogin'])->name('admin.handleLogin');
});

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/logout', [AdminDashboard::class, 'logout'])->name('admin.logout');
});