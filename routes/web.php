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

Route::delete('/events/{id}', [App\Http\Controllers\EventController::class, 'destroy'])->name('events.destroy');
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::view('dashboard', 'admin/dashboard')->name('admin.dashboard');
    Route::get('/events/index', [App\Http\Controllers\EventController::class,'index2'])->name('events.index');
    Route::get('/events/{id}/edit', [App\Http\Controllers\EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{id}', [App\Http\Controllers\EventController::class, 'update'])->name('events.update');
    Route::get('/events/create', [App\Http\Controllers\EventController::class, 'create'])->name('events.create');
    Route::post('/events', [App\Http\Controllers\EventController::class, 'store'])->name('events.store');
});
