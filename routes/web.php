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
