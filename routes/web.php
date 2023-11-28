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
    Route::get('/events/index', [App\Http\Controllers\EventController::class,'adminindex'])->name('events.index');
    Route::get('/events/{id}/edit', [App\Http\Controllers\EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{id}', [App\Http\Controllers\EventController::class, 'update'])->name('events.update');
    Route::get('/events/create', [App\Http\Controllers\EventController::class, 'create'])->name('events.create');
    Route::post('/events', [App\Http\Controllers\EventController::class, 'store'])->name('events.store');
    Route::get('/users/index', [App\Http\Controllers\UserController::class,'index'])->name('users.index');
    Route::get('/users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');




});
// Route::middleware(['auth','user'])->prefix('user')->group(function (){
//    Route::get

// });
