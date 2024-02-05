<?php

use App\Http\Controllers\Pages;
use App\Livewire\AddTasks;
use App\Livewire\Categories;
use App\Livewire\CompletedTasks;
use App\Livewire\Dashboard;
use App\Livewire\EditTask;
use App\Livewire\InprogressTasks;
use App\Livewire\OverdueTasks;
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
    Route::get('/edit-task/{task}', EditTask::class)->name('edit-task');
    Route::get('/categories/{name?}', Categories::class)->name('categories');
    Route::get('/tasks', Tasks::class)->name('tasks');
    Route::get('/tasks/inprogress-tasks', InprogressTasks::class)->name('inprogress-tasks');
    Route::get('/tasks/completed-tasks', CompletedTasks::class)->name('completed-tasks');
    Route::get('/tasks/overdue-tasks', OverdueTasks::class)->name('overdue-tasks');
});

require __DIR__ . '/auth.php';