<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Back\DashboardController as BackDashboardController;
use App\Http\Controllers\Back\UserController as BackUserController;
use App\Http\Controllers\Back\NewsController as BackNewsController;
use App\Http\Controllers\Back\PengumumanController as BackPengumumanController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');
Route::post('/forgot-password', [AuthController::class, 'forgotPasswordProcess'])->name('forgot.password.process');
Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('reset.password');
Route::post('/reset-password/{token}', [AuthController::class, 'resetPasswordProcess'])->name('reset.password.process');

Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [BackDashboardController::class, 'index'])->name('dashboard');

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [BackUserController::class, 'index'])->name('index');
        Route::get('/create', [BackUserController::class, 'create'])->name('create');
        Route::post('/create', [BackUserController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BackUserController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [BackUserController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [BackUserController::class, 'destroy'])->name('destroy');

        Route::get('/register', [BackUserController::class, 'register'])->name('register');
        Route::post('/register/approve/{id}', [BackUserController::class, 'registerApprove'])->name('register.approve');
    });

    Route::prefix('pengumuman')->name('pengumuman.')->group(function () {
        Route::get('/', [BackPengumumanController::class, 'index'])->name('index');
        Route::get('/create', [BackPengumumanController::class, 'create'])->name('create');
        Route::post('/create', [BackPengumumanController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BackPengumumanController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [BackPengumumanController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [BackPengumumanController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('news')->name('news.')->group(function () {
        Route::get('/category', [BackNewsController::class, 'category'])->name('category');
        Route::post('/category', [BackNewsController::class, 'categoryStore'])->name('category.store');
        Route::put('/category/edit/{id}', [BackNewsController::class, 'categoryUpdate'])->name('category.update');
        Route::delete('/category/delete/{id}', [BackNewsController::class, 'categoryDestroy'])->name('category.destroy');

        Route::get('/', [BackNewsController::class, 'index'])->name('index');
        Route::get('/create', [BackNewsController::class, 'create'])->name('create');
        Route::post('/create', [BackNewsController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BackNewsController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [BackNewsController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [BackNewsController::class, 'destroy'])->name('destroy');

        Route::get('/comment', [BackNewsController::class, 'comment'])->name('comment');
        Route::post('/comment/spam/{id}', [BackNewsController::class, 'commentSpam'])->name('comment.spam');

    });


});
