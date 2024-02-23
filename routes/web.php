<?php

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



Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::middleware(['auth'])->group(function () {
    Route::get('/Task', [App\Http\Controllers\TaskController::class, 'Task']);
    Route::get('/AddTask', [App\Http\Controllers\TaskController::class, 'AddTask']);
    Route::post('/AddTaskAction', [App\Http\Controllers\TaskController::class, 'AddTaskAction']);
    Route::post('/UpdateTaskStatus', [App\Http\Controllers\TaskController::class, 'UpdateTaskStatus']);
    Route::get('GetTask/{id}', [App\Http\Controllers\TaskController::class, 'GetTask']);
    Route::post('UpdateTask', [App\Http\Controllers\TaskController::class, 'UpdateTask']);
    Route::get('DeleteTask', [App\Http\Controllers\TaskController::class, 'DeleteTask']);
});

