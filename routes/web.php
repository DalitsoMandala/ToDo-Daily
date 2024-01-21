<?php

use App\Http\Controllers\Pages;
use App\Livewire\AddTasks;
use App\Livewire\Categories;
use App\Livewire\Dashboard;
use App\Livewire\EditTask;
use App\Livewire\Settings;
use App\Livewire\Tasks;
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

Route::get('/dashboard', Dashboard::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/settings', Settings::class)->name('settings');
    Route::get('/add-task', AddTasks::class)->name('add-task');
    Route::post('/edit-task/$id', EditTask::class)->name('edit-task');
    Route::get('/categories', Categories::class)->name('categories');
    Route::get('/tasks', Tasks::class)->name('tasks');
});

require __DIR__ . '/auth.php';
