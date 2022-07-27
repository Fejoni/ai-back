<?php

use App\Http\Controllers\Api\v1\Admin\Post\Subject\{CreateSubjectController, UpdateSubjectController, DeleteSubjectController};
use App\Http\Controllers\Api\v1\Admin\Post\Theme\{CreateThemeController, DeleteThemeController, UpdateThemeController};
use App\Http\Controllers\Api\v1\Site\Aside\GetAsideController;
use App\Http\Controllers\Api\v1\Site\Post\CreatePostController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json($request->user());

});

// Для теста
Route::prefix('test')->group(function () {

});

Route::group(['middleware' => 'auth:sanctum'], function() {

    Route::prefix('site')->group(function () {

        Route::prefix('aside')->group(function() {
            Route::get('get', [GetAsideController::class, 'get']);
        });

        Route::prefix('post')->group(function() {
            Route::post('create', [CreatePostController::class. 'create']);
        });
    });

    Route::prefix('admin')->group(function() {
        Route::prefix('theme')->group(function () {
            Route::post('create', [CreateThemeController::class, 'create']);
            Route::put('update', [UpdateThemeController::class, 'update']);
            Route::delete('delete', [DeleteThemeController::class, 'delete']);
        });

        Route::prefix('subject')->group(function () {
            Route::post('create', [CreateSubjectController::class, 'create']);
            Route::put('update', [UpdateSubjectController::class, 'update']);
            Route::delete('delete', [DeleteSubjectController::class, 'delete']);

        });
    });
});


