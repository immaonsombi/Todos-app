<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('todos/index', [Todocontroller::class, 'index'])->name('todos/index'); // can also be todos.index if it fails to find it

Route::get('todos/create', [Todocontroller::class, 'create'])->name('todos.create'); // can also be todos.create if it fails to find it

Route::get('todos/edit', [Todocontroller::class, 'edit'])->name('todos.edit'); // can also be todos.create if it fails to find it

Route::post('todos/store', [Todocontroller::class, 'store'])->name('todos.store'); // can also be todos.create if it fails to find it

Route::get('todos/show{id}', [Todocontroller::class, 'show'])->name('todos/show'); // can also be todos.create if it fails to find it


Route::get('todos/{id}edit', [Todocontroller::class, 'edit'])->name('todos/edit'); // can also be todos.create if it fails to find it



Route::put('todos/update', [Todocontroller::class, 'update'])->name('todos/update'); // can also be todos.create if it fails to find it


Route::delete('todos/destroy', [Todocontroller::class, 'destroy'])->name('todos/destroy'); // can also be todos.create if it fails to find it