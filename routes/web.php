<?php

use App\Http\Controllers\Pages;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/settings', [Pages::class, 'settings'])->name('settings');
    Route::get('/add-task', [Pages::class, 'addTask'])->name('add-task');
    Route::get('/edit-task', [Pages::class, 'editTask'])->name('edit-task');
    Route::get('/categories', [Pages::class, 'categories'])->name('categories');
    Route::get('/tasks', [Pages::class, 'tasks'])->name('tasks');

});

require __DIR__.'/auth.php';