<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\EventController::class, 'index'])->name('event');
Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class,'show'])->name('admin.dashboard');
Route::get('/events/index', [App\Http\Controllers\HomeController::class,'test'])->name('test');
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::view('dashboard', 'admin/dashboard')->name('admin.dashboard');
    // Route::resource('events');
});
