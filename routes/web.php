<?php

use App\Http\Controllers\TodoController;
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


Route::get('/', [TodoController::class, 'index'])->name('todo.index');
Route::get('create', [TodoController::class, 'create'])->name('todo.create');
Route::post('store', [TodoController::class, 'store'])->name('todo.store');
Route::get('edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
Route::put('update/{id}', [TodoController::class, 'update'])->name('todo.update');
Route::delete('delete/{id}', [TodoController::class, 'delete'])->name('todo.delete');
