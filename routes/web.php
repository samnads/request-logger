<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\RequestLogging;

Route::middleware([RequestLogging::class])->group(function () {
    Route::get('/', [HomeController::class, 'home']);
    Route::get('/install_view', [HomeController::class, 'install_show'])->name('install_view');
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('settings', [HomeController::class, 'settings'])->name('settings');
    Route::get('logs', [HomeController::class, 'logs'])->name('logs');
    Route::get('page/1', [HomeController::class, 'view_page_1']);
    Route::get('page/2', [HomeController::class, 'view_page_2']);
    Route::get('page/3', [HomeController::class, 'view_page_3']);
    Route::get('page/{page_id}', [HomeController::class, 'view_page']);
    Route::get('toggle_log', [HomeController::class, 'toggle_log']);
});
Route::get('install', [HomeController::class, 'install']);