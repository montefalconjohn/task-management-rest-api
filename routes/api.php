<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TrashTaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'task-management'], function () {
    Route::controller(TaskController::class)->group(function () {
        Route::get('/tasks', 'index');
        Route::get('/tasks/search/{searchParam}', 'showTaskEntityBySearchParam');
        Route::post('/tasks', 'store');
        Route::patch('/tasks/{id}', 'update');
        Route::delete('/tasks/{id}', 'destroy');
    });

    Route::controller(TrashTaskController::class)->group(function () {
        Route::get('/trash-tasks', 'index');
        Route::patch('/trash-tasks/{id}', 'update');
        Route::delete('/trash-tasks/{id}', 'destroy');
    });

    Route::controller(StatusController::class)->group(function () {
        Route::get('/statuses', 'index');
    });
});
