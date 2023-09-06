<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->controller(UserController::class)->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // User related Routes

    Route::get('/user', 'index')->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', 'store')->name('user.store');
    Route::get('/user/{user}', 'show')->where('id', '[0-9]+')->name('user.show');
    Route::delete('user/delete/{user}', [UserController::class, 'destroy'])->name('user.delete');
    Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('user/update/{user}', [UserController::class, 'update'])->name('user.update');

    // Blog RElated Routes

    Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
    Route::post('/blog', 'store')->name('blog.store');
    Route::delete('blog/delete/{blog}', [BlogController::class, 'destroy'])->name('blog.delete');
    Route::get('blog/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('blog/update/{blog}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');

    Route::get('/about', [AboutController::class, 'index'])->name('about.index');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

    Route::get('/report', [ReportController::class, 'index'])->name('report.index');

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');

});

Route::get('/', [HomeController::class, 'index']);
