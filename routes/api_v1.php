<?php

use App\Http\Controllers\Api\v1\Admin\Post\Subject\CreateSubjectController;
use App\Http\Controllers\Api\v1\Admin\Post\Subject\DeleteSubjectController;
use App\Http\Controllers\Api\v1\Admin\Post\Subject\UpdateSubjectController;
use App\Http\Controllers\Api\v1\Admin\Post\Theme\CreateThemeController;
use App\Http\Controllers\Api\v1\Admin\Post\Theme\DeleteThemeController;
use App\Http\Controllers\Api\v1\Admin\Post\Theme\UpdateThemeController;
use App\Http\Controllers\Api\v1\Site\Aside\GetAsideController;
use App\Http\Controllers\Api\v1\Site\Test\GetController;
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
    Route::post('theme', [DeleteThemeController::class, 'delete']);
});

Route::group(['middleware' => 'auth:sanctum'], function() {

    Route::get('get', [GetController::class, 'get']); // Тестовый

    Route::prefix('forum')->group(function () {
        Route::get('aside/get', [GetAsideController::class, 'get']);
    });

    Route::prefix('admin')->group(function() {
        Route::prefix('create')->group(function () {
            Route::post('theme', [CreateThemeController::class, 'create']);
            Route::post('subject', [CreateSubjectController::class, 'create']);
        });

        Route::prefix('update')->group(function () {
            Route::put('theme', [UpdateThemeController::class, 'update']);
            Route::put('subject', [UpdateSubjectController::class, 'update']);
        });

        Route::prefix('delete')->group(function () {
            Route::delete('theme', [DeleteThemeController::class, 'delete']);
            Route::delete('subject', [DeleteSubjectController::class, 'delete']);
        });
    });
});
Route::get('test/aside', [\App\Http\Controllers\Api\v1\Site\Test\TestController::class, 'test']);



