<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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
        Route::post('/tasks', 'store');
        Route::patch('/tasks/{id}', 'update');
        Route::delete('/tasks/{id}', 'destroy');
    });
});
