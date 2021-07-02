<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('tasks')->group(function () {
    /**
     * Display All Existing Tasks
     */
    Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

    /**
     * Add A New Task
     */
    Route::post('/', [TaskController::class, 'store'])->name('tasks.store');

    /**
     * Display An Existing Task
     */
    Route::get('/{id}', [TaskController::class, 'show'])->name('tasks.show');

    /**
     * Update An Existing Task
     */
    Route::put('/{id}', [TaskController::class, 'update'])->name('tasks.update');

    /**
     * Delete An Existing Task
     */
    Route::delete('/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});

