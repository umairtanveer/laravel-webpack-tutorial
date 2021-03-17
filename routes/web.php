<?php

use App\Http\Controllers\Task1Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Task 1 CRUD OPERATION
Route::get('task1/ajax/crud', [Task1Controller::class, 'index'])->name('task1.ajax.crud');

Route::post('task1/ajax/todo/create', [Task1Controller::class, 'createTodo'])->name('task1.ajax.todo.create');
Route::post('task1/ajax/todo/update', [Task1Controller::class, 'updateTodo'])->name('task1.ajax.todo.update');
Route::post('task1/ajax/todo/delete', [Task1Controller::class, 'deleteTodo'])->name('task1.ajax.todo.delete');
